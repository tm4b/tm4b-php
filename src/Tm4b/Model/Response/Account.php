<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Model\Response;

/**
 * Class Account
 * @package Tm4b\Model\Response
 */
class Account
{
    /**
     * @var float
     */
    protected $balance;

    /**
     * @var boolean
     */
    protected $autoPurchase;

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return Account
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAutoPurchase()
    {
        return $this->autoPurchase;
    }

    /**
     * @param bool $autoPurchase
     * @return Account
     */
    public function setAutoPurchase($autoPurchase)
    {
        $this->autoPurchase = $autoPurchase;

        return $this;
    }
}