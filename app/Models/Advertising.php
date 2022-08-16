<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','title','active','latitude','longitude','cpd','expires_at'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function displays() {
        return $this->hasMany(Display::class);
    }

    public function accesses() {
        return $this->hasManyThrough(LinkAccess::class, Display::class);
    }

    public function video() {
        return $this->morphOne(Video::class, 'videoable');
    }
    
    // public function setCpdAttribute($cpd) {
    //     $cpd = number_format(str_replace(",",".",str_replace(".","",$cpd)), 2, '.', '');
    //     return 8;
    // }

    // public function getCpdAttribute($cpd) {
    //     return number_format($cpd/100, 2, ',', '.');
    // }

}
