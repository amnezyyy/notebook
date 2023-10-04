<?php

namespace App\Libs\Action;

use App\Libs\Interfaces\ActionInterface;
use App\Libs\Response\ErrorResponse;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;

/**
 * Class DeleteContact
 *
 * @package App\Libs\ActionInterface
 * @implements ActionInterface
 */
class DeleteContact implements ActionInterface
{

    /** @var int $id Id контакта */
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Удаление контакта из записной книжки
     *
     * @return string
     */
    public function handle () : string
    {
        if (is_null(Notebook::find($this->id))) {
            return ErrorResponse::error([
                'Wrong ID!',
            ]);
        }
        Notebook::find($this->id)->delete();

        return SuccessResponse::success([
            'deleted_contact' => 1,
        ]);
    }
}
