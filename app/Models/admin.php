<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'maadmin';
    protected $keyType = 'int';
    protected $fillable = ['maadmin','hoten','email','password','phanquyen'];
    public $encrementing = false;
    public $timestamps= false;

    public function getDataAdmin(){
        return DB::table('admin')->get();
    }
    public function detailAd($email){
        return admin::where('email',$email)->get();
    }
}
