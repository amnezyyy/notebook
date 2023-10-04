<?php

namespace App\Libs\Validate;

use App\Libs\Interfaces\ValidatorInterface;
use App\Models\Notebook;
use Illuminate\Support\Facades\Validator;

/**
 * Class ValidateUpdate
 *
 * @implements ValidatorInterface
 * @package App\Http\Controllers
 */
class ValidateUpdate implements ValidatorInterface
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
     * Валидация полей
     *
     * @return array
     */
    public function valid () : array
    {
        if (is_null(Notebook::find($this->id))) {
            return [
                'Wrong ID!',
            ];
        }
        return Validator::make($this->contact, [
            'name' => 'sometimes|max:255',
            'company' => 'sometimes|nullable|max:255',
            'phone' => 'sometimes|unique:notebooks|max:11',
            'email' => 'sometimes|unique:notebooks|max:255',
            'date' => 'sometimes|nullable',
            'image' => 'sometimes|nullable',
        ])->errors()->toArray();
    }
}
