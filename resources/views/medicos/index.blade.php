@extends('app')

@section('content')

    <div class="row">
        <div clss="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Início</a></li>
                <li class="active">Médicos</li>
            </ol>
        </div>
    </div>



    <h1 class="page-header">Médicos da Clinica</h1>
    <a href="{{route('medicos.create')}}" class="btn btn-default">Adicionar</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

    @foreach($medicos as $medico )
            <tr>
                <td>{{ $medico->id }}</td>
                <td>{{ $medico->nome}}</td>
                <td>{{ $medico->telefone}}</td>
                <td>
                    <a href="{{route('medicos.edit',[$medico->id])}}" class="btn btn-default btn-small">Editar</a>
                </td>
            </tr>
    @endforeach
            </tbody>
        </table>

        {!! $medicos->render() !!}
    </div>

@endsection