<?php
/**
 * Created by PhpStorm.
 * User: carlos.andrade
 * Date: 05/11/2015
 * Time: 14:20
 */

namespace Oncoclinicas\Services;


use Oncoclinicas\Repositories\EventRepository;
use Oncoclinicas\Repositories\PacienteRepository;
use Oncoclinicas\Repositories\MedicoRepository;
use Faker\Provider\cs_CZ\DateTime;

class EventService
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

    public function create (array $data){
       \DB::beginTransaction();

        try{
            $event = $this->eventRepository->create($data);

            $event->save();
            \DB::commit();
            return $event;

        }catch (\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }

}