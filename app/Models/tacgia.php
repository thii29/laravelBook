<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tacgia extends Model
{
    use HasFactory;
    protected $table = 'tacgia';
    protected $primaryKey = 'matg';
    protected $keyType = 'string';
    protected $fillable = ['matg','tentg','gioithieu'];
    public $encrementing = false;
    public $timestamps= false;

    public function chitietsach(){
        return $this->hasMany(chitietsach::class,'matg','matg');
    }
    public function getDataTG(){
        return DB::table('tacgia')->get();
    }
}
