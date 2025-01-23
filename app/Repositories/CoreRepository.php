<?php

namespace App\Repositories;

/**
 * Class CoreRepository
 * @package App\Repository
 *
 */


abstract  class  CoreRepository
    /**
     * @var Model
     */
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract public function getModelClass();

    /**
     * @return Model|\Illuminate\Foundation\Application\mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
