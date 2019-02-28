<?php

namespace ToDoList\Migrations;

use ToDoList\Models\ToDo;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Plugin\Log\Loggable;

/**
 * Class CreateToDoTable
 */
class CreateToDoTable
{
    use Loggable;

    /**
     * @param Migrate $migrate
     */
    public function run(Migrate $migrate)
    {
        $migrate->createTable(ToDo::class);

        $this->getLogger("CreateToDoTable_run")->debug('ToDoList::migration.successMessage', ['tableName' => 'ToDo']);
    }
}