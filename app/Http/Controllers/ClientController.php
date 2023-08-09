<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\Order;
use App\Models\OrderTyre;

class ClientController extends Controller
{
  
  public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:Client');
    }
    
  public function profile() {
    $file_name = 'tinh_tp';
    $tinh = $this->readJson($file_name);
    $district = '';
    $commune = '';
    $user = Auth::user();
    $profile = UserProfile::where('user_id', $user->id)->first();
    if($profile){
      $district = $this->readJson($profile->city,'quan-huyen');
      $commune = $this->readJson($profile->district,'xa-phuong');
    }
    return view('client.auth.profile', compact('tinh','district','commune','user'));
    
  }
  
  public function updateprofile(Request $request) {
    
    $user = Auth::user();
    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->save();
    
    $profile = UserProfile::where('user_id', $user->id)->first();
    if(!$profile){
      $profile = UserProfile::create([
          'user_id' => $user->id
      ]);
    }
    $profile->city = $request->city;
    $profile->district = $request->district;
    $profile->commune = $request->commune;
    $profile->address = $request->address;
    $tinh = $this->readJson('tinh_tp');
    $tinhname = $tinh[$request->city];
    $district = $this->readJson($request->city,'quan-huyen');
    $districtname = $district[$request->district];
    $commune = $this->readJson($request->district,'xa-phuong');
    $communename = $commune[$request->commune];
    $profile->full_address = $request->address.' '. $communename["name"] .' '. $districtname["name"]. ' '. $tinhname["name"];
    $profile->save();
    
    return redirect('client/profile');
    
  }
  
  
  public function cart() {
    $order = Order::where('user_id', Auth::user()->id)->where('status', 'new')->first();
    return view('client.auth.cart', ['order' => $order]);
    
  }
  
  public function checkout() {
    $tinh = $this->readJson('tinh_tp');
    $district = '';
    $commune = '';
    $user = Auth::user();
    $profile = UserProfile::where('user_id', $user->id)->first();
    if($profile){
      $district = $this->readJson($profile->city,'quan-huyen');
      $commune = $this->readJson($profile->district,'xa-phuong');
    }
    $order = Order::where('user_id', Auth::user()->id)->where('status', 'new')->first();
    return view('client.auth.checkout',  compact('tinh','district','commune','user', 'order'));
    
  }
  
  public function checkoutconfirm(Request $request) {
    $order = Order::where('id',$request->order_id)->where('user_id', Auth::user()->id)->where('status', 'new')->first();
    $order->name = $request->name;
    $order->phone = $request->phone;
    $tinh = $this->readJson('tinh_tp');
    $tinhname = $tinh[$request->city];
    $district = $this->readJson($request->city,'quan-huyen');
    $districtname = $district[$request->district];
    $commune = $this->readJson($request->district,'xa-phuong');
    $communename = $commune[$request->commune];
    $order->address = $request->address.' '. $communename["name"] .' '. $districtname["name"]. ' '. $tinhname["name"];
    $order->note = $request->note;
    $order->payment = $request->payment;
    $order->status = 'booked';
    $order->save();
    return redirect('client/don-hang');
    
  }
  
  public function order() {
    $orders = Order::where('user_id', Auth::user()->id)->where('status', 'booked')->orderBy('created_at', 'DESC')->get();
    return view('client.auth.order',  compact('orders'));
  }
  
  public function orderdetail($id) {
    $order = Order::where('id',$id)->where('user_id', Auth::user()->id)->where('status', 'booked')->first();
    return view('client.auth.orderdetail',  compact('order'));
  }

  public function readJson($file_name,$folder = null){

      if($folder){
          $path = storage_path() . "/json/$folder/$file_name.json";
      }else{
          $path = storage_path() . "/json/$file_name.json";
      }

      $json = json_decode(file_get_contents($path), true);
      return $json;
  }

  public function getSubData( Request $request) {
      $folder_name = $request->folder_name;
      $file_name = $request->id;
      $html = ' <option value=""> -- Lựa Chọn --  </option>';
      if($file_name != 0 ){
          $data = $this->readJson($file_name,$folder_name);

          foreach($data as $key => $value){
              $html .= '<option value="'.$key.'">'.$value['name'].'</option>';
          }
      }
      return $html;
  }
  
  public function addtocart($id) {
      $order = Order::where('user_id', Auth::user()->id)->where('status','new')->first();
      if($order){
        
      }else {
        $order = Order::create([
            'user_id' => Auth::user()->id
        ]);
        $order->order_code = 'NQT-R-'.str_pad($order->id, 5, "0", STR_PAD_LEFT);
        $order->status = 'new';
        $order->save();
      }
      OrderTyre::create([
         'order_id' => $order->id,
          'dimention_id' => $id,
          'quantity' => 1
      ]);
      
      return redirect('client/gio-hang');
  }
  
  public function removetyrefromcar($id) {
    $order = Order::where('user_id', Auth::user()->id)->where('status','new')->first();
    $ordertyre = OrderTyre::where('order_id', $order->id)->where('id', $id)->first();
    $ordertyre->delete();
    return redirect('client/gio-hang');
  }
}
