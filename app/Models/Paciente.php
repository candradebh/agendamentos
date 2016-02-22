<?php

namespace Oncoclinicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Paciente extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'dtnascimento',
        'telefone',

    ];

    function agendamentos(){
        return $this->hasMany(Event::class);

    }

}
