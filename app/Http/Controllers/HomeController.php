<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre;
use App\Models\Province;
use App\Models\Dealer;

class HomeController extends Controller
{
    public function index() {
      $new_products = Tyre::select('*')->take(4)->orderBy("id", "desc")->get();
      $best_products = Tyre::select('*')->take(8)->get();
      return view('client.index', ['new_products'=> $new_products,'best_products' => $best_products] );
    }

    public function listProduct() {
        return view('client.list-product');
    }
    
    public function nqt() {
      return view('client.aboutnqt');
    }
    
    public function services() {
      return view('client.services');
    }
    
    public function trazano() {
      return view('client.trazano');
    }
    
    public function finddealer(Request $request) {
      $province = $request->province;
        if($province == null){
         $province = 'Hà Nội';
        }
      $dealers = Dealer::where('province', $province)->get();
      $provinces = Dealer::select('area','province')->distinct('province')->get();
      return view('client.finddealer', ['dealers' => $dealers, 'provinces' => $provinces, 'provincename' => $province]);
    }
}
