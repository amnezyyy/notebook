<?php

namespace App\Libs\Interfaces;

/**
 * Interface ValidatorInterface
 *
 * @package App\Libs\Interfaces
 */
interface ValidatorInterface
{

    /**
     * Запуск функции
     *
     * @return array
     */
    public function valid () : array;
}
