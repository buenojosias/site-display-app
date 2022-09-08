<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','question','type','registrable','active'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function thumbnail() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function alternatives() {
        return $this->hasMany(QuizAlternative::class);
    }

}
