<?php

namespace ToDoList\Migrations;

use ToDoList\Models\ToDo;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;

/**
 * Class CreateToDoTable
 */
class CreateToDoTable
{
    /**
     * @param Migrate $migrate
     */
    public function run(Migrate $migrate)
    {
        $migrate->createTable(ToDo::class);
    }
}