<?php

namespace Oncoclinicas\Http\Controllers;




use Illuminate\Http\Request;
use Oncoclinicas\Http\Requests\EventRequest;
use Oncoclinicas\Repositories\EventRepository;
use Oncoclinicas\Repositories\PacienteRepository;
use Oncoclinicas\Repositories\MedicoRepository;
use Oncoclinicas\Http\Requests;
use DateTime;


class EventsController extends Controller
{
    private $eventRepository;
    private $pacienteRepository;
    private $medicoRepository;



    public function __construct(EventRepository $eventRepository, PacienteRepository $pacienteRepository, MedicoRepository $medicoRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->pacienteRepository = $pacienteRepository;
        $this->medicoRepository = $medicoRepository;
    }



    public function index()
    {
        $data = [
            'page_title' => 'Eventos',
            'events'	 => $this->eventRepository->scopeQuery(function($query){
                return $query->orderBy('start_time','asc');
            })->all(),
        ];

        return view('events.index', $data);
    }



    public function create()
    {
        $medicos = $this->medicoRepository->lists();

        $data = [
            'page_title' => 'Novo Agendamento',
        ];

        return view('events.create', compact('data', 'medicos'));
    }


    public function edit($id)
    {

        $medicos = $this->medicoRepository->lists();
        $event = $this->eventRepository->find($id);
        $paciente = $this->pacienteRepository->find($event->paciente_id);
        $data = [
            'page_title' 	=> 'Editar Agendamento',

        ];
        $event->start_time = date('d/m/Y H:i', strtotime($event->start_time));
        $event->paciente->dtnascimento = date('d/m/Y', strtotime($event->paciente->dtnascimento));
        return view('events.edit', compact('data','paciente','medicos','event'));
    }

    public function store(Request $request)
    {
        //Array de dadospara gravar evento
        $data = array();


        if($request->input('paciente_id') ==""){
            $dt = array();
            $dt['nome'] = $request->input('auto');
            $dt['dtnascimento'] = $this->change_date_format($request->input('dtnascimento'));
            $dt['telefone'] = $request->input('telefone');

            //Verifica se o paciente existe
            $p = $this->pacienteRepository->findWhere([
                'nome'=>$dt['nome'],
                'dtnascimento'=>$dt['dtnascimento'],
                'telefone'=>$dt['telefone']
            ]);

            if(sizeof($p)==0) {
                $this->pacienteRepository->create($dt);
            }
            $paciente = $this->pacienteRepository->findByField('nome', $dt['nome'])->first();
            $data['paciente_id'] = $paciente->id;


        }else{

            $data['paciente_id'] = $request->input('paciente_id');
        }

        if($request->input('medico_id') ==""){

            $m = array();
            $m['nome'] = $request->input('medico');
            $m['telefone'] = '00000000';

            $this->medicoRepository->create($m);
            $medico  = $this->medicoRepository->findByField('nome', $m['nome'])->first();
            $data['medico_id'] = $medico->id;


        }else{
            $data['medico_id'] = $request->input('medico_id');
        }


        if($request->input('time')!=""){

                $datas = $this->getDatas($request->input('time'));


        }else{

            return view('events.index');
        }



        $data['start_time'] 	= $datas[0];
        $data['end_time']		= $datas[1];


        //dd($data);

        $this->eventRepository->create($data);

       return redirect()->route('events.index');

    }


    public function update(EventRequest $request, $id)
    {
        //Atualiza o medico do evento
        $data['medico_id'] = $request->input('medico_id');
        $this->eventRepository->update($data,$id);

        //Atualiza o teledone do paciente
        $paciente = $this->pacienteRepository->find($request->input('paciente_id'));
        $paciente->telefone = $request->input('telefone');
        $paciente->save();
        return redirect('/');
    }


    public function destroy($id)
    {
        $this->eventRepository->delete($id);

        return redirect('/');
    }

    public function getDatas($time){
        $datas = array();


        $time = explode("/", $time);
        $ano = explode(" ",$time[2]);
        $aux = $ano[0]."-".$time[1]."-".$time[0]." ".$ano[1].":00";
        $inc = explode(":",$ano[1]);

        if(($inc[1]+30)>60){
            $new = ($inc[0]+1).":".((($inc[1]+30)%60)<10?"0".(($inc[1]+30)%60):(($inc[1]+30)%60));

        }else{
            $new = $inc[0].":".($inc[1]+30);
        }
        $aux2 = $ano[0]."-".$time[1]."-".$time[0]." ".$new.":00";
        $datas[] = $aux;
        $datas[] = $aux2;
        return $datas;
    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d');
    }


}
