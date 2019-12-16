<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    protected $fillable = [
      'name',
      'products',
      'price'
    ];

    protected $table = 'desconto';
}
