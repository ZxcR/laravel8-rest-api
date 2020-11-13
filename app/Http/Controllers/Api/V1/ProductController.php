<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Requests\GetRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends ApiController
{   
    $this->middleware('jwt.verify', ['except' => ['getProducts', 'getProductsByCategory']]);
    
    /**
	 * ProductController constructor.
	 * @param Product $model
	 */
	public function __construct(Product $model)
	{
		$this->model = $model;
    }
    
    public function getProducts($limit = 20, $offset = 0)
    {
        $result =  $this->model->offset((int) $offset)->limit((int) $limit)->get();

		return $this->sendResponse($result, 'OK', 200);
    }

    public function getProductsByCategory($categoryId, $limit = 20, $offset = 0)
    {   
        $result =  $this->model->getProductsByCategory((int) $categoryId, (int) $limit, (int) $offset);
        
        return $this->sendResponse($result, 'OK', 200);
    }
    
    public function create(CreateProductRequest $request)
    {
        parent::add($request);
    }

    public function update($productId, UpdateProductRequest $request)
    {
        parent::edit($request, $productId);
    }

    public function delete($productId)
    {
        parent::delete($productId);
    }
}
