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

    public function links() {
        return $this->hasOne(Link::class);
    }

    public function advertisings() {
        return $this->hasMany(Advertising::class);
    }

    public function balance() {
        return $this->morphOne(Balance::class, 'balanceable');
    }

    public function transactions() {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function segment() {
        return $this->belongsTo(Segment::class);
    }

    public function displays() {
        return $this->hasManyThrough(Display::class, Advertising::class);
    }

    // public function getCnpjAttribute($cnpj) {
    //     return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
    // }
    
}
