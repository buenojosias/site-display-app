<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkAccess extends Model
{
    use HasFactory;

    protected $fillable = ['advertising_id'];

    public function display() {
        return $this->belongsTo(Diplay::class);
    }
    
}
