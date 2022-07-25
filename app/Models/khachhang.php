<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $primaryKey = 'makh';
    protected $keyType = 'int';
    protected $fillable = ['makh','hoten','email','diachi','sdt','password'];
    public $encrementing = false;
    public $timestamps= false;

    public function khachhang(){
        return DB::table('khachhang')->get();
    }
    public function detailKhach($email){
        return khachhang::where('email',$email)->get();
    }
}
