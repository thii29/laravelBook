<?php

namespace App\Http\Controllers;
use DB;
use App\Models\danhmuc;
use App\Models\sach;
use App\Models\nhaxuatban;
use App\Models\chitietsach;
use App\Models\tacgia;
use Illuminate\Http\Request;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //chititetsach
        $danhmuc=danhmuc::getData();
        $nxb=nhaxuatban::getDataNXB();
        $tg=chitietsach::getChitiet();
        $detail=sach::where('masach',$id)->get();
        $sach=sach::getdataBook();
        //dd($detail);
        return view('user.detail',
        ['danhmuc'=>$danhmuc,'detail'=>$detail,'nxb'=>$nxb,'tg'=>$tg,'sach'=>$sach]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $danhmuc=danhmuc::getData();
        $nxb=nhaxuatban::getDataNXB();
        $tacgia=tacgia::getDataTG();
        return view('admin.themsach', compact('danhmuc','nxb','tacgia'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([

        ],[]);
    }


    public function show()
    {
        //
        $sach = sach::getdataBook();
        return view('admin.sach',['sach'=>$sach]);
    }


    public function edit()
    {
        //

    }

    public function update(Request $request, sach $sach)
    {
        //
    }

    public function destroy(sach $sach)
    {
        //
    }
}
