<?php




Route::get('/', function () {
    $data = [
        'page_title' => 'Início',
    ];
    return view('events.index', $data);
});

Route::resource('events', 'EventsController');

Route::get('/api', function () {
    $events = DB::table('events')
        ->join('medicos', 'medicos.id', '=', 'events.medico_id')
        ->join('pacientes', 'pacientes.id', '=', 'events.paciente_id')
        ->select('events.id as id', 'pacientes.nome as title', 'medicos.nome as name', 'events.start_time as start', 'events.end_time as end')
        ->get();

    foreach($events as $event)
    {
        $event->title = $event->title . ' - ' .$event->name;
        $event->url = url('events/edit/' . $event->id);
    }
    return $events;
});


//Rota para autocomplete jquery para o nome paciente




Route::group(['middleware' => ['web']], function () {

    Route::get('medicos',['as'=>'medicos.index','uses'=>'MedicosController@index'] );
    Route::get('medicos/create',['as'=>'medicos.create','uses'=>'MedicosController@create'] );
    Route::get('medicos/edit/{id}',['as'=>'medicos.edit','uses'=>'MedicosController@edit'] );
    Route::get('medicos/destroy/{id}',['as'=>'medicos.destroy','uses'=>'MedicosController@destroy'] );
    Route::post('medicos/update/{id}',['as'=>'medicos.update','uses'=>'MedicosController@update'] );
    Route::post('medicos/store',['as'=>'medicos.store','uses'=>'MedicosController@store'] );

    Route::get('pacientes',['as'=>'pacientes.index','uses'=>'PacientesController@index'] );
    Route::get('pacientes/create',['as'=>'pacientes.create','uses'=>'PacientesController@create'] );
    Route::get('pacientes/edit/{id}',['as'=>'pacientes.edit','uses'=>'PacientesController@edit'] );
    Route::get('pacientes/destroy/{id}',['as'=>'pacientes.destroy','uses'=>'PacientesController@destroy'] );
    Route::post('pacientes/update/{id}',['as'=>'pacientes.update','uses'=>'PacientesController@update'] );
    Route::post('pacientes/store',['as'=>'pacientes.store','uses'=>'PacientesController@store'] );

    Route::get('events',['as'=>'events.index','uses'=>'EventsController@index'] );
    Route::get('events/create',['as'=>'events.create','uses'=>'EventsController@create'] );
    Route::get('events/edit/{id}',['as'=>'events.edit','uses'=>'EventsController@edit'] );
    Route::get('events/destroy/{id}',['as'=>'events.destroy','uses'=>'EventsController@destroy'] );
    Route::post('events/update/{id}',['as'=>'events.update','uses'=>'EventsController@update'] );
    Route::post('events/store',['as'=>'events.store','uses'=>'EventsController@store'] );


});


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;



Route::any('getdata', function(){

    $term = Str::lower(Input::get('term'));

    $data = DB::table("pacientes")->distinct()->select('id','nome','dtnascimento','telefone')->where('nome', 'LIKE', $term.'%')->groupBy('nome')->take(10)->get();
    foreach ($data as $v) {
        $pacientes[] = [ 'value'=>$v->id,'label'=>$v->nome, 'dtnascimento'=>date('d/m/Y',strtotime($v->dtnascimento)),'telefone'=>$v->telefone];
    }
   // var_dump($pacientes);

    return Response::json($pacientes);

});

Route::any('getmedico', function(){

    $term = Str::lower(Input::get('term'));

    $data = DB::table("medicos")->distinct()->select('id','nome','telefone')->where('nome', 'LIKE', $term.'%')->groupBy('nome')->take(10)->get();
    foreach ($data as $v) {
        $medicos[] = [ 'value'=>$v->id,'label'=>$v->nome, 'telefone'=>$v->telefone];
    }
    // var_dump($pacientes);

    return Response::json($medicos);

});



Route::any('/events/create', function(){

    $keyword = Str::lower(Input::get('auto'));
    $models = \Oncoclinicas\Models\Paciente::where('nome', '=', $keyword)->orderby('nome')->take(10)->skip(0)->get();
    $count = count($models);

    return View::make('events.create')->with("contents", $models)->with("counts", $count);

});

Route::any('/events/create', function(){

    $keyword = Str::lower(Input::get('medico'));
    $models = \Oncoclinicas\Models\Medico::where('nome', '=', $keyword)->orderby('nome')->take(10)->skip(0)->get();
    $count = count($models);

    return View::make('events.create')->with("contents", $models)->with("counts", $count);

});