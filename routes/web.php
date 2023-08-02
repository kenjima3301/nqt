<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
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

Route::get('/login', [Usercontroller::class, 'login']);
Route::post('/login', [Usercontroller::class, 'validate_login']);
Route::post('/logout', [Usercontroller::class, 'logout']);

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
  
})->middleware('auth');