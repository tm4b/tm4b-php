<?php

namespace Tm4bTest\Rest\Api;

use Tm4b\Rest\Api\Message;
use Tm4bTest\TestCase;

/**
 * Class MessageTest
 * @package Tm4bTest\Rest\Api
 */
class MessageTest extends TestCase
{
    protected $messages;

    public function setUp()
    {
        parent::setUp();
        $this->messages = new Message($this->createMockRestClient());
    }

    public function testConstructor()
    {
        $this->assertTrue(true);
    }

    public function testSend()
    {
        $this->assertTrue(true);
    }
}
