<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use App\Models\sach;
use Cart;
use Livewire\Component;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart as CartCart;


class GiohangController extends Controller
{

    public function index()
    {
        $danhmuc=danhmuc::getData();
        return view ('user.cart',['danhmuc'=>$danhmuc]);
    }

    public function add(Request $re){
        $sach = sach::find($re->masach);
        //dd($sach);
        $row = ['id'=>$sach->masach,'name'=>$sach->tensach, 'price'=>$sach->gia,
                'quantity'=>$re->soluong,'attributes'=>['image'=>$sach->hinhanh]];
        Cart::add($row);
        return redirect()->route('user.giohang');
    }

    public function increaseItem($id){
        $product = Cart::get($id);
        $qty = $product->quantity + 1;
        Cart::update($product,$qty);
    }
    public function decreaseItem($id){
        $product = Cart::get($id);
        if($product->quantity < 1){
            Cart::remove($id);
        }else{
            $qty = $product->quantity-1;
        }
        Cart::update($product,$qty);
    }


    public function remove(Request $re){
        Cart::remove($re->id);
        return redirect()->route('user.giohang');
    }
}
