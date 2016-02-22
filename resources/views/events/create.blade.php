@extends('app')

@section('content')

<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('/') }}">Início</a></li>
			<li class="active">Novo Agendamento</li>
		</ol>
	</div>
</div>

<h3 class="page-header">Novo Agendamento</h3>

<div class="row">

	<div class="col-lg-6">

		@include('errors._check')

		{!! Form::open(['route'=>'events.store']) !!}

		<div class="form-group">
			{!! Form::label('Paciente','Nome do Paciente: *') !!}
			{!! Form::text('paciente_id',null, ['placeholder' => 'Nome Completo do Paciente', 'id' => 'paciente_id', 'class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Data nascimento','Data de Nascimento: *') !!}
			{!! Form::text('dtnascimento',null,['placeholder' => 'Data de Nascimento do Paciente','class'=>'form-control', 'id'=>'data']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Telefone','Telefone: *') !!}
			{!! Form::text('telefone',null, ['placeholder' => 'Telefone de Contato', 'class'=>'form-control','id'=>'telefone']) !!}
		</div>
		@include('events._form')



				<input type="hidden" class="form-control" name="time" placeholder="Periodo" value="{{$_GET['data'] or ''}}">
					



		<div class="form-group">
			{!! Form::submit('Confirmar',['class'=>'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('js')

<script src="{{ url('js') }}/datetimepicker.js"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').datetimepicker({
		format:'DD/MM/YYYY HH:mm'
	});
});
</script>

@endsection