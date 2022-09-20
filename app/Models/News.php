<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','title','date','source','url'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function thumbnail() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function accesses() {
        return $this->morphMany(InteractivityAccess::class, 'accessable');
    }
}
