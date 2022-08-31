<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\Interfaces\ICategoryRepository;
use App\Models\Category;
use App\Infrastructure\Repositories\Repository;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryRepository extends Repository implements ICategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model); // Inject the model that you need to build queries from
    }
    // todo: Дополняем логикой свойственной только модели Category

    public function getAll($request)
    {
        return QueryBuilder::for(Category::class)
                    ->defaultSort('-created_at')
                    ->allowedFilters(['name', 'active', 'createdDate', 'description'])
                    ->allowedSorts(['name', 'description', 'createdDate', 'active'])
                    ->paginate((int)$request->pageSize ?? 9);
    }
}
