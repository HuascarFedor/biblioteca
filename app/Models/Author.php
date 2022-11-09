<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function books(){
        //pertenece a muchos
        return $this->belongsToMany(Book::class);
    }
}
