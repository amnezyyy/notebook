<?php

namespace App\Http\Controllers;

use App\Libs\Action\AddContact;
use App\Libs\Action\DeleteContact;
use App\Libs\Action\UpdateContact;
use App\Libs\Runner\NotebookControllerRunner;
use App\Libs\Validate\ValidateNotebook;
use App\Libs\Validate\ValidateUpdate;
use App\Models\Notebook;
use Illuminate\Http\Request;

/**
 * Class ApiController
 *
 * @extends Controller
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * Получение всех контактов
     *
     * @return object
     */
    public function getNotebook (): object
    {
        return Notebook::get()->paginate(15);
    }

    /**
     * Получение одного контакта
     *
     * @var mixed $id Id контакта
     * @return object
     */
    public function getNotebookById ($id) : object
    {
        return Notebook::find($id)->first();
    }

    /**
     * Добавление контакта
     *
     * @var Request $request Данные контакта для измениня
     * @return string
     */
    public function addContact (Request $request) : string
    {
        $request = $request->all();
        $runner = new NotebookControllerRunner(
            new AddContact($request),
            new ValidateNotebook($request)
        );
        return $runner->run();
    }

    /**
     * Изменение контакта
     *
     * @var Request $request Новые данные контакта
     * @var mixed $id Id контакта
     * @return string
     */
    public function updateContactById (Request $request, $id) : string
    {
        $request = $request->all();
        $runner = new NotebookControllerRunner(
            new UpdateContact($request, $id),
            new ValidateUpdate($request, $id)
        );
        return $runner->run();
    }

    /**
     * Удаление контакта
     *
     * @var mixed $id Id контакта
     * @return string
     */
    public function deleteContact ($id): string
    {
        $action = new DeleteContact($id);
        return $action->handle();
    }
}
