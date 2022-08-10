<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['brand','model','color','year','license_plate'];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

}
