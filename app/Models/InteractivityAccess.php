<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractivityAccess extends Model
{
    use HasFactory;

    protected $fillable = ['accessable','driver_id'];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function accessable() {
        return $this->morthTo();
    }
}
