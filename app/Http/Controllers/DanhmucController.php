<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use App\Models\khuyenmai;
use Illuminate\Http\Request;
use DB;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc=danhmuc::getData();
        return view('admin.danhmuc',['danhmuc'=>$danhmuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.themdanhmuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'madm'=>'required|unique:danhmuc|max:10',
            'tendm'=>'required',
        ],
        [
            'madm.unique'=>'Mã tồn tại!',
            'madm.required'=>'Mã trống',
            'tendm.required'=>'Tên trống'
        ]);
        $dm = new danhmuc();
        $dm->madm = $request->madm;
        $dm->tendm = $request->tendm;
        $dm->save();
        return redirect()->route('admin.danhmuc');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function show(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function edit($madm)
    {
        //
        return view('admin.suadanhmuc',['danhmuc'=>danhmuc::find($madm)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'madm'=>'required|unique:danhmuc|max:10',
            'tendm'=>'required',
        ],
        [
            'madm.unique'=>'Mã tồn tại!',
            'madm.required'=>'Mã trống',
            'tendm.required'=>'Tên trống'
        ]);
        $danhmuc = danhmuc::find($request->madm);
        $danhmuc->tendm = $request->tendm;
        $danhmuc->save();
        return redirect()->route('admin.danhmuc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        danhmuc::find($request->madm)->delete();
        return redirect()->route('admin.danhmuc');
    }
}
