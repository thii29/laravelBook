<?php

namespace App\Http\Controllers;

use App\Models\khuyenmai;
use App\Models\danhmuc;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class KhuyenmaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khuyenmai = khuyenmai::getDataKhuyenMai();
        return view('admin.khuyenmai',['khuyenmai'=>$khuyenmai]);
    }


    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
        $request->validate([
            'makm'=>'required|unique:khuyenmai,makm|max:15',
            'tenkm'=>'required',
            'phantramgiam'=>'required',
            'trangthai'=>'required',
        ],
        [
            'makm.unique'=>'Mã tồn tại!',
            'makm.required'=>'Hãy nhập mã!',
            'makm.max'=>'Mã khuyến mãi không được quá 15 ký tự!',
            'tenkm.required'=>'Tên không được để trống!',
            'phantramgiam.required'=>'Không được để trống phần trăm giảm giá!',
            'trangthai.required'=>'Trạng thái không được để trống!'
        ]);
        $km = new khuyenmai();
        $km->makm = $request->makm;
        $km->tenkm = $request->tenkm;
        $km->phantramgiam = $request->phantramgiam;
        $km->trangthai = $request->trangthai;
        //dd($km);
        $km->save();
        return redirect()->route('admin.km');
    }


    public function find(Request $request)
    {
        //
        $danhmuc=danhmuc::getData();
        $km = khuyenmai::getMa($request->makm);
        return view('user.cart',['km'=>$km,'danhmuc'=>$danhmuc]);
    }


    public function edit($makm)
    {
        //
        return view('admin.suakhuyenmai',['khuyenmai'=>khuyenmai::find($makm)]);
    }


    public function update(Request $request)
    {
        //
        $request->validate([
            'makm'=>'required|max:15',
            'tenkm'=>'required',
            'phantramgiam'=>'required',
            'trangthai'=>'required',
        ],
        [
            'makm.required'=>'Hãy nhập mã!',
            'makm.max'=>'Mã khuyến mãi không được quá 15 ký tự!',
            'tenkm.required'=>'Tên không được để trống!',
            'phantramgiam.required'=>'Không được để trống phần trăm giảm giá!',
            'trangthai.required'=>'Trạng thái không được để trống!'
        ]);
        $khuyenmai = khuyenmai::find($request->makm);
        $khuyenmai->tenkm = $request->tenkm;
        $khuyenmai->phantramgiam = $request->phantramgiam;
        $khuyenmai->trangthai = $request->trangthai;
        $khuyenmai->save();
        return redirect()->route('admin.km');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        // $km=khuyenmai::find($request->makm);
        // if(count($km->donhang)!=0){
        //     session()->flash('fail','Mã này đang được áp dụng, không thể xoá!');
        //     return redirect()->route('admin.km');
        // }
        khuyenmai::find($request->makm)->delete();
        return redirect()->route('admin.km');
    }
}
