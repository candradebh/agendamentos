<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Agendamentos Laravel 5.2 + FullCalendar">
	<meta name="author" content="Carlos Andrade">
	<link rel="icon" href="{{ url('_assets') }}/favicon.png">

	<title>Oncoclinicas - {{ $page_title or ''}}</title>

	<link rel="stylesheet" href="{{ url('css') }}/bootstrap.min.css" >
	<link rel="stylesheet" href="{{ url('css') }}/datetimepicker.css" >

	<!-- Custom styles for this template -->
	<link href="{{ url('_asset/css') }}/style.css" rel="stylesheet">
	<link href="{{ url('_asset/css') }}/daterangepicker.css" rel="stylesheet">
	<link href="{{ url('_asset/fullcalendar') }}/fullcalendar.min.css" rel="stylesheet">
	<link href="{{ url('css') }}/jquery-ui.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


	<style>
		.ui-autocomplete { max-height: 200px; overflow-y: scroll; overflow-x: hidden;}
	</style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">Oncoclinicas</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('pacientes') }}">Pacientes</a></li>
				<li><a href="{{ url('medicos') }}">Médicos</a></li>

			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<div class="container">

	@yield('content')

</div>

<footer class="footer">
	<p>By <a href="">Carlos Andrade</a></p>

</footer>

<script src="{{ url('js') }}/jquery.min.js"></script>
<script src="{{ url('js') }}/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
<script src="{{ url('/js') }}/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
	$(function () {
		$("#data").mask('99/99/9999');
		$("#telefone").mask('(99) 99999-9999');
	});
</script>

@yield('js')

</body>
</html>