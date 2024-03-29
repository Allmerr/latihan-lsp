<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilai extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function mengajar(){
        return $this->belongsTo(Mengajar::class);
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
