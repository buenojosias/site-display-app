<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['name','cpf','region','active','working'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function address() {
        return $this->hasOne(DriverAddress::class);
    }

    public function vehicle() {
        return $this->hasOne(Vehicle::class);
    }

    public function displays() {
        return $this->hasMany(Display::class);
    }

    // tem tablet
    // tem jornadas
    // tem saldo
    // tem extrato
    // tem exibições
}
