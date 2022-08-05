<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title'];

    public function category() {
        return $this->belongsTo(SegmentCategory::class);
    }

    public function companies() {
        return $this->hasMany(Company::class);
    }

}
