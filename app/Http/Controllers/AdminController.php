<?php

namespace App\Http\Controllers;
use DB;
use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=admin::getDataAdmin();
        return view('admin.index',['admin'=>$admin]);
    }

    public function showlogin(){
        return view('admin.login');
    }
    public function checklogin(Request $re){
        $re->validate([
            'email'=>'required',
            'password'=>'required|min:6|max:50',
        ],[
            'email.required'=>'Email sai hoặc để trống!',
            'password.required'=>'Password bỏ trống!',
            'password.min'=>'Mật khẩu không được nhỏ hơn 6 ký tự!',
            'password.max'=>'Mật khẩu không được vượt quá 50 ký tự!',
        ]);
        //dd($re->all());
        $a=admin::where('email',$re->email)->first();
        //dd($a);
        if(!$a){
            session()->flash('mess','Email này không tồn tại!');
            return redirect()->route('admin.loginform');
        }
        if($re->password==$a->password){
            session()->put('dangnhap', ["email"=>$a->email,
                            "hoten"=>$a->hoten,
                            "maadmin"=>$a->maadmin,
                            "phanquyen"=>$a->phanquyen,]);
            //dd(session('dangnhap'));
            return redirect()->route('admin.showindex');
        }else{
            session()->flash('mess'.'Sai mat khau!');
            return redirect()->route('admin.loginform');
        }

    }
    public function logout(){
        session()->forget('dangnhap');
        return redirect()->route('admin.loginform');
    }

    public function showReg(){
        return view('admin.register');
    }

    public function register(Request $request){
        $request->validate([
            'email'=>'unique:admin,email',
            'password'=>'min:6|max:50',
        ],[
            'email.unique'=>'Email này đã tồn tại!',
            'password.min'=>'Password tối thiểu 8 ký tự',
            'password.max'=>'Password tối đa 50 ký tự',
        ]);
        $a = [
            'hoten'=> $request->hoten,
            'email'=> $request->email,
            'password'=>$request->password,
        ];
        //dd($a);
        return redirect()->route('admin.loginform')->with(['admin'=>admin::insert($a)]);
    }
    public function show($email){
        //dd($email);

        $admin = admin::detailAd($email);
        return view('admin.informad',['admin'=>$admin]);
    }
    // admin kt và chỉnh sửa tk của admin khác
    public function show_ID(admin $id){
        if (session('dangnhap')["phanquyen"] == 0) {
            return redirect()->back()->with('error','Không có quyền hạn truy cập!');
        }
        $admin = admin::find($id);
        //dd($admin);
        return view('admin.qladmin',['admin'=>$admin]);
    }
    public function editinfor(Request $re){
        // $re->validate([
        //     'email'=>'unique:admin,email',
        //     'password'=>'min:6',
        // ],[
        //     'email.unique'=>'Email này đã tồn tại!',
        //     'password.min'=>'Password phải lớn hơn 6 ký tự',
        // ]);
        $admin = admin::find($re->maadmin);
        $admin->hoten = $re->hoten;
        $admin->email = $re->email;
        $admin->password = $re->password;
        $admin->phanquyen = $re->phanquyen;
        //dd($admin);
        $admin->save();
        return redirect()->route('admin.showindex');
    }
    public function password(){
        return view('admin.password');
    }
}
