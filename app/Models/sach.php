<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sach extends Model
{
    use HasFactory;
    protected $table = 'sach';
    protected $primaryKey = 'masach';
    protected $keyType = 'string';
    protected $fillable = ['masach','tensach','madm','manxb','hinhanh','soluongkho',
                           'sotrang','kichthuoc','loaibia','gioithieusach','gia','banchay','trangthai'];
    public $encrementing = false;
    public $timestamps= false;

    public function danhmuc(){
        return $this->belongsTo(danhmuc::class,'madm','madm');
    }

    public function nhaxb(){
        return $this->belongsTo(nhaxuatban::class,'manxb','manxb');
    }
    public function getdataBook(){
        return DB::table('sach')->get();
    }
}
