<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsach extends Model
{
    use HasFactory;
    protected $table ='chitietsach';
    protected $fillable=['matg','masach','tentg','tensach'];
    protected $keyType = 'string';
    public $encrementing = false;
    public $timestamps= true;

    public function tacgia(){
        return $this->belongsTo(tacgia::class);
    }

     public function sach(){
         return $this->belongsToMany(sach::class,'masach','masach');
    }
    public function getChitiet(){
        return DB::table('chitietsach')->get();
    }

}
