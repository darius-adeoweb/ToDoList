<?php

namespace ToDoList\Repositories;

use Plenty\Exceptions\ValidationException;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use ToDoList\Contracts\ToDoRepositoryContract;
use ToDoList\Models\ToDo;
use ToDoList\Validators\ToDoValidator;
use Plenty\Modules\Frontend\Services\AccountService;

class ToDoRepository implements ToDoRepositoryContract
{
    /**
     * @var AccountService
     */
    private $accountService;

    /**
     * ToDoRepository constructor.
     * @param AccountService $accountService
     */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * Get the current contact ID
     * @return int
     */
    public function getCurrentContactId(): int
    {
        return $this->accountService->getAccountContactId();
    }

    /**
     * Add a new item to the To Do list
     *
     * @param array $data
     * @return ToDo
     * @throws ValidationException
     */
    public function createTask(array $data): ToDo
    {
        try {
            ToDoValidator::validateOrFail($data);
        } catch (ValidationException $e) {
            throw $e;
        }

        $database = pluginApp(DataBase::class);

        $toDo = pluginApp(ToDo::class);
        $toDo->taskDescription = $data['taskDescription'];
        $toDo->userId = $this->getCurrentContactId();
        $toDo->createdAt = time();

        $database->save($toDo);

        return $toDo;
    }

    public function getToDoList(): array
    {
        $database = pluginApp(DataBase::class);

        $id = $this->getCurrentContactId();

        /**
         * @var ToDo[] $toDoList
         */
        $toDoList = $database->query(ToDo::class)->where('userId', '=', $id)->get();

        return $toDoList;
    }

    /**
     * Update the status of the item
     *
     * @param int $id
     * @return ToDo
     */
    public function updateTask(int $id): ToDo
    {
        /**
         * @var DataBase $database
         */
        $database = pluginApp(DataBase::class);

        $toDoList = $database->query(ToDo::class)
            ->where('id', '=', $id)
            ->get();

        $toDo = $toDoList[0];
        $toDo->isDone = true;
        $database->save($toDo);

        return $toDo;
    }

    /**
     * Delete an item from the To Do list
     *
     * @param int $id
     * @return ToDo
     */
    public function deleteTask(int $id): ToDo
    {
        $database = pluginApp(DataBase::class);

        $toDoList = $database->query(ToDo::class)
            ->where('id', '=', $id)
            ->get();

        $toDo = $toDoList[0];
        $database->delete($toDo);

        return $toDo;
    }
}