<?php

namespace App\Libs\Action;

use App\Libs\Response\ErrorResponse;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;
use Exception;

/**
 * Class AddContact
 *
 * @package App\Libs\Action
 */
class AddContact
{

    /**
     * Добавление контакта
     *
     * @var array $contact Данные нового контакта
     * @return string
     */
    public function heandle (array $contact) : string
    {
        try {
            if (!isset($contact['name']) || !isset($contact['phone']) || !isset($contact['email'])){
                throw new Exception('Invalid data!');
            }

            Notebook::updateOrCreate($contact);

            return SuccessResponse::success([
                'contact_added' => 1,
            ]);
        } catch (Exception $e) {
            die(ErrorResponse::error($e->getMessage()));
        }
    }
}
