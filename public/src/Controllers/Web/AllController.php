<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */
namespace NINA\Controllers\Web;
use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\SettingModel;
use NINA\Models\NewsModel;
use NINA\Models\StaticModel;
use NINA\Models\ExtensionsModel;
use NINA\Models\ProductListModel;
use NINA\Models\ProductCatModel;
use NINA\Models\ProductBrandModel;
use NINA\Models\TagsModel;
use NINA\Core\Container;
class AllController extends Controller
{
    function composer($view): void
    {
        $extHotline = '';
        $photos = PhotoModel::select('photo', 'namevi', 'nameen',  'link', 'type')
            ->whereIn('type', ['logo', 'banner', 'favicon', 'mangxahoi', 'social2', 'social'])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi'])
            ->get();
        $logoPhoto = $photos->where('type', 'logo')->first();
        $bannerPhoto = $photos->where('type', 'banner')->first();
        $favicon = $photos->where('type', 'favicon')->first();
        $social = $photos->where('type', 'social');
        $social2 = $photos->where('type', 'social2');
        
        $listProductMenu = ProductListModel::select('namevi', 'nameen',  'photo', 'slugvi', 'slugen',  'id')
            ->where('type', 'san-pham',)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $slogan = StaticModel::select('descvi')
            ->where('type', 'slogan')
            ->first();
        $footer = StaticModel::select('namevi', 'nameen',  'contentvi', 'contenten', 'descvi', 'descen', 'photo')
            ->where('type', 'footer')
            ->first();
        $extHotline = ExtensionsModel::select('*')
            ->where('type', 'hotline')
            ->first();
        $extSocial = ExtensionsModel::select('*')
            ->where('type', 'social')
            ->first();
        $chinhsach = \NINA\Models\NewsModel::select('namevi', 'nameen',  'slugvi', 'slugen')
            ->where('type', 'chinh-sach')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $tagsSize = TagsModel::select('namevi','id')
            ->where('type', 'san-pham-size')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $tagsCode = TagsModel::select('namevi','id')
            ->where('type', 'san-pham-code')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $tagsType = TagsModel::select('namevi','id')
            ->where('type', 'san-pham-type')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $tagsBrand = TagsModel::select('namevi','id')
            ->where('type', 'san-pham-brand')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $chinhsach = NewsModel::select('namevi','slugvi')
            ->where('type','chinh-sach')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $setting = SettingModel::first();
        $optSetting = json_decode($setting['options'], true);
        $configType = json_decode(json_encode(config('type')));
        $configType_js = json_decode(json_encode(config('type')),true);
        $upload = json_decode(json_encode(config('upload')));
        $lang = session()->get('locale');
        $view->share(compact(
            'configType',
            'configType_js',
            'upload',
            'logoPhoto',
            'bannerPhoto',
            'favicon',
            'setting',
            'optSetting',
            'listProductMenu',
            'social',
            'social2',
            'footer',
            'extHotline',
            'extSocial',
            'chinhsach',
            'lang',
            'slogan',
            'tagsSize',
            'tagsCode',
            'tagsType',
            'tagsBrand',
            'chinhsach'
        ));
    }
}