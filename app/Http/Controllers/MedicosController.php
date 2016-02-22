<?php

namespace Oncoclinicas\Http\Controllers;

use Oncoclinicas\Http\Requests\MedicoRequest;
use Oncoclinicas\Repositories\MedicoRepository;
use Oncoclinicas\Http\Requests;


class MedicosController extends Controller
{
    private $repository;

    public function __construct(MedicoRepository $repository){
        $this->repository = $repository;

    }

    public function index(MedicoRepository $repository){

        $medicos = $repository->paginate(10);
        return view('medicos.index',compact('medicos'));
    }

    public function create(){

        return view('medicos.create');
    }
    public function edit ($id){

        $medico = $this->repository->find($id);
        return view('medicos.edit',compact('medico'));
    }

    public function update (MedicoRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data,$id);
        return redirect()->route('medicos.index');

    }

    public function store(MedicoRequest $request){
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('medicos.index');
    }
    public function destroy ($id){

        $this->repository->delete($id);
        return redirect()->route('medicos.index');

    }
}
