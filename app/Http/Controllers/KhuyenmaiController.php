<?php

namespace App\Http\Controllers;

use App\Models\khuyenmai;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'makm'=>'required|unique:khuyenmai|max:10',
            'tenkm'=>'required',
        ],
        [
            'makm.unique'=>'Mã tồn tại!',
            'makm.required'=>'Mã trống',
            'tenkm.required'=>'Tên trống'
        ]);
        $km = new khuyenmai();
        $km->makm = $request->makm;
        $km->tenkm = $request->tenkm;
        $km->phantramgiam = $request->phantramgiam;
        $km->trangthai = $request->trangthai;
        $km->save();
        return redirect()->route('admin.km');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function show(khuyenmai $khuyenmai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function edit($makm)
    {
        //
        return view('admin.suakhuyenmai',['khuyenmai'=>khuyenmai::find($makm)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khuyenmai  $khuyenmai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
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
        khuyenmai::find($request->makm)->delete();
        return redirect()->route('admin.km');
    }
}
