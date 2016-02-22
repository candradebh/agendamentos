@extends('app')

@section('content')

<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">Início</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div id='calendar'></div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ url('_asset/fullcalendar') }}/fullcalendar.min.js"></script>
<script src="lang-all.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		var base_url = '{{ url('/') }}';

		$('#calendar').fullCalendar({
			dayClick: function(date, jsEvent, view) {

				if (view.name != 'month')
					window.location = base_url + "/events/create?data="+date.format('DD/MM/YYYY HH:mm');

				if (view.name == 'month') {
					$('#calendar').fullCalendar('changeView', 'agendaDay');
					$('#calendar').fullCalendar('gotoDate', date);
				}
			},
			lang:'pt',
			weekends: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			editable: true,
			eventLimit: true,
			events: {
				url: base_url + '/api',
				error: function() {
					alert("JSON não foi carregado");
				}
			}
		});
	});
</script>
@endsection