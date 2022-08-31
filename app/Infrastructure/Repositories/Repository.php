<?php

namespace App\Infrastructure\Repositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Infrastructure\Contracts\IRepository;
use Spatie\QueryBuilder\QueryBuilder;

class Repository implements IRepository
{
    /**
     * @var Model
     */
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(Model $model, array $attributes) : bool
    {
        return $model->update($attributes);
    }

    public function count()
    {

    }

    public function get()
    {

    }

    public function getAll($request)
    {
        return $this->model->paginate((int)$request->pageSize);
    }

    public function delete(Model $model) : void
    {
        $model->delete();
    }

    public function newQuery(): Builder
    {
        return $this->model->newQuery();
    }

}
