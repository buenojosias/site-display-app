<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAlternative extends Model
{
    use HasFactory;

    protected $fillable = ['answer','correct'];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

}
