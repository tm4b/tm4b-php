<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Rest\Api;

use Tm4b\Rest\ClientInterface;

/**
 * Class Account
 * @package Tm4b\Rest\Api
 */
class Account
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Message constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function describe()
    {
        $response = $this->client->get('/account', ['sandbox' => $this->client->isSandbox()]);
        return $this->client->hydrate($response, null);
    }
}