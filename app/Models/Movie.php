<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description','rating_star'];

    public function reviews(){
        return $this->hasMany(Review::class);
    }


}
