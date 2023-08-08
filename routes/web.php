<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AjaxController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/lop-xe-tai/{id}', [HomeController::class, 'productDetail'])->name('product-detail');
Route::get('/tim-lop-xe', [HomeController::class, 'listProduct'])->name('list-product');
Route::post('/tim-lop-xe', [HomeController::class, 'listProductpost']);
Route::post('/tim-lop-xe-filter', [HomeController::class, 'listProductpostfilter']);
Route::get('/ve-nqt', [HomeController::class, 'nqt'])->name('nqt');
Route::get('/tim-dai-ly', [HomeController::class, 'finddealer'])->name('finddealer');
Route::get('/dich-vu', [HomeController::class, 'services'])->name('services');
Route::get('/ve-trazano', [HomeController::class, 'trazano'])->name('trazano');
Route::get('/khuyen-mai', [HomeController::class, 'promotion'])->name('promotion');
Route::get('/blog/{slug}', [HomeController::class, 'posts'])->name('posts');
Route::get('/lien-he', [HomeController::class, 'contactus'])->name('contactus');
Route::get('/shoping-cart', [HomeController::class, 'shopingCart'])->name('shoping-cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::post('/get-subdata', [HomeController::class, 'getSubData'])->name('user.get_subdata');

Route::get('/login', [Usercontroller::class, 'login']);
Route::post('/login', [Usercontroller::class, 'validate_login']);
Route::post('/logout', [Usercontroller::class, 'logout']);
Route::get('dang-ky-tai-khoan', [Usercontroller::class, 'register']);
Route::post('register', [Usercontroller::class, 'registerpost']);
Route::get('email/verify/{id}/{token}', [Usercontroller::class, 'verifyemail']);
Route::get('quen-mat-khau', [Usercontroller::class, 'forgotpass']);
Route::post('forgotpass', [Usercontroller::class, 'forgotpasspost']);
Route::get('email/changepass/{id}/{token}', [Usercontroller::class, 'changepass']);
Route::post('changepass', [Usercontroller::class, 'changepasspost']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/', function () {
    return redirect('admin/lop-xe-tai');
  });
  Route::get('/loai-xe', [Admincontroller::class, 'model']);
  Route::get('/loai-xe-add', [Admincontroller::class, 'addmodel']);
  Route::post('/loai-xe-add', [Admincontroller::class, 'addmodelpost']);
  
  Route::get('/nuoc-san-xuat', [Admincontroller::class, 'madein']);
  Route::get('/nuoc-san-xuat-add', [Admincontroller::class, 'addmadein']);
  Route::post('/nuoc-san-xuat-add', [Admincontroller::class, 'addmadeinpost']);
  
  Route::get('/hang-san-xuat', [Admincontroller::class, 'brand']);
  Route::get('/hang-san-xuat-add', [Admincontroller::class, 'addbrand']);
  Route::post('/hang-san-xuat-add', [Admincontroller::class, 'addbrandpost']);
  
  Route::get('/kieu-duong-lai', [Admincontroller::class, 'driveexperiences']);
  Route::get('/kieu-duong-lai-add', [Admincontroller::class, 'adddriveexperiences']);
  Route::post('/kieu-duong-lai-add', [Admincontroller::class, 'adddriveexperiencespost']);
  
  Route::get('/lop-xe-tai', [Admincontroller::class, 'trucktyres']);
  Route::get('/lop-xe-tai-add', [Admincontroller::class, 'addtrucktyres']);
  Route::post('/lop-xe-tai-add', [Admincontroller::class, 'addtrucktyrespost']);
  Route::get('/lop-xe-tai-import/{id}', [Admincontroller::class, 'import']);
  Route::post('/lop-xe-tai-import/{id}', [Admincontroller::class, 'importpost']);
  Route::get('/lop-xe-tai-import-download', [Admincontroller::class, 'importdownload']);
  
  Route::get('/dai-ly', [Admincontroller::class, 'dealer']);
  Route::get('/dai-ly-add', [Admincontroller::class, 'adddealer']);
  Route::post('/dai-ly-add', [Admincontroller::class, 'adddealerpost']);
  Route::get('/dai-ly/edit/{id}', [Admincontroller::class, 'editdealer']);
  Route::post('/dai-ly-edit', [Admincontroller::class, 'editdealerpost']);
  Route::post('register-dealer', [Admincontroller::class, 'adddealeruser']);
  
  Route::get('/bai-viet', [Admincontroller::class, 'blog']);
  Route::get('/bai-viet-add', [Admincontroller::class, 'addblog']);
  Route::post('/bai-viet-add', [Admincontroller::class, 'addblogpost']);
  Route::get('/bai-viet-edit/{id}', [Admincontroller::class, 'editblog']);
  Route::post('/bai-viet-edit/{id}', [Admincontroller::class, 'editblogpost']);
  
  Route::get('/quan-ly-khac', [Admincontroller::class, 'groupmanagement']);
  
})->middleware('auth');

Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
  Route::get('/', function () {
    return redirect('staff/bang-quan-tri');
  });
  Route::get('/bang-quan-tri', [StaffController::class, 'dashboard']);
  Route::get('/trazano', [StaffController::class, 'trazano']);
  Route::post('/trazano', [StaffController::class, 'trazanosearch']);
  Route::get('/trazano/{id}', [StaffController::class, 'trazanobyid']);
  Route::post('/xuat-lop-xe-tai', [StaffController::class, 'truckoutput']);
  Route::get('/goldencrown', [StaffController::class, 'goldencrown']);
  Route::post('/goldencrown', [StaffController::class, 'goldencrownsearch']);
  Route::get('/othertyre', [StaffController::class, 'othertyre']);
  Route::post('/findtyre', [StaffController::class, 'findtyre']);
  Route::get('/xuat-hang-dai-ly', [StaffController::class, 'outputtodealer']);
  Route::get('/xuat-hang-dai-ly/{id}', [StaffController::class, 'outputtyretodealer']);
  Route::get('/xoa-nhap-dai-ly/{id}', [StaffController::class, 'deteleoutput']);
  Route::get('/xac-nhan-xuat-hang-dai-ly/{id}', [StaffController::class, 'confirmoutput']);
  Route::get('/huy-xuat-hang-dai-ly/{id}', [StaffController::class, 'canceloutput']);
  Route::post('/updateoutput', [StaffController::class, 'updateoutput']);
  Route::get('/downloadoutput/{id}', [StaffController::class, 'downloadoutput']);
  Route::get('/da-nhan-hang-tu-nqt/{id}', [StaffController::class, 'nqtoutputconfirm']);
  Route::get('/xuat-hang-khach-le', [StaffController::class, 'outputtoclient']);
  Route::get('/xac-nhan-xuat-hang-khach-le/{id}', [StaffController::class, 'confirmoutputtoclient']);
  Route::get('/huy-xuat-hang-khach-le/{id}', [StaffController::class, 'canceloutputtoclient']);
  Route::get('/khach-le-da-nhan-hang-tu-nqt/{id}', [StaffController::class, 'nqtoutputconfirmclient']);
  Route::get('/xuat-hang-chi-tiet/{id}', [StaffController::class, 'outputdetail']);
  Route::post('/findoutputbycode', [StaffController::class, 'findoutputbycode']);
  Route::get('/don-hang-online', [StaffController::class, 'orders']);
  Route::get('/chi-tiet-don-online/{id}', [StaffController::class, 'orderdetail']);
})->middleware('auth');

