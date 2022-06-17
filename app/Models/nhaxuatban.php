<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhaxuatban extends Model
{
    use HasFactory;
    protected $table = 'nhaxuatban';
    protected $primaryKey = 'manxb';
    protected $keyType = 'string';
    protected $fillable =['manxb','tennxb'];
    public $encrementing = false;
    public $timestamps= false;

    public function sach(){
        return $this->hasMany(sach::class,'manxb','manxb');
    }
}
