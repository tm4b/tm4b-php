<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Model\Response;

/**
 * Class ResultResponse
 * @package Tm4b\Model\Response
 */
class Result
{
    /**
     * @var int
     */
    protected $messageCount;

    /**
     * @var int
     */
    protected $messagesAccepted;

    /**
     * @var int
     */
    protected $messagesRejected;

    /**
     * @var Message[]
     */
    protected $messages;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @return int
     */
    public function getMessageCount()
    {
        return $this->messageCount;
    }

    /**
     * @param int $messageCount
     * @return Result
     */
    public function setMessageCount($messageCount)
    {
        $this->messageCount = $messageCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessagesAccepted()
    {
        return $this->messagesAccepted;
    }

    /**
     * @param int $messagesAccepted
     * @return Result
     */
    public function setMessagesAccepted($messagesAccepted)
    {
        $this->messagesAccepted = $messagesAccepted;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessagesRejected()
    {
        return $this->messagesRejected;
    }

    /**
     * @param int $messagesRejected
     * @return Result
     */
    public function setMessagesRejected($messagesRejected)
    {
        $this->messagesRejected = $messagesRejected;

        return $this;
    }

    /**
     * @return Message[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param Message[] $messages
     * @return Result
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * request_id
     * sandbox
     * account
     *
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     * @return Result
     */
    public function setMetadata(array $metadata = null)
    {
        $this->metadata = $metadata;

        return $this;
    }
}