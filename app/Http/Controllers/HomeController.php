<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre;
use App\Models\Province;
use App\Models\Dealer;
use App\Models\Modelcar;
use App\Models\Brand;
use App\Models\TyreDimention;

class HomeController extends Controller
{
    public function index() {
      $new_products = Tyre::select('*')->take(4)->orderBy("id", "desc")->get();
      $best_products = Tyre::select('*')->take(8)->get();
      return view('client.index', ['new_products'=> $new_products,'best_products' => $best_products] );
    }

    public function listProduct() {
      $models = Modelcar::all();
      $model = Modelcar::take(1)->first();
      $brands = Brand::all();
      $brand = Brand::take(1)->first();
      $tyres = Tyre::where('model_id', $model->id)->where('brand_id', $brand->id)->get();
      $sizes = TyreDimention::select('size')->distinct('size')->get();
      return view('client.list-product', [
          'models' => $models,
          'brands' => $brands,
          'tyres' => $tyres,
          'sizes' => $sizes
      ]);
    }
    
    public function listProductpost(Request $request) {
      $search = $request->search;
      $tyre = Tyre::where('name', $search)->first();
      if($tyre){
        return redirect('lop-xe-tai/'.$tyre->id);
      }
      if ( is_numeric($search[0]) ) {
          $sizes = TyreDimention::where('size', 'like', '%'. $search . '%')->get();
          $tyre_ids = TyreDimention::select('tyre_id')->where('size', 'like', '%'. $search . '%')->distinct('tyre_id')->get()->toArray();
          $tyres = Tyre::whereIn('id', $tyre_ids)->get();
      } else {
          $tyres = Tyre::where('name', 'like', '%'. $search . '%')->get();
      }
      if($tyres->isEmpty()){
        $tyres = Tyre::where('name', 'like', '%'. $search . '%')->get();
      }
      $models = Modelcar::all();
      $model = Modelcar::take(1)->first();
      $brands = Brand::all();
      $brand = Brand::take(1)->first();
//      $tyres = Tyre::where('model_id', $model->id)->where('brand_id', $brand->id)->get();
      $sizes = TyreDimention::select('size')->distinct('size')->get();
      return view('client.list-product', [
          'models' => $models,
          'brands' => $brands,
          'tyres' => $tyres,
          'sizes' => $sizes
      ]);
    }

    public function productDetail($id) {
      $tyre = Tyre::find($id);
      $sizes = TyreDimention::where('tyre_id', $tyre->id)->get();
      $relatedtypres = Tyre::where('driveexperience_id', $tyre->driveexperience_id)->take(3)->get();
      return view('client.product-detail', ['tyre' => $tyre, 'sizes' => $sizes, 'relatedtypres' => $relatedtypres]);
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
