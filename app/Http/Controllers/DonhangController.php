<?php

namespace App\Http\Controllers;
use Cart;
use App\Models\donhang;
use App\Models\danhmuc;
use App\Models\khuyenmai;
use Illuminate\Http\Request;

class DonhangController extends Controller
{

    public function index(Request $request)
    {
        //
        $km = khuyenmai::where('makm',$request->makm)->get();
        $danhmuc = danhmuc::getData();
        $carts = Cart::content();
       //    dd(Cart::content() );
        return view('user.checkout',compact('danhmuc','carts','km')) ;
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
