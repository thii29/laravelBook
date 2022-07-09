<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use App\Models\sach;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

// use Livewire\Component;
use Illuminate\Http\Request;

// use Darryldecode\Cart\Cart as CartCart;
use Session;

class GiohangController extends Controller
{

    public function index()
    {
        $danhmuc = danhmuc::getData();
        // $product = array(
        //     'id' => 456,
        //     'name' => 'Sample Item 1',
        //     'price' => 100,
        //     'quantity' => 1,
        //     'attributes' => array(),
        //     'conditions' => 0
        // );

        // // finally add the product on the cart
        // Cart::add($product);
        // Cart::add(2, 'Product 2', 1, 19.95, 550, ['size' => 'medium']);
        // Cart::add(3, 'Product 2', 1, 19.95, 550, ['size' => 'medium']);
        // Cart::add(4, 'Product 2', 1, 19.95, 550, ['size' => 'medium']);
        $carts = Cart::content();
        $count_qty = array_reduce($carts->toArray(), function ($v, $w) {
            return $v + $w['qty'];
        }, 0);

        return view('user.cart', compact('danhmuc', 'carts', 'count_qty'));
    }

    public function add(Request $re)
    {
        $sach = sach::find($re->masach);

        // if ($this->checkQtyCartAndQtyProduct($id, $qty)) { // kiểm tra số lượng
        //    return redirect()->route('user.giohang')->with('notification', 'Số lượng không đủ bán');
        // }

        Cart::add([
            'id' => 456,
            'name' => 'Sample Item 1',
            'price' => 100,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => 'image',
            ]
        ]);
        return redirect()->route('user.giohang');
    }

    public function remove(Request $request)
    {

        $cartItem = Cart::search(function ($index) use ($request) {
            if ($index->id == $request->id) return $index;
        });

        if ($cartItem->first()){
            Cart::remove($cartItem->first()->rowId);
        }

        if (Cart::count() == 0) { // nếu giỏ hàng không tồn tại sp thì xóa giỏ hàng luôn @@@
            Cart::destroy();
        }

        return redirect()->route('user.giohang')->with("notification" , "Xóa thành công");
    }

    private function checkQtyCartAndQtyProduct($id, $qty) // kiểm tra số lượng mua và số lượng sản phẩm còn
    {
        $product = sach::where('id', $id)->first();
        if (!empty($product) && $product->stock < $qty) {
            return true;
        } else {
            return false;
        }
    }

    //update số lượng sản phẩm trong giỏ hàng :
    public function updateQtyProductCart(Request $request)
    { // method put : thay đổi số lượng sản phẩm khi mua hàng
        $id = $request->id;
        $qty = ($request->qty) ? $request->qty : 0;

        // if ($this->checkQtyCartAndQtyProduct($id, $qty)) {
//            return response()->json([
//                'status' => 'error',
//                'text' => 'Số lượng không đủ bán '
//            ], 500);
        // }

        $cartItem = Cart::search(function ($index) use ($id) {
            if ($index->id == $id) return $index;
        });

        $item = $cartItem->first();
        $arr = [];
        if (!empty($item)) {
            if ($qty == 0) Cart::remove($item->rowId);
            else {
                Cart::update($item->rowId, $qty);
                $arr = Cart::get($item->rowId)->toArray();
            }
        }

        $count_qty = array_reduce(Cart::content()->toArray(), function ($v, $w) {
            return $v + $w['qty'];
        }, 0);

        return response()->json([
            'status' => 'success',
            'count_qty' => $count_qty,
            'total' => Cart::subtotal(2, ',', '.'),
            'productCart' => $arr
        ], 200);
    }

    public function removeCart(Request $request)
    {
        return Cart::clear();
    }
}
