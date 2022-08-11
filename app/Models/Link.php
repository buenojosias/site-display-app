<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['phone','whatsapp','facebook','instagram','site'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

}
