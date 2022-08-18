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

    public function balance() {
        return $this->morphOne(Balance::class, 'balanceable');
    }

    public function transictions() {
        return $this->morphOne(Transiction::class, 'transictionable');
    }

    public function displays() {
        return $this->hasMany(Display::class);
    }

    public function getCpfAttribute($cpf) {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    // tem tablet
    // tem jornadas
    // tem saldo
    // tem extrato
}
