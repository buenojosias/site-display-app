<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title','date','source','url'];

    public function thumbnail() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
