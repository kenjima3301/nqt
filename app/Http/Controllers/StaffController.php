<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tyre;
use App\Models\TyreDimention;
use App\Models\TyreOutput;
use Illuminate\Support\Carbon;
use App\Models\DealerTyre;

class StaffController extends Controller
{
  public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:STAFF');
    }
    
  public function dashboard() {
    $outputs = TyreOutput::whereDate('created_at', '=', Carbon::today())->get();
    return view('staff.dashboard', ['outputs' => $outputs]);
  }
  
  public function trazano() {
    $trazanotyres = Tyre::where('brand_id',1)->get();
    return view('staff.trazano', [
        'trazanotyres' => $trazanotyres
    ]);
  }
  
  public function trazanosearch(Request $request) {
    $name = $request->name;
    $tyre = Tyre::where('brand_id', 1)->where('name', $name)->first();
    if(!$tyre){
      return redirect('staff/trazano')->with('success', 'Mã gai ('.$name.') không đúng vui lòng nhập lại');
    }
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    return view('staff.trazano-detail', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function trazanobyid($id) {
    $tyre = Tyre::find($id);
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    return view('staff.trazano-detail', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function truckoutput(Request $request) {
    $user = Auth::user();
    $tyre_id = $request->tyre_id;
    $quantity = $request->quantity;
    TyreOutput::create([
        'tyre_id' => $tyre_id,
        'user_id' => $user->id,
        'quantity' => $quantity
    ]);
    $tyre = Tyre::find($tyre_id);
    $tyre->quantity = $tyre->quantity - $quantity;
    $tyre->save();
    return redirect('staff/trazano/'.$tyre->id)->with('success', 'Đã xuất kho '.$quantity.' lốp xe');
  }
  
  public function goldencrown() {
    $goldencrowntyres = Tyre::where('brand_id',3)->get();
    return view('staff.goldencrown', [
        'goldencrowntyres' => $goldencrowntyres
    ]);
  }
  
  public function goldencrownsearch(Request $request) {
    $name = $request->name;
    $tyre = Tyre::where('brand_id', 3)->where('name', $name)->first();
    if(!$tyre){
      return redirect('staff/goldencrown')->with('success', 'Mã gai ('.$name.') không đúng vui lòng nhập lại');
    }
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    return view('staff.goldencrown-detail', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function othertyre() {
    $othertyres = Tyre::where('brand_id',4)->get();
    return view('staff.othertyre', [
        'othertyres' => $othertyres
    ]);
  }
  
  public function findtyre(Request $request) {
    $name = $request->name;
    $tyre = Tyre::where('name', $name)->first();
    if(!$tyre){
      return redirect('staff/bang-quan-tri')->with('success', 'Mã gai ('.$name.') không đúng vui lòng nhập lại');
    }
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    if($tyre->brand_id == 1){
      $template = 'staff.trazano-detail';
    }else if ($type->brand_id == 3){
      $template = 'staff.goldencrown-detail';
    }else if ($type->brand_id == 4){
      
    }
    return view($template, ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function outputtodealer() {
    $dealers = \App\Models\Dealer::all();
    return view('staff.outputtodealer', [
        'dealers' => $dealers
    ]);
  }
  
  public function outputtyretodealer($id) {
    $tyres = Tyre::all();
    $dealer = \App\Models\Dealer::find($id);
    $outputs = TyreOutput::where('dealer_id', $id)->where('status', 'pending')->get();
    return view('staff.outputtyretodealer', [
        'tyres' => $tyres,
        'dealer' => $dealer,
        'outputs' => $outputs
    ]);
  }
  
  public function deteleoutput($id) {
    $tyreoutput = TyreOutput::find($id);
    $dealer_id = $tyreoutput->dealer_id;
    $tyreoutput->delete();
    return redirect('staff/xuat-hang-dai-ly/'.$dealer_id);
  }
  
  public function canceloutput($id) {
    TyreOutput::where('dealer_id', $id)->where('status', 'pending')->delete();
    return redirect('staff/xuat-hang-dai-ly/'.$id);
  }
  
  public function confirmoutput($id) {
    $outputs = TyreOutput::where('dealer_id', $id)->where('status', 'pending')->get();
    foreach ($outputs as $output){
      $output->status = 'confirm';
      $output->save();
      $dimetion = DealerTyre::where('dealer_id', $output->dealer_id)->where('dimention_id', $output->dimention_id)->first();
      if($dimetion){
        $dimetion->total = $dimetion->total + $output->quantity;
        $dimetion->save();
      }else {
        DealerTyre::create([
            'dealer_id' => $output->dealer_id,
            'dimention_id' => $output->dimention_id,
            'total' => $output->quantity,
            'status' => 'public'
        ]);
      }
      
    }
    return redirect('staff/xuat-hang-dai-ly/'.$id);
  }
}
