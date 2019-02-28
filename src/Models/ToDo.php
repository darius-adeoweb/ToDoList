<?php

namespace ToDoList\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 * Class ToDo
 *
 * @property int     $id
 * @property string  $taskDescription
 * @property int     $userId
 * @property boolean $isDone
 * @property int     $createdAt
 */
class ToDo extends Model
{
    /**
     * @var int
     */
    public $id = 0;
    public $taskDescription = '';
    public $userId = 0;
    public $isDone = false;
    public $createdAt = 0;

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'ToDoList::ToDo';
    }
}