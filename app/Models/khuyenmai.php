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
    protected $fillable = ['makm','tenkm','phantramgiam','trangthai'];
    public $encrementing = false;
    public $timestamps= false;

    public function getDataKhuyenMai(){
        return DB::table('khuyenmai')->get();
    }
}
