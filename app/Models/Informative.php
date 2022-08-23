<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informative extends Model
{
    use HasFactory;

    protected $dates = ['expires_at'];
    protected $fillable = ['title','active','expires_at'];

    public function video() {
        return $this->morphOne(Video::class, 'videoable');
    }
    
    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
    
}
