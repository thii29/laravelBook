<?php

namespace App\Http\Controllers;
use DB;
use App\Models\danhmuc;
use App\Models\sach;
use App\Models\nhaxuatban;
use App\Models\chitietsach;
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
        //dd($detail);
        return view('user.detail',['danhmuc'=>$danhmuc,'detail'=>$detail,'nxb'=>$nxb,'tg'=>$tg]);
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


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        //
        $sach = sach::getdataBook();
        return view('admin.sach',['sach'=>$sach]);
    }


    public function edit(sach $sach)
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
