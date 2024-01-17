<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nis';
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
