<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TyreDimention;
use App\Models\TyreOutput;
use Illuminate\Support\Facades\Auth;

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
    
     public function add_temp_output(Request $request) {
        $dealer_id = $request->post('dealer_id');
        $size_id = $request->post('size_id');
        $number = $request->post('number');
        TyreOutput::create([
            'dimention_id' => $size_id,
            'user_id' => Auth::user()->id,
            'dealer_id' => $dealer_id,
            'quantity' => $number,
            'status' => 'pending'
        ]);
    }
}
