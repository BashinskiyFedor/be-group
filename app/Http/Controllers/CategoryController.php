<?php

namespace App\Http\Controllers;

use App\Infrastructure\Repositories\Interfaces\ICategoryRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateCategoryRequest;
use App\Infrastructure\DTO\RequestDto;

class CategoryController extends BaseController
{
    private ICategoryRepository $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->categoryRepository->getAll($request);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($request)
    // {
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Создание
        $result = $this->categoryRepository->create([
            'name' => $request->name,
            'description' => $request->description,
            'createdDate' => Carbon::now(),
            'active' => $request->active
        ]);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $result = $this->categoryRepository->update($category, $request->data());

        if ($result) {
            return new JsonResponse(['message' => __('customs.category-updated')]);
        }
        return new JsonResponse(['message' => __('customs.category-not-updated')]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category);
        return new JsonResponse(['message' => __('customs.category-destroed')]);
    }
}
