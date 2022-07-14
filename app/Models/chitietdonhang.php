<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = ['mahoadon','masach','tensach','soluongmua','tongtien'];
    public $encrementing = false;
    public $timestamps= false;

    public function donhang(){
        return $this->belongsTo(donhang::class,'mahoadon','mahoadon');
    }
}
