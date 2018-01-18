<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Hydrator;

/**
 * Interface HydrationInterface
 * @package Tm4b\Rest\Hydrator
 */
interface HydrationInterface
{
    /**
     * @param array $data
     * @param $object
     * @return mixed
     */
    public function hydrate(array $data, $object);
}