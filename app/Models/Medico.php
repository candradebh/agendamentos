<?php

namespace Oncoclinicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Medico extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'telefone',

    ];

    function agendamentos(){
        return $this->hasMany(Event::class);

    }

}
