<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Rest\Api;

use Psr\Http\Message\ResponseInterface;
use Tm4b\Model\Response\Result;
use Tm4b\Rest\ClientInterface;
use Webmozart\Assert\Assert;

/**
 * Class Message
 * @package Tm4b\Rest\Api
 */
class Message
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var array
     */
    private $attributes = [
        'from',
        'to',
        'message',
        'message_reference',
        'unicode',
        'expiry',
        'concat_reference',
        'concat_count ',
        'concat_order ',
        'custom_args ',
    ];

    /**
     * Message constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $messages
     * @return array
     */
    public function send($messages)
    {
        Assert::isArray($messages);

        if (isset($messages['to']) || isset($messages['from']) || isset($messages['message'])) {
            $messages = [$messages];
        }

        return $this->batchSend($messages);
    }

    /**
     * @param array $messages
     * @return array
     */
    protected function batchSend($messages)
    {
        Assert::isArray($messages);

        foreach ($messages as $key => $message) {
            Assert::notEmpty($message['from']);
            Assert::notEmpty($message['to']);
            Assert::notEmpty($message['message']);

            foreach ($message as $param) {
                if (!isset($this->attributes[$param])) {
                    unset($message[$param]);
                    continue;
                }

                $messages[$key] = $message;
            }
        }

        $response = $this->client->post('/sms', ['messages' => $messages]);

        return $this->client->hydrate($response, null);
    }
}