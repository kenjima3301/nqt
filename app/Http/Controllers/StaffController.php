<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tyre;
use App\Models\TyreDimention;
use App\Models\TyreOutput;
use Illuminate\Support\Carbon;
use DB;

class StaffController extends Controller
{
  public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:STAFF');
    }
    
  public function dashboard() {
    $outputs = TyreOutput::whereDate('created_at', '=', Carbon::today())->get()->groupBy('tyre_id');
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
  
}
