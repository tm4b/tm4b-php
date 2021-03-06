<?php

namespace Tm4bTest;

use Http\Message\MessageFactory\DiactorosMessageFactory;
use Http\Mock\Client as MockClient;
use Tm4b\Rest\Client;
use Tm4bTest\Mock\RestClient;
use Zend\Diactoros\Request;

/**
 * Class TestCase
 * @package Tm4bTest
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Request
     */
    protected $mockRequest;

    /**
     * @var Client
     */
    protected $restClient;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * API URL
     */
    const API_URL = 'https://api.tm4b.com/v1';

    /**
     * Setup
     */
    public function setUp()
    {
        $this->apiKey = 'test_only';
        $this->mockRequest = $this->createMockRequest();
        $this->restClient = $this->createMockRestClient();
    }

    /**
     * A fake http client to validate the http requests
     * @return MockClient
     */
    protected function createMockClient()
    {
        $http = new MockClient(new DiactorosMessageFactory());
        return $http;
    }

    /**
     * Create a mock request to validate the rest client
     *
     * @param string $requestMethod
     * @param array $params
     * @return Request|static
     */
    protected function createMockRequest($requestMethod = 'GET', array $params = [])
    {
        $request = (new \Zend\Diactoros\Request())
            ->withUri(new \Zend\Diactoros\Uri('https://api.tm4b.com/v1'))
            ->withMethod($requestMethod);

        $request = $request->withHeader('Content-Type', 'application/json');
        $request = $request->withHeader('Authorization', sprintf("Bearer %s", $this->apiKey));

        if ($requestMethod != 'GET') {
            $request->getBody()->write(json_encode($params));
        }

        return $request;
    }

    /**
     * @param array $options
     * @return RestClient
     */
    protected function createMockRestClient()
    {
        return new RestClient();
    }
}