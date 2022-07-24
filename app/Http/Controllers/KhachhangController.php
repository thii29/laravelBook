<?php

namespace App\Http\Controllers;
use DB;
use App\Models\danhmuc;
use App\Models\sach;
use App\Models\khachhang;
use App\Models\nhaxuatban;
use Illuminate\Http\Request;
class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexShop()
    {
        $danhmuc=danhmuc::getData();
        $sach=sach::paginate(9);
        $nxb=nhaxuatban::all();
        if($key = request()->key){
            $sach=sach::where('tensach','like','%'.$key.'%')->paginate(9);
        }
        return view('user.shop',['danhmuc'=>$danhmuc,'sach'=>$sach,'nxb'=>$nxb]);
    }

    public function formlogin(){
        $danhmuc=danhmuc::getData();
        return view('user.login',['danhmuc'=>$danhmuc]);
    }

    public function checklogin(Request $re){
        $re->validate([
            'email'=>'required',
            'password'=>'required|min:6|max:50'
        ],[
            'email.required'=>'Hãy điền gmail!',
            'password.required'=>'Hãy điền password',
            'password.min'=>'Password không được nhỏ hơn 6 ký tự!',
            'password.max'=>'Password không được lớn hơn 50 ký tự!',
        ]);
        $u=khachhang::where('email',$re->email)->first();
       // dd($u);
        if(!$u){
            session()->flash('fail','Email này không tồn tại!');
            return redirect()->route('user.loginform');
        }
        if($re->password==$u->password){
            session()->put('login',['email'=>$u->email,
                                    'hoten'=>$u->hoten,'makh'=>$u->makh,
                                    'diachi'=>$u->diachi,'sdt'=>$u->sdt]);
            return redirect("/");
        }else{
            session()->flash('fail','Sai mật khẩu!');
            return redirect()->route('user.loginform');
        }

    }

    public function logout(){
        session()->forget('login');
        return redirect("/");
    }
    public function createAcc()
    {
        $danhmuc=danhmuc::getData();
        return view('user.register',['danhmuc'=>$danhmuc]);
    }

    public function register(Request $request){
        $request->validate([
            'email'=>'unique:khachhang,email',
            'password'=>'min:6',
        ],[
            'email.unique'=>'Email này đã tồn tại!',
            'password.min'=>'Password tối thiểu 6 ký tự!',
        ]);
        $user = [
            'hoten'=> $request->hoten,
            'diachi'=> $request->diachi,
            'sdt'=> $request->sdt,
            'email'=> $request->email,
            'password'=>$request->password,
        ];
        return redirect()->route('user.loginform')->with(['user'=>khachhang::insert($user)]);
    }

    public function show($email)
    {
        $kh = khachhang::detailKhach($email);
        return view('user.information',['kh'=>$kh]);
    }


    public function contact(){
        $danhmuc=danhmuc::getData();
        return view('user.contact', compact('danhmuc'));
    }

    public function listKhachHang(){
        $kh = khachhang::khachhang();
        return view('admin.danhsachkhachhang',compact('kh'));
    }

    public function update(Request $request, khachhang $khachhang)
    {
        //
    }
    public function destroy(khachhang $khachhang)
    {
        //
    }
}
