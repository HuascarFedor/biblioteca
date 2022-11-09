<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors(){
        //pertenece a muchos
        return $this->belongsToMany(Author::class);
    }

    public function copies(){
        //tiene muchos
        return $this->hasMany(Copy::class);
    }
}
