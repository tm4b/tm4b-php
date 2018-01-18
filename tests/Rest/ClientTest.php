<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4bTest\Rest;

use Http\Message\MessageFactory\DiactorosMessageFactory;
use Tm4b\Rest\Client;
use Http\Mock\Client as MockClient;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response;
use Helmich\Psr7Assert\Psr7Assertions;

/**
 * Class ClientTest
 * @package Tm4bTest\Rest
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    use Psr7Assertions;

    /**
     * @var MockClient
     */
    protected $mockClient;

    /**
     * @var Request
     */
    protected $mockRequest;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * API URL
     */
    const API_URL = 'https://www.tm4b.com/api/rest/v1';

    /**
     * Setup
     */
    public function setUp()
    {
        $this->apiKey = getenv('TM4B_API_KEY');
        $this->mockClient = $this->createMockClient();
        $this->mockRequest = $this->createMockRequest();
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testBaseUri()
    {
        $client = new Client($this->mockClient, ['apiKey' => $this->apiKey]);
        $request = $this->createMockRequest();
        $client->send($request);

        $request = $this->mockClient->getRequests()[0];
        $this->assertRequestHasUri($request, self::API_URL);
    }

    /**
     *
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testAuthorizationRequest()
    {
        $client = new Client($this->mockClient, ['apiKey' => $this->apiKey]);
        $request = $this->createMockRequest();
        $client->send($request);

        $request = $this->mockClient->getRequests()[0];
        $this->assertMessageHasHeaders(
            $request,
            [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => sprintf("Bearer %s", $this->apiKey),
            ]
        );
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
            ->withUri(new \Zend\Diactoros\Uri('http://example.com'))
            ->withMethod($requestMethod);

        if ($requestMethod != 'GET') {
            $request->getBody()->write(json_encode($params));
        }

        return $request;
    }
}
