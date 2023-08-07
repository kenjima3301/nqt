<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tyre;
use App\Models\TyreDimention;
use App\Models\TyreOutput;
use Illuminate\Support\Carbon;
use App\Models\DealerTyre;
use App\Models\Output;

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
    $output = Output::where('dealer_id', $dealer->id)->where('status','new')->first();
    $outputed = Output::where('dealer_id', $dealer->id)->where('status',array('xuat','nhap'))->orderBy('created_at', 'DESC')->get();
    if(!$output){
      $output = Output::create([
          'user_id' => Auth::user()->id,
          'dealer_id' => $dealer->id,
          'status' => 'new'
      ]);
      $output->output_code = 'NQT-'.str_pad($output->id, 5, "0", STR_PAD_LEFT);
      $output->save();
    }
    return view('staff.outputtyretodealer', [
        'tyres' => $tyres,
        'dealer' => $dealer,
        'output' => $output,
        'outputed' => $outputed
    ]);
  }
  
  public function deteleoutput($id) {
    $tyreoutput = TyreOutput::find($id);
    $output = Output::find($tyreoutput->output_id);
    $dealer_id = $output->dealer_id;
    $tyreoutput->delete();
    return redirect('staff/xuat-hang-dai-ly/'.$dealer_id);
  }
  
  public function updateoutput(Request $request) {
    $output = Output::find($request->output_id);
    $output->note = $request->note;
    if($request->outputfile != ''){
        $Name = time().'.'.$request->outputfile->extension();
        $path = public_path().'/output/dealer/';
        if (!file_exists($path)) {
          mkdir($path, 0775, true);
        }
        $request->outputfile->move($path, $Name);
        $output->file = '/output/dealer/'.$Name;
    }
    $output->save();
    
    return redirect('staff/xuat-hang-dai-ly/'.$output->dealer_id);
  }
  
  public function downloadoutput($id)  {
      $output = Output::find($id);
     return response()->download(public_path($output->file));
    }
  
  public function canceloutput($id) {
    $output = Output::find($id);
    $output->status = 'huy';
    $output->save();
    return redirect('staff/xuat-hang-dai-ly/'.$output->dealer_id);
  }
  
  public function confirmoutput($id) {
    $output = Output::find($id);
    $output->status = 'xuat';
    $output->save();
    return redirect('staff/xuat-hang-dai-ly/'.$output->dealer_id);
  }
  
  public function nqtoutputconfirm($id) {
      $output = Output::find($id);
      $output->status = 'nhap';
      $output->save();
      return redirect('staff/xuat-hang-dai-ly/'.$output->dealer_id);
    }
    
    public function outputtoclient() {
        $tyres = Tyre::all();
        $output = Output::where('dealer_id', 0)->where('status','new')->first();
        $outputed = Output::where('user_id', Auth::user()->id)->where('dealer_id', 0)->where('status',array('xuat','nhap'))->orderBy('created_at', 'DESC')->get();
        if(!$output){
          $output = Output::create([
              'user_id' => Auth::user()->id,
              'dealer_id' => 0,
              'status' => 'new'
          ]);
          $output->output_code = 'NQT-'.str_pad($output->id, 5, "0", STR_PAD_LEFT);
          $output->save();
        }
        return view('staff.outputtyretoclient', [
            'tyres' => $tyres,
            'output' => $output,
            'outputed' => $outputed
        ]);
    }
    
    public function canceloutputtoclient($id) {
      $output = Output::find($id);
      $output->status = 'huy';
      $output->save();
      
      return redirect('staff/xuat-hang-khach-le');
    }
    
    public function confirmoutputtoclient($id) {
      $output = Output::find($id);
      $output->status = 'xuat';
      $output->save();
      
      return redirect('staff/xuat-hang-khach-le');
    }
    
    public function nqtoutputconfirmclient($id) {
      $output = Output::find($id);
      $output->status = 'nhap';
      $output->save();
      return redirect('staff/xuat-hang-khach-le');
    }
    
    public function outputdetail($id) {
      $output = Output::find($id);
      return view('staff.output-detail', [
            'output' => $output
        ]);
    }
}
