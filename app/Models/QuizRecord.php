<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizRecord extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id','alternative','driver_id'];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
    
}
