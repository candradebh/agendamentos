@extends('app')

@section('content')
    <div class="row">
        <div clss="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Início</a></li>
                <li><a href="{{ url('/pacientes') }}">Pacientes</a></li>
                <li class="active">Novo Paciente</li>
            </ol>
        </div>
    </div>

    <h3 class="page-header">Novo Paciente</h3>

    @include('errors._check')

    {!! Form::open(['route'=>'pacientes.store']) !!}

        @include('pacientes._form')

    <div class="form-group">
        {!! Form::label('Data nascimento','Data de Nascimento: ') !!}
        {!! Form::text('dtnascimento',null,['class'=>'form-control', 'id'=>'data']) !!}
    </div>

        <div class="form-group">
             {!! Form::submit('Criar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection