<?php

namespace App\Libs\Runner;

use App\Libs\Interfaces\ActionInterface;
use App\Libs\Interfaces\ValidatorInterface;
use App\Libs\Response\ErrorResponse;

/**
 * Class NotebookControllerRunner
 *
 * @package App\Libs\Runner
 */
class NotebookControllerRunner
{

    /** @var ActionInterface  $action Метод исполнения */
    private ActionInterface $action;

    /** @var ValidatorInterface  $valid Валидация полей */
    private ValidatorInterface $valid;

    public function __construct(ActionInterface $action, ValidatorInterface $valid)
    {
        $this->action = $action;
        $this->valid = $valid;
    }

    /**
     * Метод запуска всех функций контроллера, с помощью валидации полей
     *
     * @return string
     */
    public function run () : string
    {
        $validData = $this->valid->valid();
        if (!$validData == array()) {
            return ErrorResponse::error($validData);
        }

        return $this->action->handle();
    }
}
