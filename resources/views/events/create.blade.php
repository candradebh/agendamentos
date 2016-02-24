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

		{!! Form::open(['route'=>'events.store']) !!}

		<div class="form-group">
			{!! Form::label('Paciente','Nome do Paciente: *') !!}
			{!! Form::text('auto',null, ['placeholder' => 'Nome Completo do Paciente', 'id' => 'auto', 'class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Data nascimento','Data de Nascimento: *') !!}
			{!! Form::text('dtnascimento',null,['placeholder' => 'Data de Nascimento do Paciente','class'=>'form-control', 'id'=>'dtnascimento']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Telefone','Telefone: *') !!}
			{!! Form::text('telefone',null, ['placeholder' => 'Telefone de Contato', 'class'=>'form-control','id'=>'telefone']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Medico','Médico Responsável: *') !!}
			<div class="input-group">
				{!! Form::text('medico', null, ['class'=>'form-control','id'=>'medico']) !!}
				<span class="input-group-addon">
	    				<a href="{{ url('medicos/create') }}"><span class="glyphicon glyphicon-plus"></span></a>
       			 </span>
			</div>
		</div>
		{!! Form::hidden('paciente_id',null, ['placeholder' => 'Código', 'id' => 'paciente_id', 'class' => 'form-control']) !!}
		{!! Form::hidden('medico_id',null, ['placeholder' => 'Medico ID', 'class'=>'form-control','id'=>'medico_id']) !!}
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
	$(document).ready(function () {
		$('input:text').bind({

		});

		$("#auto").autocomplete({
			minLength:3,
			autoFocus: true,
			source: '{{URL('getdata')}}',
			focus: function( event, ui ) {
				$( "#auto" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {
				$( "#auto" ).val( ui.item.label );
				$( "#paciente_id" ).val( ui.item.value );
				$( "#dtnascimento" ).val( ui.item.dtnascimento );
				$( "#telefone" ).val( ui.item.telefone );

				return false;
			}

		});

		$("#medico").autocomplete({
			minLength:3,
			autoFocus: true,
			source: '{{URL('getmedico')}}',
			focus: function( event, ui ) {
				$( "#medico" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {
				$( "#medico" ).val( ui.item.label );
				$( "#medico_id" ).val( ui.item.value );
				return false;
			}

		});

		$('input[name="time"]').datetimepicker({
			format:'DD/MM/YYYY HH:mm'
		});

		$("#dtnascimento").mask('99/99/9999');
	});


</script>


@endsection