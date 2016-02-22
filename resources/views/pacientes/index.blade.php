@extends('app')

@section('content')
    <h1 class="page-header">Pacientes</h1>
    <a href="{{route('pacientes.create')}}" class="btn btn-default">Adicionar</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

    @foreach($pacientes as $paciente )
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nome}}</td>
                <td>{{ date('d/m/Y', strtotime($paciente->dtnascimento))}}</td>
                <td>{{ $paciente->telefone}}</td>
                <td><a href="{{route('pacientes.edit',[$paciente->id])}}" class="btn btn-default btn-small">Editar</a></td>
            </tr>
    @endforeach
            </tbody>
        </table>

        {!! $pacientes->render() !!}
    </div>

@endsection