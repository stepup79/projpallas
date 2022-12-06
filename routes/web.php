<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route Danh mục Loại Sản phẩm
Route::resource('/admin/loai', 'Backend\LoaiController', ['as' => 'admin']);

// route Danh mục Sản phẩm
Route::resource('/admin/sanpham', 'Backend\SanPhamController', ['as' => 'admin']);

// route Khách hàng
Route::resource('/admin/khachhang', 'Backend\KhachHangController', ['as' => 'admin']);
Route::get('dang-ky', 'Backend\KhachHangController@create') ->name('admin.khachhang.create');

// route Quản lý
Route::resource('/admin/quanly', 'Backend\QuanLyController', ['as' => 'admin']);

// route Đơn hàng
Route::resource('/admin/donhang', 'Backend\DonHangController', ['as' => 'admin']);

// Backend dashboard
Route::get('/dashboard', 'Backend\BackendController@dashboard')->name('backend.dashboard');

// Frontend index
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');

// Frontend about
Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');

// Frontend policy
Route::get('/chinh-sach', 'Frontend\FrontendController@policy')->name('frontend.policy');

// Frontend tutorial
Route::get('/huong-dan-dat-hoa-va-thanh-toan', 'Frontend\FrontendController@tutorial')->name('frontend.tutorial');

// Frontend contact
Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/gui-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');

// Frontend product
Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');
Route::get('/san-pham/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');

// Frontend cart
Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'Frontend\FrontendController@orderFinish')->name('frontend.orderFinish');

// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');

// Route thống kê
Route::get('/thong-ke', 'Frontend\FrontendController@thongke')->name('frontend.pages.thongke');

// Route chức năng đăng nhập
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
