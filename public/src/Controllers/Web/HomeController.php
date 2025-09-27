<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */
namespace NINA\Controllers\Web;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\NewsModel;
use NINA\Models\ProductModel;
use NINA\Models\ProductListModel;
use NINA\Models\SettingModel;
use NINA\Models\StaticModel;
use NINA\Models\ProductCatModel;
use NINA\Models\TagsModel;
use NINA\Models\NewslettersModel;
use NINA\Core\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $com = '';
        $cacheTimeInSeconds = 3600;
        $slider = PhotoModel::select('namevi', 'nameen', 'photo', 'link')
            ->where('type', 'slide')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $productNB = ProductModel::select('namevi', 'nameen', 'photo', 'descvi', 'slugvi','slugen', 'regular_price', 'sale_price', 'discount', 'id')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $listProductNB = ProductListModel::select('namevi', 'nameen', 'photo', 'id', 'slugvi','slugen')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $gioithieu = StaticModel::select('namevi', 'nameen', 'descvi', 'descen','photo')
            ->where('type', 'gioi-thieu')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        
        $dichvu = NewsModel::select('namevi', 'nameen', 'photo', 'descvi', 'descen','slugvi','slugen')
            ->where('type', 'dich-vu')
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $tintuc = NewsModel::select('namevi', 'nameen', 'photo', 'descvi', 'descen','slugvi','slugen','date_created')
            ->where('type', 'tin-tuc')
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $doitac = PhotoModel::select('namevi', 'nameen', 'photo', 'link')
            ->where('type', 'doi-tac')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $tieuchi = PhotoModel::select('namevi', 'nameen', 'photo', 'descvi')
            ->where('type', 'tieu-chi')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();   
        $banner1=PhotoModel::select('photo','link')
            ->where('type','banner-quang-cao-1')
            ->first(); 
        $banner2=PhotoModel::select('photo','link')
            ->where('type','banner-quang-cao-2')
            ->first();
        $hinhanh = NewsModel::select('namevi', 'nameen', 'photo', 'descvi', 'descen','slugvi','slugen')
            ->where('type', 'hinh-anh')
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $hinhanh_mota = StaticModel::select('descvi','contentvi')
            ->where('type','hinh-anh-mo-ta')
            ->first();
        $video = PhotoModel::select('namevi', 'nameen', 'photo','link_video')
            ->where('type', 'video')
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
            
        /* SEO */
        $titleMain = SettingModel::pluck('namevi')->first();
        $this->seoPage($titleMain);
        return view('home.index', compact('com','slider','productNB', 'listProductNB', 'gioithieu','dichvu','tintuc','doitac','tieuchi','banner1','banner2','hinhanh','hinhanh_mota','video'));
    }
    // public function ajaxProduct(Request $request)
    // {
    //     $id = $request->get('id') ?? 0;
    //     $type = $request->get('type') ?? 0;
    //     $query = ProductModel::select('namevi', 'photo', 'descvi', 'slugvi', 'regular_price', 'sale_price', 'discount', 'id')
    //         ->where('type', 'san-pham')
    //         ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //         ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
    //     if (!empty($type) && $type == 'cat')  {
    //         $query->where('id_cat', $id);
    //         $productAjax = $query->orderBy('id', 'desc')->get();
    //     }
    //     if (!empty($type) && $type == 'goi-y-hom-nay')  {
    //         $rows = TagsModel::select('namevi', 'descvi', 'type', 'id')
    //         ->where('id', $id)
    //         ->first();
    //         $productAjax = $rows->products()->get();
    //     }
    //     return view('ajax.homeProduct', ['productAjax' => $productAjax]);
    // }
    public function letter(Request $request) {
        $error = array();
        //$data = $request->all();
        $data['fullname'] = $request->input('ten-newsletter')??'';
        $data['address'] = $request->input('diachi-newsletter')??'';
        $data['email'] = $request->input('email-newsletter')??'';
        $data['phone'] = $request->input('dienthoai-newsletter')??'';
        $data['content'] = $request->input('noidung-newsletter')??'';
        $data['date_created'] = Carbon::now()->timestamp;
        $data['confirm_status'] = 1;
        $data['type'] = 'dang-ky-nhan-tin';
        $data['subject'] = "Đăng ký nhận tin";
        if(NewslettersModel::create($data)){
            transfer('Đăng ký nhận tin thành công !',1,PeceeRequest()->getHeader('http_referer'));
        }else{
            transfer('Đăng ký nhận tin thất bại !',0,PeceeRequest()->getHeader('http_referer'));
        }
    }
    // public function ajaxProductNoibat(Request $request)
    // {
    //     $per_page = $request->get('per_page')??4;
    //     $query = ProductModel::select('namevi', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //         ->where('type', 'san-pham')
    //         ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //         ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);  
    //     $productAjax = $query->orderBy('id', 'desc')->paginate($per_page);
    //     return view('ajax.homeProduct', ['productAjax' => $productAjax]);
    // }
    // public function ajaxProductListTab($id_list,Request $request)
    // {        
    //     $ShowViewMore = false;
    //     $idlist = $id_list??0;
    //     $per_page = $request->get('per_page')??4;
    //     if($idlist) {
    //         $productAjax = ProductModel::select('namevi', 'nameen', 'descen', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //             ->where('type','san-pham')
    //             ->where('id_list',$idlist)           
    //             ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //             ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
    //             ->orderBy('numb', 'asc')
    //             ->paginate($per_page);
    //     }
    //     else {
    //         $productAjax = ProductModel::select('namevi', 'nameen', 'descen', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //             ->where('type','san-pham')
    //             ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //             ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
    //             ->orderBy('numb', 'asc')
    //             ->paginate($per_page);
    //     }
    //     return view('ajax.homeProduct', ['productAjax' => $productAjax]);
    // }
    // public function ajaxProductList($id_list,Request $request)
    // {        
    //     $ShowViewMore = false;
    //     $idlist = $id_list??0;
    //     $per_page = $request->get('per_page')??4;
    //     $productAjax = ProductModel::select('namevi', 'nameen', 'descen', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //             ->where('type','san-pham')
    //             ->where('id_list',$idlist)            
    //             ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //             ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
    //             ->orderBy('numb', 'asc')
    //             ->paginate($per_page);
    //     return view('ajax.homeProduct', ['productAjax' => $productAjax]);
    // }
    // public function ajaxProductListCat($id_list,Request $request)
    // {        
    //     $ShowViewMore = false;
    //     $idlist = $id_list??0;
    //     $per_page = $request->get('per_page')??4;
    //     $id_cat = $request->get('id_cat')??0;
    //     $query = ProductModel::select('namevi', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //             ->where('type','san-pham')
    //             ->where('id_list',$idlist)            
    //             ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //             ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
    //     if($id_cat!=0) $query->where('id_cat',$id_cat);
    //     $productAjax = $query->orderBy('numb', 'asc')->orderBy('id', 'desc')->paginate($per_page);
    //     // $query->orderBy('numb', 'asc')->orderBy('id', 'desc')->toSql();
    //     // echo "<pre>";
    //     // print_r($query->toSql());
    //     // print_r($query->getBindings());
    //     // echo "</pre>";
    //     return view('ajax.homeProduct', ['productAjax' => $productAjax]);
    // }
    // public function ajaxProductTab($id_tab,Request $request)
    // {        
    //     $ShowViewMore = false;
    //     $id_tab = $id_tab??0;
    //     if($id_tab==0) return false;
    //     $per_page = $request->get('per_page')??4;
    //     $productAjax = ProductModel::select('namevi', 'nameen', 'descen', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //             ->where('type','san-pham')
    //             ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //             ->whereRaw("FIND_IN_SET(?,status)", [$id_tab])
    //             ->orderBy('numb', 'asc')
    //             ->paginate($per_page);
    //     // $query = ProductModel::select('namevi', 'nameen', 'descen', 'photo', 'descvi', 'slugvi', 'regular_price','sale_price','discount','id')
    //     //         ->where('type','san-pham')
    //     //         ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
    //     //         ->whereRaw("FIND_IN_SET(?,status)", [$id_tab])
    //     //         ->orderBy('numb', 'asc');
    //     // echo "<pre>";
    //     // print_r($query->toSql());
    //     // print_r($query->getBindings());
    //     // echo "</pre>";
    //     return view('ajax.homeProduct', ['productAjax' => $productAjax]);
    // }
    public function ajaxProductPaging(Request $request){
        $productAll = ProductModel::select('*')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
        $id = [];
        if (isset($request['list']) && $request['list']!=0) {
            $id['id_list']=$request['list'];
            $product = $productAll
                        ->where('id_list',$request['list'] )
                        ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
        }
        if (isset($request['cat']) && $request['cat']!=0) {
            $id['id_cat']=$request['cat'];
            $product = $productAll
                        ->where('id_cat',$request['cat'] )
                        ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
        }
        if (isset($request['status']) && $request['status']!='') {
            $id['status']=$request['status'];
            $product = $productAll
                        ->whereRaw("FIND_IN_SET(?,status)", [$request['status']]);
        }
        $product = $product
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(8,['*'],'page',$request['page']);
        return view('ajax.homeProduct',[
            'productAjax'=>$product,
            'page'=>$product->lastPage(),
            'pagereturn'=>$request['page_return'],
            'currentPage'=>$product->currentPage(),
            'id'=>$id,
        ]);
    }
}