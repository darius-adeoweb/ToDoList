<?php

namespace ToDoList\Validators;

use Plenty\Validation\Validator;

/**
 *  Validator Class
 */
class ToDoValidator extends Validator
{
    protected function defineAttributes()
    {
        $this->addString('taskDescription', true);
    }
}