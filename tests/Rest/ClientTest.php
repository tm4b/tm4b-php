<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4bTest\Rest;

use Tm4b\Rest\Api\Message;
use Tm4bTest\TestCase;
use Helmich\Psr7Assert\Psr7Assertions;

/**
 * Class ClientTest
 * @package Tm4bTest\Rest
 */
class ClientTest extends TestCase
{
    use Psr7Assertions;

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testBaseUri()
    {
        $client = $this->createMockRestClient();
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
        $client = $this->createMockRestClient();
        $request = $this->createMockRequest();
        $client->send($request);

        $request = $this->mockClient->getRequests()[0];
        $this->assertMessageHasHeaders(
            $request,
            [
                'Content-Type' => 'application/json',
                'Authorization' => sprintf("Bearer %s", $this->apiKey),
            ]
        );
    }

    /**
     * Test Get Request
     * @throws \Http\Client\Exception
     */
    public function testGet()
    {
        $client = $this->createMockRestClient();
        $client->get('/messages', []);

        $request = $this->mockClient->getRequests()[0];
        $this->assertRequestIsGet($request);
    }

    /**
     * Test Get Request
     * @throws \Http\Client\Exception
     */
    public function testPost()
    {
        $client = $this->createMockRestClient();
        $client->post('/messages', ['first_name' => 'John']);

        $request = $this->mockClient->getRequests()[0];
        $this->assertRequestIsPost($request);
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testSend()
    {
        $client = $this->createMockRestClient();
        $client->post('/messages', ['first_name' => 'John']);

        $request = $this->mockClient->getRequests()[0];
        $this->assertRequestIsPost($request);
        $this->assertMessageHasHeaders(
            $request,
            [
                'Content-Type' => 'application/json',
                'Authorization' => sprintf("Bearer %s", $this->apiKey),
            ]
        );
    }

    /**
     * Test build url with query parameters
     */
    public function testBuildUrl()
    {
        $client = $this->createMockRestClient();
        $path   = '/messages';
        $url    = $client->buildUrl($path);
        $finalUrl = self::API_URL . $path;

        $this->assertEquals($url, $finalUrl);
    }

    /**
     * Test messages instance
     */
    public function testMessages()
    {
        $client = $this->createMockRestClient();
        $messages = $client->messages();

        $this->assertInstanceOf(Message::class, $messages);
    }
}
