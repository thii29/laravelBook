<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class khuyenmai extends Model
{
    use HasFactory;
    protected $table = 'khuyenmai';
    protected $primaryKey = 'makm';
    protected $keyType = 'string';
    protected $fillable = ['makm','tenkm','phantramgiam','trangthai'];
    public $encrementing = false;
    public $timestamps= false;

    public function donhang(){
        return $this->hasOne(donhang::class,'makm','makm');
    }
    public function getDataKhuyenMai(){
        return DB::table('khuyenmai')->get();
    }
    public function getMa($makm){
        return khuyenmai::where('makm',$makm)->get();
    }
}
