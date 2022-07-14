<?php

namespace App\Http\Controllers;
use Cart;
use DB;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\chitietsach;
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


    public function show(donhang $donhang)
    {
        //
    }


    public function edit(donhang $donhang)
    {
        //
    }


    public function update(Request $request, donhang $donhang)
    {
        //
    }


    public function destroy(donhang $donhang)
    {
        //
    }
}
