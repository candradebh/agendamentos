@extends('app')

@section('content')
    <h3 class="page-header">Novo Paciente</h3>

    @include('errors._check')

    {!! Form::open(['route'=>'pacientes.store']) !!}

        @include('pacientes._form')

        <div class="form-group">
             {!! Form::submit('Criar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection