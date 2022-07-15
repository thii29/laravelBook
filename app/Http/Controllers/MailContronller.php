<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
class MailContronller extends Controller
{
    //
    public function sendmail(Request $r){
         $danhmuc=danhmuc::getData();

        if($r->email){
            Mail::to($r->email)->send(new SendMail);
        }
        return view('user.index',['mess'=>'sendmail','danhmuc'=>$danhmuc]);
    }
}
