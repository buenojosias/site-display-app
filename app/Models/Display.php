<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    protected $fillable = ['id','advertising_id','driver_id','datetime','latitude','longitude','cost'];

    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['datetime'];

    public function advertising() {
        return $this->belongsTo(Advertising::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function access() {
        return $this->hasOne(LinkAccess::class);
    }

    // public function getCostAttribute($cost) {
    //     return "R$ " . number_format($cost/100, 2, ',', '.');
    // }

}
