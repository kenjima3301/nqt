<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TyreDimention;
use App\Models\TyreOutput;
use Illuminate\Support\Facades\Auth;
use App\Models\DealerTyre;

class AjaxController extends Controller
{
  public function get_get_size_list_by_tyre_id(Request $request) {
        $tyre_id = $request->post('tyre_id');
        $sizes = TyreDimention::where('tyre_id',$tyre_id)->get();
        
        $html = '<select class="form-control" name="size_id" id="select_size">';
        foreach ($sizes as $size) {
                  $html .='<option value="'.$size->id.'">'.$size->size.' - '.$size->sevice_index.'</option>';
          }
        $html .= '</select>';
          
        echo $html;
    }
    
    public function get_get_size_list_by_tyre_id_and_dealer(Request $request) {
        $tyre_id = $request->post('tyre_id');
        $dealer = \App\Models\Dealer::where('user_id', Auth::user()->id)->first();
        $dimention_ids = DealerTyre::where('dealer_id', $dealer->id)->where('status', 'public')->pluck('dimention_id')->toArray();
        $sizes = TyreDimention::where('tyre_id',$tyre_id)->whereIn('id', $dimention_ids)->get();
        
        $html = '<select class="form-control" name="size_id" id="select_size">';
        foreach ($sizes as $size) {
                  $html .='<option value="'.$size->id.'">'.$size->size.' - '.$size->sevice_index.'</option>';
          }
        $html .= '</select>';
          
        echo $html;
    }
    
     public function add_temp_output(Request $request) {
        $output_id = $request->post('output_id');
        $size_id = $request->post('size_id');
        $number = $request->post('number');
        TyreOutput::create([
            'output_id' => $output_id,
            'dimention_id' => $size_id,
            'quantity' => $number,
            'status' => 'new'
        ]);
    }
    
    public function add_quantity_to_total(Request $request) {
      $user = Auth::user();
      $dimention_id = $request->post('dimention_id');
      $total = $request->post('total');
      $cart = \App\Models\OrderTyre::find($dimention_id);
      $cart->quantity = $total;
      $cart->save();
    }
}
