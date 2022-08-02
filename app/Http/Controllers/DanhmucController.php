<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use App\Models\sach;
use App\Models\tacgia;
use App\Models\nhaxuatban;
use Illuminate\Http\Request;
use DB;

class DanhmucController extends Controller
{

    public function index()
    {
        $danhmuc=danhmuc::all();
        return view('admin.danhmuc',['danhmuc'=>$danhmuc]);
    }


    public function create()
    {
        return view('admin.themdanhmuc');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'madm'=>'required|unique:danhmuc,madm|max:10',
            'tendm'=>'required|unique:danhmuc,tendm',
        ],
        [
            'madm.unique'=>'Mã này đã tồn tại!',
            'madm.required'=>'Mã không được để trống!',
            'tendm.required'=>'Tên không được để trống!',
            'tendm.unique'=>'Tên danh mục này đã tồn tại!'
        ]);
        $dm = new danhmuc();
        $dm->madm = $request->madm;
        $dm->tendm = $request->tendm;
        $dm->save();
        return redirect()->route('admin.danhmuc');
    }


    public function show(danhmuc $danhmuc)
    {
        //
    }


    public function edit($madm)
    {
        //
        return view('admin.suadanhmuc',['danhmuc'=>danhmuc::find($madm)]);

    }


    public function update(Request $request)
    {
        //
        $request->validate([
            'madm'=>'required|max:10',
            'tendm'=>'required|unique:danhmuc,tendm',
        ],
        [
            'madm.required'=>'Mã không được để trống!',
            'tendm.required'=>'Tên không được để trống!',
            'tendm.unique'=>'Tên danh mục này đã tồn tại!'
        ]);
        $danhmuc = danhmuc::find($request->madm);
        $danhmuc->tendm = $request->tendm;
        $danhmuc->trangthai = $request ->trangthai;
        $danhmuc->save();
        return redirect()->route('admin.danhmuc');
    }

    public function showListBook2($madm){
        $danhmuc = danhmuc::all();
        $nxb = nhaxuatban::all();
        $tacgia = tacgia::all();
        $sach = sach::where('madm',$madm)->paginate(9);
        //dd($sach);
        return view('user.loc', compact('danhmuc','sach','nxb','tacgia'));
    }

    public function destroy(Request $request)
    {
        //
        $dm=danhmuc::find($request->madm);
        //dd(count($dm->sach),$request->madm);
        if(count($dm->sach)!= 0){
            //dd(count($dm->sach));
            session()->flash('fail','Danh mục này hiện đang có sách, không thể xoá');
            return redirect()->route('admin.danhmuc');
        }
        danhmuc::find($request->madm)->delete();
        session()->flash('success','Đã xoá thành công!');
        return redirect()->route('admin.danhmuc');
    }
}
