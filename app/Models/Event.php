<?php

namespace Oncoclinicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Event extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'paciente_id',
        'start_time',
        'end_time',
        'medico_id'
    ];

    public function paciente (){
        return $this->belongsTo(Paciente::class);
    }

    public function medico (){
        return $this->belongsTo(Medico::class);
    }
}
