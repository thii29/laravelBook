<?php

namespace App\Models;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sach;
use DB;
class danhmuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    protected $primaryKey = 'madm';
    protected $keyType = 'string';
    protected $fillable = ['madm','tendm'];
    public $encrementing = false;
    public $timestamps= false;

    public function sach(){
        return $this->hasMany(sach::class,'madm','madm');
    }
    public function getData(){
       // return DB::table('danhmuc')->get();
       return danhmuc::all();
    }
}
