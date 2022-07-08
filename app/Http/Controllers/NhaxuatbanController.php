<?php

namespace App\Http\Controllers;

use App\Models\nhaxuatban;
use Illuminate\Http\Request;

class NhaxuatbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nxb=nhaxuatban::getDataNXB();
        return view('admin.nhaxuatban',['nxb'=>$nxb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.themnxb');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ham luu thong tin duoc them vao
        $request->validate([
            'manxb'=>'required|unique:nhaxuatban,manxb|max:15',
            'tennxb'=>'required|unique:nhaxuatban,tennxb'
        ],[
            'manxb.required'=>'Không được để trống mã!',
            'manxb.unique'=>'Mã này đã tồn tại!',
            'manxb.max'=>'Mã nhà xuất bản không được vượt quá 15 ký tự!',
            'tennxb.required'=>'Không được để trống tên!',
            'tennxb.unique'=>'Tên nhà xuất bản này đã tồn tại!'
        ]);
        $nhaxb = new nhaxuatban();
        $nhaxb->manxb=$request->manxb;
        $nhaxb->tennxb=$request->tennxb;
        $nhaxb->save();

        return redirect()->route('admin.nxb');
    }


    public function show(nhaxuatban $nhaxuatban)
    {
        //
    }

    public function edit($manxb)
    {
        //
        return view('admin.suanhaxuatban',['nxb'=>nhaxuatban::find($manxb)]);
    }


    public function update(Request $re)
    {
        //
        $re->validate([
            'tennxb'=>'required|unique:nhaxuatban,tennxb'
        ],[
            'tennxb.required'=>'Tên không được bỏ trống!',
            'tennxb.unique'=>'Tên nhà xuất bản không được trùng!'
        ]);
        $nxb=nhaxuatban::find($re->manxb);
        $nxb->tennxb=$re->tennxb;
        $nxb->save();
        return redirect()->route('admin.nxb');
    }


    public function destroy(Request $request)
    {
        //xoa
        $nxb=nhaxuatban::find($request->manxb);
        if(count($nxb->sach)!=0){
            session()->flash('fail','Không thể xoá, nhà xuất bản này hiện đang chứa sách');
            return redirect()->route('admin.nxb');
        }
        //dd(count($nxb->sach));
        nhaxuatban::find($request->manxb)->delete();
        session()->flash('success','Xoá thành công!');
        return redirect()->route('admin.nxb');
    }
}
