<?php

namespace ToDoList\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class ToDoRouteServiceProvider
 * @package ToDoList\Providers
 */
class ToDoRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get('todo', 'ToDoList\Controllers\ContentController@showToDo');
        $router->post('todo', 'ToDoList\Controllers\ContentController@createToDo');
        $router->put('todo/{id}', 'ToDoList\Controllers\ContentController@updateToDo')->where('id', '\d+');
        $router->delete('todo/{id}', 'ToDoList\Controllers\ContentController@deleteToDo')->where('id', '\d+');
    }

}
