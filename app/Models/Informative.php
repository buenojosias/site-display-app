<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informative extends Model
{
    use HasFactory;

    protected $fillable = ['title','active','expires_at'];

    // has mídia
}
