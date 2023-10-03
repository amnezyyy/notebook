<?php

namespace App\Http\Controllers;

use App\Libs\Action\AddContact;
use App\Libs\Action\DeleteContact;
use App\Libs\Action\UpdateContact;
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
        return Notebook::get();
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
     * @var Request $request Данные контакта
     * @return string
     */
    public function addContact (Request $request) : string
    {
        $action = new AddContact();
        return $action->heandle($request->all());
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
        $action = new UpdateContact();
        return $action->heandle($request->all(), $id);
    }

    /**
     * Удаление контакта
     *
     * @var mixed $id Id контакта
     * @return string
     */
    public function deleteContact ($id): string
    {
        $action = new DeleteContact();
        return $action->heandle($id);
    }
}
