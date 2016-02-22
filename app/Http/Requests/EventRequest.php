<?php

namespace Oncoclinicas\Http\Requests;



use Carbon\Carbon;

class EventRequest extends Request
{
    /**
     * Camada de autorização
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Valida todas as requisiçoes dos campos
     *
     * @return array
     */
    public function rules()
    {
        $today = Carbon::now()->format('d/m/Y');
        return [
            'paciente_id'=>'required',
            'dtnascimento'=>'required|date_format:d/m/Y|before:'.$today,
            'telefone'=>'required|min:5',
            'medico_id'=>'required'
        ];
    }
}
