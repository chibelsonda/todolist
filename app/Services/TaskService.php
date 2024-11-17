<?php

namespace App\Services;

use Exception;
use App\Models\Task;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskService extends BaseService
{    
    /**
     * Get all tasks
     *
     * @return array
     */
    public function getAll(): array
    {
        try {
            $tasks = Task::select(
                'id',
                'title',
                'description',
                DB::raw("if(status= 0, 'Pending', 'Completed') as status")
            )->paginate(50);

            return $this->setResponse(data: ['tasks' => $tasks]);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }
     
    /**
     * Create task
     *
     * @param array $task
     *
     * @return array
     */
    public function create($task): array
    {
        try {
            $task = Task::create($task);
            
            return $this->setResponse(
                message: 'Task has been created.', 
                data: ['task' => $task]
            );

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Update task
     *
     * @param array $task
     * @param string $id
     *
     * @return array
     */
    public function update($task, $id): array
    {
        try {
            Task::where('id', $id)->update($task);
            $task['id'] = $id;

            return $this->setResponse(
                message: 'Task has been updated.', 
                data: ['task' => $task]
            );

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Get task
     *
     * @param string $id
     *
     * @return array
     */
    public function get($id): array
    {
        try {
            $task = Task::where('id', $id)->first();

            return $this->setResponse(
                data: ['task' => $task]
            );

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Delete task
     *
     * @param string $id
     *
     * @return array
     */
    public function delete($id): array
    {
        try {
            $task = Task::where('id', $id)->delete();

            if (!$task) {
                return $this->setUnprocessableResponse('Task does not exist.');
            }

            return $this->setResponse('Task has been deleted.');

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }
}