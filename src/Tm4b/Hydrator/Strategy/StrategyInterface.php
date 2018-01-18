<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Hydrator\Strategy;

/**
 * Interface StrategyInterface
 * @package Tm4b\Hydrator\Strategy
 */
interface StrategyInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function extract($value);
}