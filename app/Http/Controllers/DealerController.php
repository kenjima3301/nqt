<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TyreOutput;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Tyre;
use App\Models\TyreDimention;
use App\Models\Output;
use App\Models\DealerTyre;

class DealerController extends Controller
{
   public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:Dealer');
    }
    
  public function dashboard() {
    $outputs = Output::where('dealer_id', Auth::user()->id)->where('status', 'xuat')->get();
    return view('dealer.dashboard', ['outputs' => $outputs]);
    
  }
  
  public function trazano() {
    $trazanotyres = Tyre::where('brand_id',1)->get();
    return view('dealer.trazano', [
        'trazanotyres' => $trazanotyres
    ]);
  }
  
  public function trazanosearch(Request $request) {
    $name = $request->name;
    $tyre = Tyre::where('brand_id', 1)->where('name', $name)->first();
    if(!$tyre){
      return redirect('dealer/trazano')->with('success', 'Mã gai ('.$name.') không đúng vui lòng nhập lại');
    }
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    return view('dealer.trazano-detail', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function trazanobyid($id) {
    $tyre = Tyre::find($id);
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    return view('dealer.trazano-detail', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
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
    return redirect('dealer/trazano/'.$tyre->id)->with('success', 'Đã xuất kho '.$quantity.' lốp xe');
  }
  
  public function goldencrown() {
    $goldencrowntyres = Tyre::where('brand_id',3)->get();
    return view('dealer.goldencrown', [
        'goldencrowntyres' => $goldencrowntyres
    ]);
  }
  
  public function goldencrownsearch(Request $request) {
    $name = $request->name;
    $tyre = Tyre::where('brand_id', 3)->where('name', $name)->first();
    if(!$tyre){
      return redirect('dealer/goldencrown')->with('success', 'Mã gai ('.$name.') không đúng vui lòng nhập lại');
    }
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    return view('dealer.goldencrown-detail', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function othertyre() {
    $othertyres = Tyre::where('brand_id',4)->get();
    return view('dealer.othertyre', [
        'othertyres' => $othertyres
    ]);
  }
  
  public function findtyre(Request $request) {
    $name = $request->name;
    $tyre = Tyre::where('name', $name)->first();
    if(!$tyre){
      return redirect('dealer/bang-quan-tri')->with('success', 'Mã gai ('.$name.') không đúng vui lòng nhập lại');
    }
    $tyre_dimentions = TyreDimention::where('tyre_id', $tyre->id)->get();
    if($tyre->brand_id == 1){
      $template = 'dealer.trazano-detail';
    }else if ($tyre_dimentions->brand_id == 3){
      $template = 'dealer.goldencrown-detail';
    }else if ($tyre->brand_id == 4){
      
    }
    return view($template, ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function nqtoutput() {
    $dealer = \App\Models\Dealer::where('user_id', Auth::user()->id)->first();
    $outputs = Output::where('dealer_id', $dealer->id)->where('status', 'xuat')->get();
    $outputeds = Output::where('dealer_id', $dealer->id)->where('status', 'nhap')->get();
    return view('dealer.nqtoutput',['outputs' => $outputs, 'outputeds'=> $outputeds]);
    
  }
  
  public function downloadoutput($id)  {
      $dealer = \App\Models\Dealer::where('user_id', Auth::user()->id)->first();
      $output = Output::where('id',$id)->where('dealer_id', $dealer->id)->first();
     return response()->download(public_path($output->file));
    }
    
    public function nqtoutputconfirm($id) {
      $dealer = \App\Models\Dealer::where('user_id', Auth::user()->id)->first();
      $output = Output::where('id', $id)->where('dealer_id', $dealer->id)->first();
      if($output){
        foreach ($output->dimentions as $dimention){
          $dealertyre = DealerTyre::where('dealer_id', $dealer->id)->where('dimention_id',$dimention->dimention_id)->first();
          if($dealertyre){
            $dealertyre->total = $dealertyre->total + $dimention->quantity;
            $dealertyre->save();
          }else {
            DealerTyre::create([
                'dealer_id'=> $dealer->id,
                'dimention_id'=> $dimention->dimention_id,
                'total' => $dimention->quantity,
                'status' => 'public'
            ]);
          }
        }
      }
      $output->status = 'nhap';
      $output->save();
      return redirect('dealer/xuat-hang-tu-NQT');
    }
    
    public function inventory() {
      $dealer = \App\Models\Dealer::where('user_id', Auth::user()->id)->first();
      $tyres = DealerTyre::where('dealer_id', $dealer->id)->where('status', 'public')->get();
      return view('dealer.inventory',['tyres' => $tyres]);
    }
    
    public function outputtoclient() {
        $dealer = \App\Models\Dealer::where('user_id', Auth::user()->id)->first();
        $tyres = DealerTyre::where('dealer_id', $dealer->id)->where('status', 'public')->get();
        $output = Output::where('user_id', Auth::user()->id)->where('status','new')->first();
        $outputed = Output::where('user_id', Auth::user()->id)->whereIn('status',array('xuat','nhap'))->orderBy('created_at', 'DESC')->get();
        if(!$output){
          $output = Output::create([
              'user_id' => Auth::user()->id,
              'dealer_id' => 0,
              'status' => 'new'
          ]);
          $output->output_code = 'NQT-'.str_pad($output->id, 5, "0", STR_PAD_LEFT);
          $output->save();
        }
        return view('dealer.outputtyretoclient', [
            'tyres' => $tyres,
            'output' => $output,
            'outputed' => $outputed
        ]);
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
    
    return redirect('dealer/xuat-hang-cho-khach');
  }
    
    public function confirmoutputtoclient($id) {
      $output = Output::find($id);
      $output->status = 'xuat';
      $output->save();
      
      return redirect('dealer/xuat-hang-cho-khach');
    }
    
    public function canceloutputtoclient($id) {
      $output = Output::find($id);
      $output->status = 'huy';
      $output->save();
      
      return redirect('dealer/xuat-hang-cho-khach');
    }
    
    public function outputdetail($id) {
      $output = Output::find($id);
      return view('dealer.output-detail', [
            'output' => $output
        ]);
    }
    
    public function findoutputbycode(Request $request) {
      $output = Output::where('output_code', $request->code)->where('user_id', Auth::user()->id)->first();
      if($output){
        return view('dealer.output-detail', [
            'output' => $output
        ]);
      }else {
        return back()->with('message1',"Không tìm thấy mã đơn.");
      }
    }
}
