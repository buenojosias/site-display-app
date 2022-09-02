<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informative extends Model
{
    use HasFactory;

    protected $dates = ['expires_at'];
    protected $fillable = ['category_id','title','type','url','active','expires_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function video() {
        return $this->morphOne(Video::class, 'videoable');
    }
    
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
    
}
