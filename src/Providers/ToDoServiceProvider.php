<?php

namespace ToDoList\Providers;

use Findologic\Api\Request\ParametersBuilder;
use Plenty\Plugin\ServiceProvider;
use ToDoList\Contracts\ToDoRepositoryContract;
use ToDoList\Repositories\ToDoRepository;
use Plenty\Log\Services\ReferenceContainer;
use Plenty\Log\Exceptions\ReferenceTypeException;

/**
 * Class ToDoServiceProvider
 * @package ToDoList\Providers
 */
class ToDoServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->getApplication()->register(ToDoRouteServiceProvider::class);
        $this->getApplication()->bind(ToDoRepositoryContract::class, ToDoRepository::class);
    }

    public function boot(ReferenceContainer $referenceContainer)
    {
        try {
            $referenceContainer->add(['toDoId' => 'toDoId']);
        } catch (ReferenceTypeException $ex) {

        }
    }
}