Route::group(['prefix' => 'client', 'as' => 'client'], function () {
  Route::get('/', function () {
    return redirect('client/profile');
  });
  Route::get('/profile', [ClientController::class, 'profile']);
  Route::get('/gio-hang', [ClientController::class, 'cart'])->name('client.gio-hang');
  Route::get('/thanh-toan', [ClientController::class, 'checkout']);
  Route::post('/updateprofile', [ClientController::class, 'updateprofile']);
  Route::get('/them-gio-hang/{id}', [ClientController::class, 'addtocart']);
  Route::get('/xoa-san-phan-gio-hang/{id}', [ClientController::class, 'removetyrefromcar']);
  Route::post('/xac-nhan-don-hang', [ClientController::class, 'checkoutconfirm']);
  Route::get('/don-hang', [ClientController::class, 'order']);
  Route::get('/don-hang-chi-tiet/{id}', [ClientController::class, 'orderdetail']);
})->middleware('auth');

Route::group(['prefix' => 'dealer', 'as' => 'dealer.'], function () {
  Route::get('/', function () {
    return redirect('dealer/bang-quan-tri');
  });
  Route::get('/bang-quan-tri', [DealerController::class, 'dashboard']);
  Route::get('/trazano', [DealerController::class, 'trazano']);
  Route::post('/trazano', [DealerController::class, 'trazanosearch']);
  Route::get('/trazano/{id}', [DealerController::class, 'trazanobyid']);
  Route::post('/xuat-lop-xe-tai', [DealerController::class, 'truckoutput']);
  Route::get('/goldencrown', [DealerController::class, 'goldencrown']);
  Route::post('/goldencrown', [DealerController::class, 'goldencrownsearch']);
  Route::get('/othertyre', [DealerController::class, 'othertyre']);
  Route::post('/findtyre', [DealerController::class, 'findtyre']);
  Route::get('/xuat-hang-tu-NQT', [DealerController::class, 'nqtoutput']);
  Route::get('/downloadoutput/{id}', [DealerController::class, 'downloadoutput']);
  Route::get('/da-nhan-hang-tu-nqt/{id}', [DealerController::class, 'nqtoutputconfirm']);
  Route::get('kho-hang', [DealerController::class, 'inventory']);
  Route::get('/xuat-hang-cho-khach', [DealerController::class, 'outputtoclient']);
  Route::get('/xac-nhan-xuat-hang-cho-khach/{id}', [DealerController::class, 'confirmoutputtoclient']);
  Route::get('/huy-xuat-hang-cho-khach/{id}', [DealerController::class, 'canceloutputtoclient']);
  Route::get('/xuat-hang-chi-tiet/{id}', [DealerController::class, 'outputdetail']);
  Route::post('/findoutputbycode', [DealerController::class, 'findoutputbycode']);
  Route::post('/updateoutput', [DealerController::class, 'updateoutput']);
})->middleware('auth');

// Ajax 
Route::post('get_get_size_list_by_tyre_id', [AjaxController::class, 'get_get_size_list_by_tyre_id'])->name('get_get_size_list_by_tyre_id');
Route::post('get_get_size_list_by_tyre_id_and_dealer', [AjaxController::class, 'get_get_size_list_by_tyre_id_and_dealer'])->name('get_get_size_list_by_tyre_id_and_dealer');
Route::post('add_temp_output', [AjaxController::class, 'add_temp_output'])->name('add_temp_output');

