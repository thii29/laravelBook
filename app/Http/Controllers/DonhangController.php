<?php

namespace App\Http\Controllers;
use Cart;
use DB;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\danhmuc;
use App\Models\khuyenmai;
use Illuminate\Http\Request;

class DonhangController extends Controller
{

    public function index(Request $request)
    {
        //

        $km = khuyenmai::where('makm', $request->makm)->get();
        $danhmuc = danhmuc::getData();
        $carts = Cart::content();
        $subtotal = (double)Cart::subtotal(0,"","");
        return view('user.checkout',compact('danhmuc','carts','km','subtotal')) ;
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $count = (int)Cart::count();
        //dd($count);
        // $date = getdate();
        // var_dump($date);
        $donhang = new donhang();
        $total = (double)Cart::subtotal(0,"","");
        $donhang->makh = $request->makh;
        $donhang->ngaytao = $request->ngaydat;
        $donhang->hotenkh = $request->hoten;
        $donhang->sdt = $request->sdt;
        $donhang->diachi = $request->diachi;
        if($request->makm != NULL){
            $donhang->makm = $request->makm;
            $discount = 100-($request->phantramgiam);
            $donhang->tongtien = $total * ($discount/100);
        }else{
            $donhang->makm=null;
            $donhang->tongtien = $total;
        }
        $donhang->ghichu=$request->ghichu;
        $donhang->save();
        $donhang=DB::table('donhang')->max('mahoadon');
        foreach(Cart::content() as $carts){
            $chitiet = array();
            $chitiet['mahoadon'] = $donhang;
            $chitiet['masach'] = $carts->id;
            $chitiet['tensach'] = $carts->name;
            $chitiet['giasach'] = $carts->price;
            $chitiet['soluongmua'] = $carts->qty;
            $chitiet['tongtiensp'] = $carts->price*$carts->qty;
            chitietdonhang::insert($chitiet);
        }
        //dd($donhang, $chitiet);

        Cart::destroy();
        return view('user.thanku');
    }


    public function show()
    {
        //
        $donhang = DB::table('donhang')->get();
        return view('admin.donhang',compact('donhang'));
    }


    public function edit($madh)
    {
        //
        $dh = donhang::where('mahoadon',$madh)->get();
        $ctdh = chitietdonhang::where('mahoadon',$madh)->get();
        return view('admin.chitietdh',compact('dh','ctdh'));
    }


    public function update(Request $request)
    {
        $dh = donhang::find($request->madh);
        $dh->makh=$request->makh;
        $dh->hotenkh=$request->hotenkh;
        $dh->ngaytao=$request->ngaytao;
        $dh->sdt=$request->sdt;
        $dh->diachi=$request->diachi;
        $dh->makm=$request->makm;
        $dh->tongtien=$request->tongtien;
        $dh->ghichu=$request->ghichu;
        $dh->trangthai = $request->trangthai;
        $dh->update();
        return redirect()->route('admin.dsdonhang');
    }


    public function destroy(donhang $donhang)
    {
        //
    }
}
