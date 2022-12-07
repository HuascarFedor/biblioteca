<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'editorial', 'cover'];

    public function getUrlCover(){
        return Storage::url($this->cover);
    }

    public function deleteCover(){
        if($this->cover != "public/covers/no-image.png")
            Storage::delete($this->cover);
    }

    public function authors(){
        //pertenece a muchos
        return $this->belongsToMany(Author::class);
    }

    public function copies(){
        //tiene muchos
        return $this->hasMany(Copy::class);
    }
}
