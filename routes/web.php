<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\danhmuc;
use App\Models\khuyenmai;
use App\Models\sach;

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
    Route::get('index','AdminController@index')->name('admin.showindex');
    //danhmuc
    Route::get('danhmuc','DanhmucController@index')->name('admin.danhmuc');
    Route::get('formthem','DanhmucController@create')->name('admin.formthem');
    Route::post('themdanhmuc','DanhmucController@store')->name('admin.themdm');
    Route::delete('xoadanhmuc','DanhmucController@destroy')->name('admin.xoadm');
    Route::get('formsua/{madm}','DanhmucController@edit')->name('admin.formsuadm');
    Route::put('suadanhmuc','DanhmucController@update')->name('admin.suadm');
    //khuyenmai
    Route::get('khuyenmai','KhuyenmaiController@index')->name('admin.km');
    Route::post('themkm','KhuyenmaiController@store')->name('admin.themkm');
    Route::delete('xoakm','KhuyenmaiController@destroy')->name('admin.xoakm');
    Route::get('formsuakm/{makm}','KhuyenmaiController@edit')->name('admin.formsuakm');
    Route::put('suakhuyenmai','KhuyenmaiController@update')->name('admin.suakm');
});

//khach hang
Route::group(['prefix'=>'user'],function(){
    Route::get('shop','KhachhangController@indexShop')->name('user.shop');
});
