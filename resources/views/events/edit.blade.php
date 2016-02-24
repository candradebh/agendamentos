@extends('app')

@section('content')

<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('/') }}">Início</a></li>
			<li class="active">Editar Agendamento</li>
		</ol>
	</div>
</div>

<div class="row">

	<h3 class="page-header">Agendamento: # {{ $event->start_time }}</h3>
	<div class="col-lg-6">
		@include('errors._check')
		{!! Form::model($event, ['route'=>['events.update',$event->id]]) !!}

		<input type="hidden" name="paciente_id" id="paciente_id"  value="{{$event->paciente_id}}" />

		<div class="form-group">
			{!! Form::label('Paciente','Nome do Paciente: *') !!}
			{!! Form::text('paciente', $event->paciente->nome, ['class'=>'form-control','readonly' => 'true']) !!}

		</div>
		<div class="form-group">
			{!! Form::label('Data nascimento','Data de Nascimento: *') !!}
			{!! Form::text('dtnascimento',date('d/m/Y', strtotime($event->paciente->dtnascimento)),['class'=>'form-control', 'id'=>'data','readonly' => 'true']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Telefone','Telefone: *') !!}
			{!! Form::text('telefone',$event->paciente->telefone, ['class'=>'form-control','id'=>'telefone']) !!}
		</div>
		@include('events._form')


		<div class="form-group">
			<button class="btn btn-primary" type="submit" value="Confirmar">
				<span class="glyphicon glyphicon-check"></span> Confirmar
			</button>
			<a href="{{route('events.destroy',[$event->id])}}" class="btn btn-danger">
				<span class="glyphicon glyphicon-trash"></span> Cancelar
			</a>
		</div>


		{!! Form::close() !!}
	</div>
</div>
@endsection

