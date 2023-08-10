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
use App\Models\Order;
use Shuchkin\SimpleXLSXGen;
use Shuchkin\SimpleXLSX;
use App\Models\Input;

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
    $outputed = Output::where('dealer_id', $dealer->id)->whereIn('status',array('xuat','nhap'))->orderBy('created_at', 'DESC')->get();
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
        $outputed = Output::where('user_id', Auth::user()->id)->where('dealer_id', 0)->whereIn('status',array('xuat','nhap'))->orderBy('created_at', 'DESC')->get();
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
    
    public function findoutputbycode(Request $request) {
      if(preg_match('-R-',$request->code)){
        $order = Order::where('order_code', $request->code)->where('status','booked')->first();
        if($order){
          return view('staff.orderdetail',  compact('order'));
        }else {
          return back()->with('message1',"Không tìm thấy mã đơn.");
        }
      }else {
        $output = Output::where('output_code', $request->code)->whereIn('status',array('xuat','nhap'))->first();
        if($output){
          return view('staff.output-detail', [
              'output' => $output
          ]);
        }
      }
      return back()->with('message1',"Không tìm thấy mã đơn.");
    }
    
    public function orders() {
      $orders = Order::where('status', 'booked')->orderBy('created_at', 'DESC')->get();
      return view('staff.orders', ['orders' => $orders]);
    }
    
    public function orderdetail($id) {
    $order = Order::find($id);
    return view('staff.orderdetail',  compact('order'));
    }
  
    public function inventory() {
        $tyres = TyreDimention::all();
        $tyre_codes = Tyre::all();
        return view('staff.inventory', ['tyres'=> $tyres, 'tyre_codes' => $tyre_codes]);
    }
    
    public function inputgoods() {
      $inputs = Input::where('status', 'pending')->get();
      if(count($inputs) > 0){
        return redirect('staff/xac-nhan-nhap-hang');
      }
      return view('staff.inputgoods');
    }
    
    public function importdownload(Request $request) {
      $data = [
          ["Quy cách","Mẫu gai","Lớp bố", "Chỉ số tải trọng và tốc độ","Số lượng","Đơn giá"]
        ];
       $xlsx = SimpleXLSXGen::fromArray( $data ); 
       $xlsx = new SimpleXLSXGen();
      $xlsx->addSheet( $data, "Nhap hang" );
       $xlsx->downloadAs('mau-import-nhap-hang.xlsx');
        exit();
    }
    
    public function importpost(Request $request) {
    $this->validate($request, [
               'importfile' => 'required|file|mimes:xls,xlsx'
           ]);
      $file = $request->file('importfile');
      if ( $datas = SimpleXLSX::parse($file) ) {
        foreach ($datas->readRows() as $key => $row){
            if ( $key === 0 ) {
              if(count($row) !=6 || $row[0] != 'Quy cách'){
                return back()->with('success', 'Hãy chọn đúng file import.');
              }
                continue;
            }else {
              $row = array_map('trim', $row);
              //get Tyre
              $tyre = Tyre::where('name', $row[1])->first();
              if($tyre){
                $dimention = TyreDimention::where('tyre_id',$tyre->id)->where('size', $row[0])->where('ply',$row[2])->where('sevice_index',$row[3])->first();
                if($dimention){
                  Input::create([
                      'dimention_id' => $dimention->id,
                      'row_id' => $key,
                      'total' => $row[4],
                      'price' => $row[5],
                      'status' => 'pending'
                      
                  ]);
                }else {
                  Input::create([
                      'dimention_id' => 0,
                      'row_id' => $key,
                      'total' => $row[4],
                      'price' => $row[5],
                      'status' => 'pending'
                      
                  ]);
                }
              }else {
                Input::create([
                      'dimention_id' => 0,
                      'row_id' => $key,
                      'total' => $row[4],
                      'price' => $row[5],
                      'status' => 'pending'
                      
                  ]);
              }
            }
        }
        return redirect('staff/xac-nhan-nhap-hang');
      }
  }
  
  public function importconfirm() {
      $inputs = Input::where('status', 'pending')->get();
      return view('staff.inputconfirm', ['inputs' => $inputs]);
  }
  
  public function confirminput() {
    Input::where('dimention_id', 0)->where('status', 'pending')->delete();
    $inputs = Input::where('status', 'pending')->get();
    foreach($inputs as $input){
      $dimention = TyreDimention::find($input->dimention_id);
      $dimention->total = intval($dimention->total) + intval($input->total);
      $dimention->price = $input->price;
      $dimention->save();
      $input->status = 'nhap';
      $input->save();
    }
    return redirect('staff/nhap-hang')->with('message', 'Hoàn thành nhập hàng. Vui lòng kiểm tra kho hàng');
  }
  
  public function cancelinput() {
    Input::where('status', 'pending')->delete();
    return redirect('staff/nhap-hang');
  }
}
