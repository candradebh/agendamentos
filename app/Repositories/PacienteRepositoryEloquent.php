<?php

namespace Oncoclinicas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Oncoclinicas\Repositories\PacienteRepository;
use Oncoclinicas\Models\Paciente;

/**
 * Class PacienteRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PacienteRepositoryEloquent extends BaseRepository implements PacienteRepository
{
    public function lists()
    {
        return $this->model->lists('nome','id');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Paciente::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
