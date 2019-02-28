<?php

namespace ToDoList\Contracts;

use ToDoList\Models\ToDo;

/**
 * Interface ToDoRepositoryContract
 * @package ToDoList\Contracts
 */
interface ToDoRepositoryContract
{
    /**
     * Add a new task to the To Do list
     *
     * @param array $data
     * @return ToDo
     */
    public function createTask(array $data): ToDo;

    /**
     * List all tasks of the To Do list
     *
     * @return ToDo[]
     */
    public function getToDoList(): array;

    /**
     * Update the status of the task
     *
     * @param int $id
     * @return ToDo
     */
    public function updateTask(int $id): ToDo;

    /**
     * Delete a task from the To Do list
     *
     * @param int $id
     * @return ToDo
     */
    public function deleteTask(int $id): ToDo;
}