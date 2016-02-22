@extends('app')

@section('content')

    <div class="row">
        <div clss="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Início</a></li>
                <li><a href="{{ url('medicos') }}">Médicos</a></li>
                <li class="active">Novo Médico</li>
            </ol>
        </div>
    </div>
    <h3 class="page-header">Novo médico</h3>

    <div class="row">

        <div class="col-lg-6">


            @include('errors._check')

            {!! Form::open(['route'=>'medicos.store']) !!}

                @include('medicos._form')

                <div class="form-group">
                     {!! Form::submit('Criar',['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection