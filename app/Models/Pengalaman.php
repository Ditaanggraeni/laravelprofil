<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'posisi', 'perusahaan','deskripsi'
    ];

    /*public function sewa()
    {
        return $this->hasMany('App\Models\Sewa');
    }*/
}
