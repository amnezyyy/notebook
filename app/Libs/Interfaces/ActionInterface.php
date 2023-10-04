<?php

namespace App\Libs\Interfaces;

/**
 * Interface ActionInterface
 *
 * @package App\Libs\Interfaces
 */
interface ActionInterface
{

    /**
     * Запуск функции
     *
     * @return string
     */
    public function handle () : string;
}
