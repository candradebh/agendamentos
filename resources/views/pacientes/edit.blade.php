@extends('app')

@section('content')
    <div class="row">
        <div clss="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Início</a></li>
                <li><a href="{{ url('/pacientes') }}">Pacientes</a></li>
                <li class="active">Editar Paciente</li>
            </ol>
        </div>
    </div>


    <h3 class="page-header">Editando Paciente: {{$paciente->nome}}</h3>

    @include('errors._check')

    {!! Form::model($paciente, ['route'=>['pacientes.update',$paciente->id]]) !!}

    @include('pacientes._form')
    <div class="form-group">
        {!! Form::label('Data nascimento','Data de Nascimento: ') !!}
        {!! Form::text('dtnascimento',date('d/m/Y', strtotime($paciente->dtnascimento)),['class'=>'form-control', 'id'=>'data']) !!}
    </div>

        <div class="form-group">
             {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}


@endsection