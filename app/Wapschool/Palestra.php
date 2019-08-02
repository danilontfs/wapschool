<?php

namespace App\Wapschool;

use Illuminate\Database\Eloquent\Model;

class Palestra extends Model
{
    protected $table = 'palestra';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
      'nome','evento'
    ];
}
