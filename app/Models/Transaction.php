<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['id','trasactionable','type','description','amount','before','after','displays_date'];
    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['date'];

    public function transictionable()
    {
        return $this->morphTo();
    }


}
