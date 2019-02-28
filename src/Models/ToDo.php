<?php

namespace ToDoList\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

class ToDo extends Model
{
    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $taskDescription = '';

    /**
     * @var int
     */
    public $userId = 0;

    /**
     * @var bool
     */
    public $isDone = false;

    /**
     * @var int
     */
    public $createdAt = 0;

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'ToDoList::ToDo';
    }
}