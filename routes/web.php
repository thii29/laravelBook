<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\danhmuc;
use App\Models\khuyenmai;
use App\Models\sach;
use Illuminate\Routing\Route as RoutingRoute;

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
Route::get('/',function(){
    $danhmuc=danhmuc::getData();
    $sach=sach::getdataBook();
    $km=khuyenmai::getdataKhuyenMai();
    return view('user.index',['danhmuc'=>$danhmuc,'sach'=>$sach,'km'=>$km]);
});

//admin
Route::group(['prefix'=>'admin'],function(){
    //admin
    Route::get('showlogin','AdminController@showlogin')->name('admin.loginform');
    Route::get('index','AdminController@index')->name('admin.showindex');
    Route::post('check','AdminController@checklogin')->name('admin.check'); //dang nhap
    Route::get('logout','AdminController@logout')->name('admin.logout'); //dang xuat
    Route::get('showreg','AdminController@showReg')->name('admin.formreg');
    Route::post('register','AdminController@register')->name('admin.register');
    //thong tin admin
    Route::get('informad/{email}','AdminController@show')->name('admin.inform');
    Route::put('editinfor','AdminController@editinfor')->name('admin.editinform');
    Route::get('inforID','AdminController@show_ID')->name('admin.inforID');
    //password
    Route::get('pass','AdminController@password')->name('admin.password');
    //danhmuc
    Route::get('danhmuc','DanhmucController@index')->name('admin.danhmuc');
    Route::get('formthem','DanhmucController@create')->name('admin.formthem');
    Route::post('themdanhmuc','DanhmucController@store')->name('admin.themdm');
    Route::delete('xoadanhmuc','DanhmucController@destroy')->name('admin.xoadm');
    Route::get('formsua/{madm}','DanhmucController@edit')->name('admin.formsuadm');
    Route::put('suadanhmuc','DanhmucController@update')->name('admin.suadm');
    //khuyenmai
    Route::get('khuyenmai','KhuyenmaiController@index')->name('admin.km');
    Route::post('themkm','KhuyenmaiController@add')->name('admin.themkm');
    Route::get('formsuakm/{makm}','KhuyenmaiController@edit')->name('admin.formsuakm');
    Route::put('suakhuyenmai','KhuyenmaiController@update')->name('admin.suakm');
    Route::delete('xoakm','KhuyenmaiController@destroy')->name('admin.xoakm');
    //nhaxuatban
    Route::get('nxb','NhaxuatbanController@index')->name('admin.nxb');
    Route::get('formthemnxb','NhaxuatbanController@create')->name('admin.formthemnxb');
    Route::post('themnxb','NhaxuatbanController@store')->name('admin.themnxb');
    Route::get('formsuanxb/{manxb}','NhaxuatbanController@edit')->name('admin.formsuanxb');
    Route::put('suanxb','NhaxuatbanController@update')->name('admin.suanxb');
    Route::delete('xoanxb','NhaxuatbanController@destroy')->name('admin.xoanxb');
    //tacgia
    Route::get('tacgia','TacgiaController@index')->name('admin.tg');
    Route::get('chitiettg/{matg}','TacgiaController@show')->name('admin.chitiettg'); // vua chi tiet vua la form sửa
    Route::get('formthemtg','TacgiaController@create')->name('admin.formthemtg');
    Route::post('themtg','TacgiaController@store')->name('admin.themtg');
    Route::put('suatg','TacgiaController@update')->name('admin.suatg');
    Route::delete('xoatg','TacgiaController@destroy')->name('admin.xoatg');
    //Sach
    Route::get('sach','SachController@show')->name('admin.sach');
    Route::get('formthemsach','SachController@create')->name('admin.formthemsach');
    Route::post('themsach','SachController@store')->name('admin.themsach');
    Route::get('formsuasach/{$masach}','SachController@edit')->name('admin.formsuasach');
    //donhang
    Route::get('dsdonhang','DonhangController@show')->name('admin.dsdonhang');
    Route::get('chitietdh/{madh}','DonhangController@edit')->name('admin.chitietdh');
    Route::put('duyetdon','DonhangController@update')->name('admin.duyet');
    //khachhang - của admin
    Route::get('dskh','KhachhangController@listKhachHang')->name('admin.dskh');
});


//khach hang
Route::group(['prefix'=>'user'],function(){
    //login - logout
    Route::get('loginform','KhachhangController@formlogin')->name('user.loginform');
    Route::post('checklogin','KhachhangController@checklogin')->name('user.check');
    Route::get('logout','KhachhangController@logout')->name('user.logout');
    //dang ky
    Route::get('formdangky','KhachhangController@createAcc')->name('user.formreg');
    Route::post('checkdk','KhachhangController@register')->name('user.dangky');
    //thong tin kh
    Route::get('inform/{email}','KhachhangController@show')->name('user.infor');
    //view
    Route::get('shop','KhachhangController@indexShop')->name('user.shop');
    //chitietsach
    Route::get('detail/{masach}','SachController@index')->name('user.detailbook');
    //gio hang
    Route::get('giohang','GiohangController@index')->name('user.giohang');
    Route::post('add','GiohangController@add')->name('user.addgiohang');
    Route::delete('remove','GiohangController@remove')->name('user.removecart');
    //checkout
    Route::post('checkout','DonhangController@index')->name('user.checkout');
    Route::post('dathang','DonhangController@store')->name('user.dathang');
    //lienlac
    Route::get('contact','KhachhangController@contact')->name('user.contact');

});

Route::put('add-cart' , "GiohangController@updateQtyProductCart")->name('add.qty.product');
