<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends ApiController
{   
    
    /**
     * CategoryController constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    { 
      $this->middleware('jwt.verify', ['except' => ['getCategories']]);
      $this->model = $model;
    }
    
    public function getCategories($limit = 20, $offset = 0)
    { 
      $result =  $this->model->offset((int) $offset)->limit((int) $limit)->get();

		  return $this->sendResponse($result, 'OK', 200);
    }

    public function create(CreateCategoryRequest $request)
    {
      return parent::add($request);
    }

    public function update($categoryId, CreateCategoryRequest $request)
    {
      return parent::edit($request, $categoryId);
    }

    public function delete(int $categoryId)
    {
      return parent::delete($categoryId);
    }

}
