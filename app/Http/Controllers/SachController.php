<?php

namespace App\Http\Controllers;
use DB;
use App\Models\danhmuc;
use App\Models\sach;
use App\Models\nhaxuatban;
use App\Models\chitietsach;
use App\Models\tacgia;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

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
        $detail=sach::where('masach',$id)->get();
        $danhmuc=danhmuc::getData();
        $nxb=nhaxuatban::getDataNXB();
        $sach=sach::all();
        $tg=chitietsach::where('masach',$id)->get();
        $tacgia = tacgia::all();
        //dd($tg);
        //dd($detail);
        return view('user.detail',['danhmuc'=>$danhmuc,
                                'detail'=>$detail,'nxb'=>$nxb,
                                'tg'=>$tg,'sach'=>$sach,'tacgia'=>$tacgia]);
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
            'masach'=>'required|unique:sach,masach|max:15',
            'tensach'=>'required|unique:sach,tensach',

            'matg'=>'required',
            'tentg'=>'required',
            'hinhanh'=>'mimes:jpg,jpeg,png,gif'
        ],[
            'masach.required'=>'Mã sách không được để trống',
            'masach.unique'=>'Mã sách đã tồn tại',
            'masach.max'=>'Mã sách không được vượt quá 15 ký tự',
            'tensach,required'=>'Tên sách không được để trống',
            'tensach.unique'=>'Tên sách đã tồn tại',
            'matg.required'=>'Mã tác giả không được để trống',
            'tentg.required'=>'Tên tác giả không được để trống',
            'hinhanh.mimes'=>'Hình ảnh phải có đuôi .jpg, .jpeg, .png, .gif'
        ]);
        $nameimg = $request->file('hinhanh')->getClientOriginalName();
        $request->hinhanh->move(public_path('user/img'),$nameimg);
        $data = [
            'masach'=>$request->masach,
            'tensach'=>$request->tensach,
            'madm'=>$request->madm,
            'manxb'=>$request->manxb,
            'soluongkho'=>$request->soluongkho,
            'sotrang'=>$request->sotrang,
            'kichthuoc'=>$request->kichthuoc,
            'loaibia'=>$request->loaibia,
            'gioithieusach'=>$request->gioithieu,
            'banchay'=>$request->banchay,
            'gia'=>$request->gia,
            'trangthai'=>$request->trangthai,
            'hinhanh'=> $nameimg,
        ];
        $detaildata = [
            'matg'=>$request->matg,
            'tentg'=>$request->tentg,
            'masach'=>$request->masach,
            'tensach'=>$request->tensach,
        ];
        //dd($data);
        sach::create($data);
        chitietsach::insert($detaildata);
        return redirect()->route('admin.sach');
    }


    public function show()
    {
        //
        $sach = sach::all();
        if($keyword = request()->keyword){
            $sach=sach::where('tensach','like','%'.$keyword.'%')->paginate(5);
        }
        return view('admin.sach',compact('sach'));
    }


    public function edit($masach)
    {
        $book = sach::find($masach);
        $danhmuc = danhmuc::all();
        $nxb = nhaxuatban::all();
        $chitiet=chitietsach::all();
        //dd($book, $chitiet);
        return view('admin.suathongtinsach',compact('book','danhmuc','nxb','chitiet'));
    }

    public function update()
    {
        $tenhinh = request()->file('hinhanh')->getClientOriginalName();
        request()->hinhanh->move(public_path('user/img'),$tenhinh);
        $book = [
            'masach'=>request()->masach,
            'tensach'=>request()->tensach,
            'madm'=>request()->madm,
            'manxb'=>request()->manxb,
            'hinhanh'=>$tenhinh,
            'soluongkho'=>request()->soluongkho,
            'sotrang'=>request()->sotrang,
            'kichthuoc'=>request()->kichthuoc,
            'loaibia'=>request()->loaibia,
            'gioithieusach'=>request()->gioithieu,
            'gia'=>request()->gia,
            'banchay'=>request()->banchay,
            'trangthai'=>request()->trangthai,
        ];
        $chitiet = [
            'matg'=>request()->matg,
            'tentg'=>request()->tentg,
            'masach'=>request()->masach,
            'tensach'=>request()->tensach,
        ];
        sach::updated($book);
        chitietsach::updated($chitiet);
        return redirect()->route('admin.sach')->with('success','Sửa thành công');
    }

    public function destroy()
    {
        //
        // $chitiet=chitietsach::where('masach',request()->masach)->get();
        // DB::table('chitietsach')->delete($chitiet);
        $sach = sach::find(request()->masach);
        if($sach->soluongkho != 0){
            session()->flash('fail','Số lượng sách lớn hơn 0');
            return back();
        }
        sach::find(request()->masach)->delete();
        session()->flash('success','Xoá thành công');
        return redirect()->route('admin.sach');
    }
}
