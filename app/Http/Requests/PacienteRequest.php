<?php

namespace Oncoclinicas\Http\Requests;



class PacienteRequest extends Request
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
        return [
            'nome'=>'required|min:10',
            'dtnascimento'=>'required',
            'telefone'=>'required'
        ];
    }
}
