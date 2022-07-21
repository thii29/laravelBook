<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $primaryKey='mahoadon';
    protected $keyType='int';
    protected $fillable =['mahoadon','makh','ngaytao','hotenkh','sdt','diachi','diachi','makm',
                            'tongtien','ghichu','trangthai'];
    public $encrementing = false;
    public $timestamps= false;

    public function chitietdonhang(){
        return $this->hasOne(chitietdonhang::class,'mahoadon','mahoadon');
    }
    public function khuyenmai(){
        return $this->belongsTo(khuyenmai::class,'makm','makm');
    }
}
