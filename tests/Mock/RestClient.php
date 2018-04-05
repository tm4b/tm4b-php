<?php

namespace Tm4bTest\Mock;

use Psr\Http\Message\RequestInterface;
use Tm4b\Rest\Client;
use Http\Message\MessageFactory\DiactorosMessageFactory;
use Http\Mock\Client as MockClient;

/**
 * Class RestClient
 * @package Tm4bTest\Mock
 */
class RestClient extends Client
{
    /**
     * RestClient constructor.
     */
    public function __construct()
    {
        $httpClient = new MockClient(new DiactorosMessageFactory());
        parent::__construct($httpClient, ['apiKey' => 'test_only']);
    }

    /**
     * @return \Http\Client\HttpClient|MockClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param RequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Http\Client\Exception
     */
    public function send(RequestInterface $request)
    {
        $mappers = [];
        return parent::send($request);
    }
}