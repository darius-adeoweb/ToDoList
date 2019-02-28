<?php

namespace ToDoList\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;
use ToDoList\Contracts\ToDoRepositoryContract;
use Plenty\Plugin\Log\Loggable;
use Plenty\Plugin\Log\Reportable;

/**
 * Class ContentController
 * @package ToDoList\Controllers
 */
class ContentController extends Controller
{
    use Loggable, Reportable;

    /**
     * @param Twig                   $twig
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function showToDo(Twig $twig, ToDoRepositoryContract $toDoRepo): string
    {
        $toDoList = $toDoRepo->getToDoList();
        $templateData = array("tasks" => $toDoList);
        return $twig->render('ToDoList::content.todo', $templateData);
    }

    /**
     * @param  \Plenty\Plugin\Http\Request $request
     * @param ToDoRepositoryContract       $toDoRepo
     * @return string
     */
    public function createToDo(Request $request, ToDoRepositoryContract $toDoRepo): string
    {
        $newToDo = $toDoRepo->createTask($request->all());

        $this->getLogger('ContentController_createToDo')
            ->setReferenceType('toDoId')
            ->setReferenceValue($newToDo->id)
            ->info('ToDoList::migration.createToDoInformation', ['userId' => $newToDo->userId]);

        $this->report('ContentController_createToDo',
            'ToDoList::migration.createToDoInformation',
            ['userId' => $newToDo->id],
            ['toDoId' => $newToDo->id]
        );

        return json_encode($newToDo);
    }

    /**
     * @param int                    $id
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function updateToDo(int $id, ToDoRepositoryContract $toDoRepo): string
    {
        $updateToDo = $toDoRepo->updateTask($id);
        return json_encode($updateToDo);
    }

    /**
     * @param int                    $id
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function deleteToDo(int $id, ToDoRepositoryContract $toDoRepo): string
    {
        $deleteToDo = $toDoRepo->deleteTask($id);
        return json_encode($deleteToDo);
    }
}
