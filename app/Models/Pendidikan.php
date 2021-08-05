<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenjang', 'sekolah', 'tgl_masuk', 'tgl_lulus'
    ];
    //protected $guarded = ['name'];
    
    /*public function kamera()
    {
        return $this->hasMany('App\Models\Kamera');
    }*/
}
