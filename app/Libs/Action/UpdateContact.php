<?php

namespace App\Libs\Action;

use App\Libs\Response\ErrorResponse;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;
use Exception;

/**
 * Class UpdateContact
 *
 * @package App\Libs\Action
 */
class UpdateContact
{

    /**
     * Измениние контакта
     *
     * @var array $contact Массив с новыми данными контакта
     * @var mixed $id Id контакта
     * @return string
     */
    public function heandle (array $contact, $id) : string
    {
        try {
            if (!isset($contact['name']) || !isset($contact['phone']) || !isset($contact['email'])){
                throw new Exception('Invalid data!');
            }

            if (is_integer($id)) {
                throw new Exception('Wrong Id!');
            }

            Notebook::updateOrCreate(
                [
                    'id' => $id,
                ],
                $contact);

            return SuccessResponse::success([
                'updated_contact' => 1,
            ]);
        } catch (Exception $e) {
            die(ErrorResponse::error($e->getMessage()));
        }
    }
}
