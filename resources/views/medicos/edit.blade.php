@extends('app')

@section('content')
    <div class="row">
        <div clss="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Início</a></li>
                <li><a href="{{ url('medicos') }}">Médicos</a></li>
                <li class="active">Editando médico</li>
            </ol>
        </div>
    </div>
    <h3 class="page-header">Editando Médico: {{$medico->nome}}</h3>

    @include('errors._check')

    {!! Form::model($medico, ['route'=>['medicos.update',$medico->id]]) !!}

    @include('medicos._form')

        <div class="form-group">
             {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection