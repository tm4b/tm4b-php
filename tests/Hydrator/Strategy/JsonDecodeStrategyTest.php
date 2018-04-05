<?php

namespace Tm4bTest\Hydrator\Strategy;

use Tm4b\Hydrator\Strategy\JsonDecodeStrategy;
use Tm4bTest\TestCase;

/**
 * Class JsonDecodeStrategyTest
 * @package Tm4bTest\Hydrator\Strategy
 */
class JsonDecodeStrategyTest extends TestCase
{
    /**
     * @throws \Tm4b\Exception\DecodeException
     */
    public function testExtract()
    {
        $data = ['source_address' => 'GeorgeLucas'];

        $response = new \Zend\Diactoros\Response();
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($data));

        $jsonDecode = new JsonDecodeStrategy();
        $result = $jsonDecode->extract($response);

        $this->assertArrayHasKey('source_address', $result);
    }
}
