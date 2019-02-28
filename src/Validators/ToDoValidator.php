<?php

namespace ToDoList\Validators;

use Plenty\Validation\Validator;

class ToDoValidator extends Validator
{
    protected function defineAttributes()
    {
        $this->addString('taskDescription', true);
    }

    public function buildCustomMessages()
    {
        // TODO: Implement buildCustomMessages() method.
    }
}