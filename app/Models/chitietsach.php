<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsach extends Model
{
    use HasFactory;
    protected $table ="chitietsach";
    protected $fillable=['matg','masach','tentg','tensach'];
    public $encrementing = false;
    public $timestamps= false;

    public function tacgia(){
        return $this->belongsTo(tacgia::class,'matg','matg');
    }
    // public function sach(){
    //     return $this->belongsTo(sach::class,'masach','masach');
    // }
    public function getChitiet(){
        return DB::table('chitietsach')->get();
    }

}
