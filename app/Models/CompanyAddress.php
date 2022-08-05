<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $fillable = ['street_name','number','complement','zipcode','district','city','state'];

    public function company() {
        return $this->belongsTo(Company::class);
    }
    
}
