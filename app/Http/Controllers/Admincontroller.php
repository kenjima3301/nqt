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
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\RoleUser;

class Admincontroller extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ADMIN');
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
    $tyre = Tyre::create([
          'name'   => $request->name,
          'model_id'   => $request->model_id,
          'brand_id'   => $request->brand_id,
          'driveexperience_id'   => $request->drive_id,
          'tyre_structure'   => $request->tyre_structure,
          'tyre_features'   => json_encode($request->features),
          'price' => $request->price
      ]);
    if($request->install != ''){
    $path = public_path().'/tyre/install/';
      if (!file_exists($path)) {
        mkdir($path, 0775, true);
      }
    $imageName = time().'.'.$request->install->extension();
    $request->install->move(public_path('tyre/install'), $imageName);
    $tyre->install_position_image = 'tyre/install/'.$imageName;
    $tyre->save();
    }
      
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
  
  public function edittyre($id) {
    $tyre = Tyre::find($id);
    $brands = Brand::all();
    $models = Modelcar::all();
    $drives = Drive::all();
    return view('admin.trucktyres.edit', [
        'tyre' => $tyre,
        'brands' => $brands,
        'models' => $models,
        'drives' => $drives
        ]);
  }
  
  public function edittyrepost(Request $request) {
    $tyre = Tyre::find($request->tyre_id);
    if($request->install != ''){
    $path = public_path().'/tyre/install/';
      if (!file_exists($path)) {
        mkdir($path, 0775, true);
      }
    $imageName = time().'.'.$request->install->extension();
    $request->install->move(public_path('tyre/install'), $imageName);
    $tyre->install_position_image = 'tyre/install/'.$imageName;
    $tyre->save();
    }
    $tyre->name = $request->name;
    $tyre->model_id   = $request->model_id;
    $tyre->brand_id   = $request->brand_id;
    $tyre->driveexperience_id   = $request->drive_id;
    $tyre->tyre_structure   = $request->tyre_structure;
    $tyre->tyre_features   = json_encode($request->features);
    $tyre->price = $request->price;
    $tyre->save();
    $imagexisted_ids = $request->images_uploaded;
    TyreImage::where('tyre_id', $tyre->id)->whereNotIn('id',$imagexisted_ids)->delete();
      if($request->filenames != ''){
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
    }
      
    return redirect('admin/lop-xe-tai-import/'.$tyre->id);
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
              if(count($row) !=22 || $row[2] != 'Quy cách'){
                return back()->with('success', 'Hãy chọn đúng file import.');
              }
                continue;
            }else {
              $row = array_map('trim', $row);
              $tyredimention = TyreDimention::create([
                     'tyre_id' => $tyre->id,
                      'size' => $row[2],
                      'ply' => $row[3],
                      'sevice_index' => $row[4],
                      'unit' => $row[5],
                      'tread_type' => $row[6],
                      'total' => $row[7],
                      'price' => $row[8],
                      'lr_pr'   => $row[9],
                      'tread_depth' => $row[10],
                      'standard_rim' => $row[11],
                      'overall_diameter' => $row[12],
                      'section_width'   => $row[13],
                      'single_kg' => $row[14],
                      'single_lbs' => $row[15],
                      'single_kpa' => $row[16],
                      'single_psi' => $row[17],
                      'dual_kg'   => $row[18],
                      'dual_lbs' => $row[19],
                      'dual_kpa' => $row[20],
                      'dual_psi' => $row[21]
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
          ["China", "Thailand", "Quy cách","Lớp bố", "Chỉ số tải trọng và tốc độ","Đơn vị","Kiểu gai","Số lượng","Đơn giá", "LR / PR","Tread Depth (mm)", "Standard Rim", 
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
  
  public function editdealer($id) {
    $dealer = Dealer::find($id);
    if($dealer->user_id != NULL){
      $dealeraccount = User::find($dealer->user_id);
    }else {
      $dealeraccount = NULL;
    }
    $provinces = Province::all();
    return view('admin.dealer.edit', ['provinces' => $provinces, 'dealer'=> $dealer, 'dealeraccount' => $dealeraccount]);
    
  }
  
  public function editdealerpost(Request $request) {
   
    $dealer = Dealer::find($request->dealer_id);
    if($request->image != ''){
       $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('dealer/image'), $imageName);
        $path = public_path().'/dealer/image/';
          if (!file_exists($path)) {
            mkdir($path, 0775, true);
          }
        $dealer->image = 'dealer/image/'.$imageName;
    }
    
         $dealer->name  = $request->name;
         $dealer->area   = $request->area;
         $dealer->province   = $request->province;
         $dealer->address  = $request->address;
         $dealer->lat   = $request->lat;
         $dealer->lng   = $request->lng;
         $dealer->email   = $request->email;
         $dealer->phone  = $request->phone;
         $dealer->save();
    return redirect('admin/dai-ly/edit/'.$dealer->id);
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
//       $imageFile = $dom->getElementsByTagName('img');
// 
//       foreach($imageFile as $item => $image){
//           $data = $image->getAttribute('src');
//           list($type, $data) = explode(';', $data);
//           list(, $data)      = explode(',', $data);
//           $imgeData = base64_decode($data);
//           $path = public_path().'/uploads/';
//            if (!file_exists($path)) {
//              mkdir($path, 0775, true);
//            }
//           $image_name= "/uploads/" . time().$item.'.png';
//           $path = public_path() . $image_name;
//           file_put_contents($path, $imgeData);
//           
//           $image->removeAttribute('src');
//           $image->setAttribute('src', $image_name);
//        }       
        $slug = Str::slug($request->title);
        $post = Posts::where('slug', 'like', '%'.$slug.'%')->orderBy('id', 'desc')->first();
        if($post){
          $slugarray = explode('-', $post->slug);
          $endslug = end($slugarray);
          if(is_numeric($endslug)){
            $endslug = $endslug +1;
          }else {
            $endslug = 1;
          }
          $slug = Str::slug($request->title).'-'.$endslug;
        }
       Posts::create([
            'type_id' => $request->type,
            'title' => $request->title,
            'slug' => $slug,
            'content' => $content,
            'status' => 'public'
       ]);
 
       return redirect('admin/bai-viet');
    }
    
    public function editblog($id) {
    $post = Posts::find($id);
    $types = PostType::all();
    return view('admin.blog.edit', ['types' => $types,'post' => $post]);
  }
  
    public function editblogpost($id, Request $request)
    {
        $post = Posts::find($id);
        $this->validate($request, [
             'title' => 'required',
             'content' => 'required'
        ]);
 
       $content = $request->content;
       $dom = new \DomDocument();
       @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
//       $imageFile = $dom->getElementsByTagName('img');
// 
//       foreach($imageFile as $item => $image){
//           $data = $image->getAttribute('src');
//           list($type, $data) = explode(';', $data);
//           list(, $data)      = explode(',', $data);
//           $imgeData = base64_decode($data);
//           $path = public_path().'/uploads/';
//            if (!file_exists($path)) {
//              mkdir($path, 0775, true);
//            }
//           $image_name= "/uploads/" . time().$item.'.png';
//           $path = public_path() . $image_name;
//           file_put_contents($path, $imgeData);
//           
//           $image->removeAttribute('src');
//           $image->setAttribute('src', $image_name);
//        }  
       $post->type_id = $request->type;
       if($request->title != $post->title){
          $post->title = $request->title;
          $slug = Str::slug($request->title);
          $post = Posts::where('slug', 'like', '%'.$slug.'%')->orderBy('id', 'desc')->first();
          if($post){
                $slugarray = explode('-', $post->slug);
                $endslug = end($slugarray);
                if(is_numeric($endslug)){
                  $endslug = $endslug +1;
                }else {
                  $endslug = 1;
                }
                $slug = Str::slug($request->title).'-'.$endslug;
            }
            $post->slug = $slug;
       }
       $post->content = $content;
       $post->save();
 
       return redirect('admin/bai-viet');
    }
    
    public function adddealeruser(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        $user->email_verified_at = now();
        $user->save();
        RoleUser::create([
            'role_id' => 4,
            'user_id' => $user->id
        ]);
        $dealer = Dealer::find($request->dealer_id);
        $dealer->user_id = $user->id;
        $dealer->save();
        return back()->with('successaccount','Thêm mới thành công tài khoản cho đại lý');
    }
    
    public function deleteallsize($id) {
      TyreDimention::where('tyre_id',$id)->delete();
      
      return back();
    }
    
    public function deletetyre($id) {
      Tyre::where('id', $id)->delete();
      return back();
    }
}
