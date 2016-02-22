<?php

namespace Oncoclinicas\Http\Controllers;

use DateTime;
use Oncoclinicas\Http\Requests\PacienteRequest;
use Oncoclinicas\Repositories\PacienteRepository;
use Oncoclinicas\Http\Requests;

class PacientesController extends Controller
{
    private $repository;


    public function __construct(PacienteRepository $repository){
        $this->repository = $repository;

    }

    public function index(PacienteRepository $repository){

        $pacientes = $repository->paginate(10);
        return view('pacientes.index',compact('pacientes'));
    }

    public function create(){

        return view('pacientes.create');
    }
    public function edit ($id){

        $paciente = $this->repository->find($id);
        return view('pacientes.edit',compact('paciente'));
    }

    public function update (PacienteRequest $request, $id){
        $data = $request->all();
        $data['dtnascimento'] = $this->change_date_format($request->input('dtnascimento'));
        $this->repository->update($data,$id);
        return redirect()->route('pacientes.index');

    }

    public function store(PacienteRequest $request){
        $data = $request->all();
        $data['dtnascimento'] = $this->change_date_format($request->input('dtnascimento'));
        $this->repository->create($data);
        return redirect()->route('pacientes.index');
    }
    public function destroy ($id){

        $this->repository->delete($id);
        return redirect()->route('pacientes.index');

    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d');
    }
}
