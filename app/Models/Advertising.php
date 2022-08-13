<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = ['title','active','latitude','longitude','cpd','expires_at'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function displays() {
        return $this->hasMany(Display::class);
    }

}
