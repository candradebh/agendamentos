<?php

namespace Oncoclinicas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Oncoclinicas\Repositories\MedicoRepository;
use Oncoclinicas\Models\Medico;

/**
 * Class MedicoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MedicoRepositoryEloquent extends BaseRepository implements MedicoRepository
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
        return Medico::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
