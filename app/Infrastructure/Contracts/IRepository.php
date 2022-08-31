<?php

namespace App\Infrastructure\Contracts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

interface IRepository
{
    public function create(array $attributes): Model;

    public function update(Model $model, array $attributes) : bool;

    public function count();

    public function get();

    public function getAll($request);

    public function delete(Model $model) : void;

    public function newQuery(): Builder;

}
