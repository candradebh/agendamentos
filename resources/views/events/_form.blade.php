<div class="form-group">
    {!! Form::label('Medico','Medico Responsável: *') !!}
    <div class="input-group">
        {!! Form::select('medico_id', $medicos ,null, ['class'=>'form-control']) !!}
		<span class="input-group-addon">
	    	<a href="{{ url('medicos/create') }}"><span class="glyphicon glyphicon-plus"></span></a>
        </span>
    </div>

</div>
