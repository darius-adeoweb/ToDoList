<?php

namespace ToDoList\Providers;

use Plenty\Plugin\ServiceProvider;
use ToDoList\Contracts\ToDoRepositoryContract;
use ToDoList\Repositories\ToDoRepository;

class ToDoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(ToDoRouteServiceProvider::class);
        $this->getApplication()->bind(ToDoRepositoryContract::class, ToDoRepository::class);
    }
}