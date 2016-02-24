<!DOCTYPE html>
<html>

<title>Laravel Autocomplete</title>
<meta charset="utf-8">
<link href="{{URL::asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" >
<link href="{{URL::asset('css/style.css')}}" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="{{URL::asset('js/modernizr.js')}}"></script> <!-- Modernizr -->




<body>
 
 <div class="page-header" id="page-header">
<nav class="navbar navbar-default">
 <div class="container-fluid">
  
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background: #00bdf2;">
 

 {{ Form::open(array('url' => 'event/create', 'class' => 'navbar-form navbar-left', 'method' => 'POST','id'=>'formulario')) }}
 {{ Form::text('auto',$value = null, array('placeholder' => 'Nome Paciente', 'id' => 'auto', 'class' => 'form-control')) }}
 {{ Form::text('paciente_id',$value = null, array('placeholder' => 'Codigo', 'id' => 'paciente_id', 'class' => 'form-control')) }}
 {{ Form::text('dtnascimento',$dtnascimento = null, array('placeholder' => 'Data de nascimento', 'id' => 'dtnascimento', 'class' => 'form-control')) }}
 {{ Form::text('telefone',$telefone = null, array('placeholder' => 'Telefone', 'id' => 'telefone', 'class' => 'form-control')) }}
 {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
 {{ Form::close() }}
 


   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

   
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>                   
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>



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


});


</script>
</body>
</html>