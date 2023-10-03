<?php

namespace App\Libs\Action;

use App\Libs\Response\ErrorResponse;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;
use Exception;

/**
 * Class DeleteContact
 *
 * @package App\Libs\Action
 */
class DeleteContact
{

    /**
     * Удаление контакта из записной книжки
     *
     * @var mixed $id Id контакта
     * @return string
     */
    public function heandle ($id) : string
    {
        try {
            if (is_integer($id)) {
                throw new Exception('Wrong Id!');
            }
            Notebook::find($id)->delete();

            return SuccessResponse::success([
                'deleted_contact' => 1,
            ]);
        } catch (Exception $e) {
            die(ErrorResponse::error($e->getMessage()));
        }
    }
}
