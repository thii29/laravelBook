<?php

namespace App\Http\Controllers;

use App\Models\tacgia;
use App\Models\chitietsach;
use App\Models\sach;
use App\Models\danhmuc;
use App\Models\nhaxuatban;
use Illuminate\Http\Request;

class TacgiaController extends Controller
{

    public function index()
    {
        $tacgia = tacgia::getDataTG();
        return view('admin.tacgia',['tacgia'=>$tacgia]);
    }


    public function create()
    {
        //
        return view('admin.themtacgia');
    }

    public function store(Request $request)
    {
        //luu tac gia moi
        $request->validate([
            'matg'=>'required|unique:tacgia,matg|max:15',
            'tentg'=>'required|unique:tacgia,tentg',
            'gioithieu'=>'max:225',
        ],[
            'matg.required'=>'Không được bỏ trống mã tác giả!',
            'matg.unique'=>'Mã tác giả này đã tồn tại!',
            'matg.max'=>'Mã tác giả không được vượt quá 15 ký tự!',
            'tentg.required'=>'Không được bỏ trống tên tác giả!',
            'tentg.unique'=>'Tên tác giả này đã tồn tại!',
            'gioithieu.max'=>'Phần giới thiệu không được vượt quá 225 ký tự!'
        ]);

        $tg = new tacgia();
        $tg->matg=$request->matg;
        $tg->tentg=$request->tentg;
        $tg->gioithieu=$request->gioithieu;
        $tg->save();
        return redirect()->route('admin.tg');
    }


    public function show($matg)
    {
        $chitiet = tacgia::where('matg',$matg)->get();
        //dd($chitiet);
        return view('admin.chitiettg',['chitiet'=>$chitiet]);
    }

    public function edit(tacgia $tacgia)
    {
        //
    }

    public function showlistBook3($matg){
        $danhmuc = danhmuc::all();
        $nxb = nhaxuatban::all();
        $tacgia = tacgia::all();
        $sach = chitietsach::where('matg',$matg)->paginate(9);
        //dd($sach);
        return view('user.loctacgia', compact('danhmuc','sach','nxb','tacgia'));
    }
    public function update(Request $request )
    {
        //luu thong tin chinh sua
        $request->validate([
            'tentg'=>'required',
            'gioithieu'=>'max:225'
        ],[
            'tentg.required'=>'Tên tác giả không được để trống!',
            'gioithieu.max'=>'Giới thiệu không được quá 225 từ!'
        ]);
        $tacgia = tacgia::find($request->matg);
        $tacgia->tentg=$request->tentg;
        $tacgia->gioithieu=$request->gioithieu;
        $tacgia->save();
        return redirect()->route('admin.tg');
    }

    public function destroy(Request $request)
    {
        //xoa tac gia
        $cttg = chitietsach::where('matg',$request->matg)->first();
        $tg = tacgia::where('matg',$request->matg)->first();
        if($cttg->matg == $tg->matg){
            session()->flash('fail','Không thể xoá tác giả đang có tác phẩm');
            return redirect()->route('admin.tg');
        }
        tacgia::find($request->matg)->delete();
        session()->flash('success','Xoá thành công');
        return redirect()->route('admin.tg');
    }
}
