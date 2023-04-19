<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Modelcar;
use App\Models\Madein;
use App\Models\Brand;
use App\Models\Drive;
use App\Models\Tyre;
use App\Models\TyreImage;
use App\Models\TyreDimention;
use App\Models\TyreMadein;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\PostType;
use App\Models\Posts;
use Shuchkin\SimpleXLSXGen;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Str;

class Admincontroller extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    
  public function model() {
    $models = Modelcar::all();
    return view('admin.model.index', ['models' => $models]);
  }
  
  public function addmodel() {
    return view('admin.model.add');
  }
  
  public function addmodelpost(Request $request) {
    Modelcar::create([
        'name' => $request->name
    ]);
    return redirect('admin/loai-xe');
  }
  
  public function madein() {
    $madeins = Madein::all();
    return view('admin.madein.index', ['madeins' => $madeins]);
  }
  
  public function addmadein() {
    return view('admin.madein.add');
  }
  
  public function addmadeinpost(Request $request) {
    $imageName = time().'.'.$request->flag->extension();
    $request->flag->move(public_path('country/flag'), $imageName);
    $path = public_path().'/country/flag/';
      if (!file_exists($path)) {
        mkdir($path, 0775, true);
      }
    Madein::create([
          'name'   => $request->name,
          'flag'   => 'country/flag/'.$imageName,
      ]);
    return redirect('admin/nuoc-san-xuat');
  }
  
  public function brand() {
    $brands = Brand::all();
    return view('admin.brand.index', ['brands' => $brands]);
  }
  
  public function addbrand() {
    return view('admin.brand.add');
  }
  
  public function addbrandpost(Request $request) {
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('brand/image'), $imageName);
    $path = public_path().'/brand/image/';
      if (!file_exists($path)) {
        mkdir($path, 0775, true);
      }
    Brand::create([
          'name'   => $request->name,
          'image'   => 'brand/image/'.$imageName,
      ]);
    return redirect('admin/hang-san-xuat');
  }
  
  public function driveexperiences() {
    $drives = Drive::all();
    return view('admin.driveexperiences.index', ['drives' => $drives]);
  }
  
  public function adddriveexperiences() {
    return view('admin.driveexperiences.add');
  }
  
  public function adddriveexperiencespost(Request $request) {
//    $features = $request->features;
//    $images = $request->images;
//    
//    $addfeatures = array();
//    foreach ($features as $key =>  $feature){
//      if($feature){
//        $path = public_path().'/drive/image/';
//          if (!file_exists($path)) {
//            mkdir($path, 0775, true);
//          }
//        $image = $images[$key];
//        $imageName = time().$key.'.'.$image->extension();
//        $image->move(public_path('drive/image'), $imageName);
//        $addfeatures[$key]['feature'] = $feature;
//        $addfeatures[$key]['image'] = 'drive/image/'.$imageName;
//      }
//    }
    Drive::create([
          'name'   => $request->name,
          'description'   => $request->description,
//          'features'   => json_encode($addfeatures),
      ]);
    return redirect('admin/kieu-duong-lai');
  }
  
  public function trucktyres() {
    $tyres = Tyre::where('model_id', 1)->orderBy("id", "desc")->get();
    return view('admin.trucktyres.index', ['tyres' => $tyres]);
  }
  
  public function addtrucktyres() {
    $brands = Brand::all();
    $models = Modelcar::all();
    $drives = Drive::all();
    return view('admin.trucktyres.add', [
        'brands' => $brands,
        'models' => $models,
        'drives' => $drives
        ]);
  }
  
  public function addtrucktyrespost(Request $request) {
    
    $path = public_path().'/tyre/install/';
      if (!file_exists($path)) {
        mkdir($path, 0775, true);
      }
    $imageName = time().'.'.$request->install->extension();
    $request->install->move(public_path('tyre/install'), $imageName);
    
      $tyre = Tyre::create([
          'name'   => $request->name,
          'model_id'   => $request->model_id,
          'brand_id'   => $request->brand_id,
          'driveexperience_id'   => $request->drive_id,
          'tyre_structure'   => $request->tyre_structure,
          'tyre_features'   => json_encode($request->features),
          'install_position_image'   => 'tyre/install/'.$imageName,
      ]);
      $images = $request->filenames;
      foreach ($images as $key => $image){
        $path = public_path().'/tyre/image/';
        if (!file_exists($path)) {
          mkdir($path, 0775, true);
        }
        $imageName = time().$key.'.'.$image->extension();
        $image->move(public_path('tyre/image'), $imageName);
        TyreImage::create([
            'tyre_id' => $tyre->id,
             'image' => 'tyre/image/'.$imageName
        ]);
      }
      
    return redirect('admin/lop-xe-tai');
  }
  
  public function import($id) {
    $tyre = Tyre::find($id);
    $tyre_dimentions = TyreDimention::where('tyre_id', $id)->get();
    return view('admin.trucktyres.import', ['tyre' => $tyre, 'tyre_dimentions' => $tyre_dimentions]);
  }
  
  public function importpost($id, Request $request) {
    $this->validate($request, [
               'importfile' => 'required|file|mimes:xls,xlsx'
           ]);
      $file = $request->file('importfile');
      if ( $datas = SimpleXLSX::parse($file) ) {
        $tyre = Tyre::find($id);
        foreach ($datas->readRows() as $key => $row){
            if ( $key === 0 ) {
              if(count($row) !=17 || $row[2] != 'Size'){
                return back()->with('success', 'Hãy chọn đúng file import.');
              }
                continue;
            }else {
              $row = array_map('trim', $row);
              $tyredimention = TyreDimention::create([
                     'tyre_id' => $tyre->id,
                      'size' => $row[2],
                      'lr_pr'   => $row[3],
                      'sevice_index' => $row[4],
                      'tread_depth' => $row[5],
                      'standard_rim' => $row[6],
                      'overall_diameter' => $row[7],
                      'section_width'   => $row[8],
                      'single_kg' => $row[9],
                      'single_lbs' => $row[10],
                      'single_kpa' => $row[11],
                      'single_psi' => $row[12],
                      'dual_kg'   => $row[13],
                      'dual_lbs' => $row[14],
                      'dual_kpa' => $row[15],
                      'dual_psi' => $row[16]
                  ]);
              if(intval($row[0]) == 1){
                TyreMadein::create([
                    'tyre_dimention_id' => $tyredimention->id,
                    'madecountry_id' => 2
                ]);
              }
              if(intval($row[1]) === 1){
                TyreMadein::create([
                    'tyre_dimention_id' => $tyredimention->id,
                    'madecountry_id' => 1
                ]);
              }
            }
        }
        return back()->with('success', 'Đã import thành công.');
      }
  }


  public function importdownload(Request $request) {
      $data = [
          ["China", "Thailand", "Size", "LR / PR", "Service index","Tread Depth (mm)", "Standard Rim", 
            "Overall Diameter (mm)","Section Width (mm)", "Single (kg) ", "Single (lbs) ", "Single (kPa) ", "Single (psi)", 
              "Dual (kg) ", "Dual (lbs) ", "Dual (kPa) ", "Dual (psi)"]
        ];
       $xlsx = SimpleXLSXGen::fromArray( $data ); 
       $xlsx = new SimpleXLSXGen();
      $xlsx->addSheet( $data, "Import Sai" );
       $xlsx->downloadAs('mau-import-sai.xlsx');
        exit();

  }
  
  
  
  public function dealer() {
    $dealers = Dealer::all();
    return view('admin.dealer.index', 
            ['dealers' => $dealers]);
  }
  
  public function adddealer() {
    $provinces = Province::all();
    return view('admin.dealer.add', ['provinces' => $provinces]);
  }
  
  public function adddealerpost(Request $request) {
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('dealer/image'), $imageName);
    $path = public_path().'/dealer/image/';
      if (!file_exists($path)) {
        mkdir($path, 0775, true);
      }
    
      Dealer::create([
          'name'   => $request->name,
        'area'   => $request->area,
        'province'   => $request->province,
        'address'   => $request->address,
        'lat'   => $request->lat,
        'lng'   => $request->lng,
        'email'   => $request->email,
        'phone'   => $request->phone,
          'image'   => 'dealer/image/'.$imageName,
      ]);
    return redirect('admin/dai-ly');
  }
  
  public function groupmanagement() {
    $models = Modelcar::all();
    $madeins = Madein::all();
    $brands = Brand::all();
    $drives = Drive::all();
    return view('admin.group.index', [
        'models' => $models,
        'madeins' => $madeins,
        'brands' => $brands,
        'drives' => $drives
        ]);
  }
  
  public function blog() {
    $blogs = Posts::all();
    return view('admin.blog.index', ['blogs' => $blogs]);
  }
  
  public function addblog() {
    $types = PostType::all();
    return view('admin.blog.add', ['types' => $types]);
  }
  
  public function addblogpost(Request $request)
    {
        $this->validate($request, [
             'title' => 'required',
             'content' => 'required'
        ]);
 
       $content = $request->content;
       $dom = new \DomDocument();
       @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $imageFile = $dom->getElementsByTagName('img');
 
       foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $path = public_path().'/uploads/';
            if (!file_exists($path)) {
              mkdir($path, 0775, true);
            }
           $image_name= "/uploads/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
 
       $content = $dom->saveHTML();
       
       Posts::create([
            'type_id' => $request->type,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $content,
            'status' => 'public'
       ]);
 
       return redirect('admin/bai-viet');
    }
}
