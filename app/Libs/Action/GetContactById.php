<?php

namespace App\Libs\Action;

use App\Libs\Interfaces\ActionInterface;
use App\Libs\Response\ErrorResponse;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;

/**
 * Class GetContactById
 *
 * @implements ActionInterface
 * @package App\Libs\Action
 */
class GetContactById implements ActionInterface
{
    /** @var int $id Id контакта */
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Получение одного контакта
     *
     * @return string
     */
    public function handle(): string
    {
        if (is_numeric($this->id) && !is_null(Notebook::find($this->id))) {
            return SuccessResponse::success(Notebook::find($this->id)->first());
        }

        return ErrorResponse::error([
            'Wrong Id!'
        ]);
    }
}


