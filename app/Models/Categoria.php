<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'titulo',
        'estado',
    ];

    public function actividades()
    {
        return $this->hasMany(Actividades::class);
    }
}


