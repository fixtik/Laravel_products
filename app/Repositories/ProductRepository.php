<?php

namespace App\Repositories;

use App\Models\Product as Model;


/**
 * Class ProductRepository
 *
 * @package App\Repositories
 */
class ProductRepository extends CoreRepository
{

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получение модели для редактирования
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * получение всех записей с панинатором
     *
     * @param int\null $perPage
     * return Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getAllProductsWithPaginator($perPage = null)
    {
        $columns = ['id', 'article', 'name', 'status', 'data'];
        $result = $this->startConditions()
            ->select($columns)
            ->paginate($perPage);
        return $result;
    }



}
