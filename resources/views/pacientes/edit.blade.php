@extends('app')

@section('content')
    <h3 class="page-header">Editando Paciente: {{$paciente->nome}}</h3>

    @include('errors._check')

    {!! Form::model($paciente, ['route'=>['pacientes.update',$paciente->id]]) !!}

    @include('pacientes._form')

        <div class="form-group">
             {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}


@endsection