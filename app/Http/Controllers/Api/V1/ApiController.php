<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetRequest;
use App\Http\Requests\ApiRequestInterface;

class ApiController extends Controller
{   
    /**
	 * @var Model
	 */
    public $model;


    /**
	 * @param ApiRequest $request
	 * @return mixed
	 */
    protected function add(ApiRequestInterface $request)
    {
		$data = $request->validated();
		$this->model->addRow($data);

        return $this->sendResponse(null, 'Created', 201);
    }


    /**
	 * @param int $entityId
	 * @return mixed
	 *
	 */
    public function delete(int $entityId)
    {

		$entity = $this->model->find($entityId);

		if (!$entity) {
			return $this->sendError('Not found', 404);
		}

		$entity->delete();

		return $this->sendResponse(null, 'Deleted',204);
	}

	/**
	 * @param int $entityId
	 * @return mixed
	 */
    public function detail(int $entityId)
    {

		$entity = $this->model->find($entityId);

		if (!$entity) {
			return $this->sendError('Not Found', 404);
		}

		return $this->sendResponse($entity, 'OK', 200);
    }
    
    
    public function edit(ApiRequestInterface $request, $entityId)
	{   
		$entity = $this->model->find((int) $entityId);

		if (!$entity) {
			return $this->sendError('Not found', 404);
		}

		$data = $request->validated();
		$entity->updateRow($data);

		return $this->sendResponse(null, 'Updated', 200);
	}

}
