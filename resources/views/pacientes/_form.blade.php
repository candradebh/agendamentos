<div class="form-group">
    {!! Form::label('Nome','Nome: ') !!}
    {!! Form::text('nome',null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Telefone','Telefone: ') !!}
    {!! Form::text('telefone',null, ['class'=>'form-control','id'=>'telefone']) !!}
</div>
<div class="form-group">
    {!! Form::label('Data nascimento','Data de Nascimento: ') !!}
    {!! Form::date('dtnascimento',null,['class'=>'form-control', 'id'=>'data']) !!}
</div>
