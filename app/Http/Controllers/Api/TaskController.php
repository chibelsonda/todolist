<?php

namespace App\Http\Controllers\Api;

use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;

class TaskController extends BaseController
{
    /**
     * @var TaskService
     */
    private TaskService $taskService; 

    public function __construct()
    {
        $this->taskService = new TaskService();    
    }
  
    /**
     * Get all tasks
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $response = $this->taskService->getAll();

        return $this->sendResponse($response);
    }

        
    /**
     * Create task
     *
     * @param TaskRequest $request
     *
     * @return JsonResponse
     */
    public function create(TaskRequest $request): JsonResponse
    {
        $response = $this->taskService->create($request->validated());

        return $this->sendResponse($response);
    }

    /**
     * Get task
     *
     * @param string $id 
     *
     * @return JsonResponse
     */
    public function get(string $id): JsonResponse
    {
        $response = $this->taskService->get($id);

        return $this->sendResponse($response);
    }
      
    /**
     * Update task
     *
     * @param TaskRequest $request
     * @param string $id 
     *
     * @return JsonResponse
     */
    public function update(TaskRequest $request, string $id): JsonResponse
    {
        $response = $this->taskService->update($request->validated(), $id);

        return $this->sendResponse($response);
    }

    
    /**
     * Delete task
     *
     * @param string $id
     *
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $response = $this->taskService->delete($id);

        return $this->sendResponse($response);
    }
}
