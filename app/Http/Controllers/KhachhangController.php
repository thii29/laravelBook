<?php

namespace App\Http\Controllers;
use DB;
use App\Models\danhmuc;
use App\Models\sach;
use App\Models\khachhang;
use App\Models\nhaxuatban;
use Illuminate\Http\Request;
class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexShop()
    {
        $danhmuc=danhmuc::getData();
        $sach=sach::paginate(9);
        $nxb=nhaxuatban::all();
        return view('user.shop',['danhmuc'=>$danhmuc,'sach'=>$sach,'nxb'=>$nxb]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(khachhang $khachhang)
    {
        //
    }


    public function edit(khachhang $khachhang)
    {
        //
    }


    public function update(Request $request, khachhang $khachhang)
    {
        //
    }
    public function destroy(khachhang $khachhang)
    {
        //
    }
}
