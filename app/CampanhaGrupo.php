<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampanhaGrupo extends Model
{
    protected $fillable = [
      'campanha_id',
      'grupo_id'
    ];
}
