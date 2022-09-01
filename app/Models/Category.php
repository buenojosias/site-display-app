<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title','type'];

    public function news() {
        return $this->hasMany(News::class);
    }

    public function informatives() {
        return $this->hasMany(Informative::class);
    }
    
    public function quizzes() {
        return $this->hasMany(Quiz::class);
    }
}
