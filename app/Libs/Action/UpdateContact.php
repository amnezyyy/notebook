<?php

namespace App\Libs\Action;

use App\Libs\Interfaces\ActionInterface;
use App\Libs\Response\SuccessResponse;
use App\Models\Notebook;

/**
 * Class UpdateContact
 *
 * @package App\Libs\ActionInterface
 */
class UpdateContact implements ActionInterface
{
    /** @var array $contact Новые данные контакта */
    private array $contact;

    /** @var int $id Id контакта */
    private int $id;

    public function __construct(array $contact, int $id)
    {
        $this->contact = $contact;
        $this->id = $id;
    }

    /**
     * Измениние контакта
     *
     * @return string
     */
    public function handle () : string
    {
        Notebook::find($this->id)->update($this->contact);

        return SuccessResponse::success([
            'updated_contact' => 1,
        ]);
    }
}
