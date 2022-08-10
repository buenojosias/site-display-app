<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','segment_id','region','fantasy_name','corporate_name','cnpj','logo','active','daily_limit','day_balance'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function address() {
        return $this->hasOne(CompanyAddress::class);
    }

    public function segment() {
        return $this->belongsTo(Segment::class);
    }
    
}
