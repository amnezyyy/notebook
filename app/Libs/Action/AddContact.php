<?php

namespace App\Libs\Action;

use App\Libs\Interfaces\ActionInterface;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;

/**
 * Class AddContact
 *
 * @package App\Libs\ActionInterface
 */
class AddContact implements ActionInterface
{
    /** @var array $contact Данные контакта */
    private array $contact;

    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Добавление контакта
     *
     * @return string
     */
    public function handle () : string
    {
        Notebook::updateOrCreate($this->contact);

        return SuccessResponse::success([
            'contact_added' => 1,
        ]);
    }
}
