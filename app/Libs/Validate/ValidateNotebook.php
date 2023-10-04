<?php

namespace App\Libs\Validate;

use App\Libs\Interfaces\ValidatorInterface;
use Illuminate\Support\Facades\Validator;

/**
 * Class ValidateNotebook
 *
 * @implements ValidatorInterface
 * @package App\Libs\Validate
 */
class ValidateNotebook implements ValidatorInterface
{

    /** @var array $contact Данные контакта */
    private array $contact;

    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Валидация полей
     *
     * @return array
     */
    public function valid () : array
    {
        return Validator::make($this->contact, [
            'name' => 'required|max:255',
            'company' => 'sometimes|nullable|max:255',
            'phone' => 'required|unique:notebooks|max:11',
            'email' => 'required|unique:notebooks|max:255',
            'date' => 'sometimes|nullable',
            'image' => 'sometimes|nullable',
        ])->errors()->toArray();
    }
}
