<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre;
use App\Models\Province;
use App\Models\Dealer;
use App\Models\Modelcar;
use App\Models\Brand;
use App\Models\TyreDimention;
use App\Models\TyreMadein;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index() {
      $new_products = Tyre::select('*')->take(4)->where('status', 'public')->orderBy("id", "desc")->get();
      $best_products = Tyre::select('*')->where('status', 'public')->take(8)->get();
      $promotions = \App\Models\Promotion::select('*')->groupBy('promotions.tyre_id')->take(8)->get();
      $sectioncontents = \App\Models\SectionContent::all();
      return view('client.index', ['new_products'=> $new_products,'best_products' => $best_products,'promotions' => $promotions,'sectioncontents' => $sectioncontents] );
    }

    public function listProduct() {
      $models = Modelcar::all();
      $model = Modelcar::take(1)->first();
      $brands = Brand::all();
      $brand = Brand::take(1)->first();
      $tyres = Tyre::where('model_id', $model->id)->where('status', 'public')->where('brand_id', $brand->id)->get();
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
    
    public function listProductpostfilter(Request $request) {
      $models = Modelcar::all();
      $brands = Brand::all();
      $tyres = Tyre::join('tyre_dimentions', 'tyres.id', '=', 'tyre_dimentions.tyre_id')
              ->where('tyre_dimentions.size', 'like', '%'. $request->size . '%')
              ->where('tyres.model_id', $request->model)
              ->where('tyres.brand_id', $request->brand)
              ->where('status', 'public')
              ->distinct('tyres.id')
              ->get('tyres.*');
      $sizes = TyreDimention::select('size')->distinct('size')->get();
      return view('client.list-product', [
          'models' => $models,
          'brands' => $brands,
          'tyres' => $tyres,
          'sizes' => $sizes,
          'sizeselected' => $request->size,
          'model_selected' => $request->model,
          'brand_selected' => $request->brand
      ]);
    }

    public function productDetail($id) {
      $models = Modelcar::all();
      $model = Modelcar::take(1)->first();
      $brands = Brand::all();
      $brand = Brand::take(1)->first();
      $sizes = TyreDimention::select('size')->distinct('size')->get();
      $tyre = Tyre::find($id);
      $tyre->views = $tyre->views +1;
      $tyre->save();
      $tyre_sizes = TyreDimention::where('tyre_id', $tyre->id)->get();
//      $thailand = TyreMadein::where('tyre_dimention_id', $tyre->id)->where('')->count();
      $thailand = TyreMadein::join('tyre_dimentions', 'tyre_countries.tyre_dimention_id', '=', 'tyre_dimentions.id')
              ->where('tyre_dimentions.tyre_id', $tyre->id)
              ->where('tyre_countries.madecountry_id', 1)
                ->count();
      $china = TyreMadein::join('tyre_dimentions', 'tyre_countries.tyre_dimention_id', '=', 'tyre_dimentions.id')
              ->where('tyre_dimentions.tyre_id', $tyre->id)
              ->where('tyre_countries.madecountry_id', 2)
                ->count();      
      $relatedtypres = Tyre::where('driveexperience_id', $tyre->driveexperience_id)->where('id','!=', $tyre->id)->take(3)->get();
      return view('client.product-detail', [
          'tyre' => $tyre, 
          'sizes' => $sizes, 
          'relatedtypres' => $relatedtypres,
          'models' => $models,
          'brands' => $brands,
          'tyre_sizes' => $tyre_sizes,
          'thailand' => $thailand,
          'china' => $china,
          ]);
    }
    
    public function sizeDetail($id,$size) {
      $models = Modelcar::all();
      $model = Modelcar::take(1)->first();
      $brands = Brand::all();
      $brand = Brand::take(1)->first();
      $sizes = TyreDimention::select('size')->distinct('size')->get();
      $sizedetail = TyreDimention::find($size);
      $sizedetail->views = $sizedetail->views +1;
      $sizedetail->save();
      $tyre = Tyre::find($id);
      $tyre_sizes = TyreDimention::where('tyre_id', $tyre->id)->get();
//      $thailand = TyreMadein::where('tyre_dimention_id', $tyre->id)->where('')->count();
      $thailand = TyreMadein::join('tyre_dimentions', 'tyre_countries.tyre_dimention_id', '=', 'tyre_dimentions.id')
              ->where('tyre_dimentions.tyre_id', $tyre->id)
              ->where('tyre_countries.madecountry_id', 1)
                ->count();
      $china = TyreMadein::join('tyre_dimentions', 'tyre_countries.tyre_dimention_id', '=', 'tyre_dimentions.id')
              ->where('tyre_dimentions.tyre_id', $tyre->id)
              ->where('tyre_countries.madecountry_id', 2)
                ->count();      
      $relatedtypres = Tyre::where('driveexperience_id', $tyre->driveexperience_id)->where('id','!=', $tyre->id)->take(3)->get();
      return view('client.product-detail', [
          'tyre' => $tyre, 
          'sizes' => $sizes, 
          'relatedtypres' => $relatedtypres,
          'models' => $models,
          'brands' => $brands,
          'tyre_sizes' => $tyre_sizes,
          'thailand' => $thailand,
          'china' => $china,
          'sizedetail' => $sizedetail
          ]);
    }

    public function nqt() {
      $sectioncontents = \App\Models\SectionContent::where('key','LIKE',"%ve_nqt%")->get();
//      $content = \App\Models\SectionContent::where('key', 've_nqt_thanh_lap')->first();
//      dd($content);
      return view('client.aboutnqt', ['sectioncontents' => $sectioncontents]);
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
    
    public function posts($slug) {
      $post = Posts::where('slug', $slug)->first();
      return view('client.post', ['post' => $post]);
    }
    
    public function promotion() {
      return view('client.promotion');
    }
    
    public function contactus() {
      return view('client.contactus');
    }

    public function shopingCart(){
     return view('client.shoping-cart');
    }

    public function checkout(){
      $file_name = 'tinh_tp';
      $tinh = $this->readJson($file_name);

      return view('client.checkout', compact('tinh'));
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
}
