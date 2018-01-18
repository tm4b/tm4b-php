<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Model\Response;

/**
 * Class Sms
 * @package Tm4b\Model
 */
class Sms
{
    /**
     * @var string
     */
    protected $smsId;

    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var boolean
     */
    protected $unicode;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $updated;

    /**
     * @var \DateTime
     */
    protected $expires;

    /**
     * @var float
     */
    protected $cost;

    /**
     * @var int
     */
    protected $concatReference;

    /**
     * @var int
     */
    protected $concatCount;

    /**
     * @var int
     */
    protected $concatOrder;

    /**
     * @var array
     */
    protected $customArgs;

    /**
     * @return string
     */
    public function getSmsId()
    {
        return $this->smsId;
    }

    /**
     * @param string $smsId
     * @return Sms
     */
    public function setSmsId($smsId)
    {
        $this->smsId = $smsId;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return Sms
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return Sms
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     * @return Sms
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Sms
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUnicode()
    {
        return $this->unicode;
    }

    /**
     * @param bool $unicode
     * @return Sms
     */
    public function setUnicode($unicode)
    {
        $this->unicode = $unicode;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Sms
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return Sms
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return Sms
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param \DateTime $expires
     * @return Sms
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     * @return Sms
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return int
     */
    public function getConcatReference()
    {
        return $this->concatReference;
    }

    /**
     * @param int $concatReference
     * @return Sms
     */
    public function setConcatReference($concatReference)
    {
        $this->concatReference = $concatReference;

        return $this;
    }

    /**
     * @return int
     */
    public function getConcatCount()
    {
        return $this->concatCount;
    }

    /**
     * @param int $concatCount
     * @return Sms
     */
    public function setConcatCount($concatCount)
    {
        $this->concatCount = $concatCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getConcatOrder()
    {
        return $this->concatOrder;
    }

    /**
     * @param int $concatOrder
     * @return Sms
     */
    public function setConcatOrder($concatOrder)
    {
        $this->concatOrder = $concatOrder;

        return $this;
    }

    /**
     * @return array
     */
    public function getCustomArgs()
    {
        return $this->customArgs;
    }

    /**
     * @param array $customArgs
     * @return Sms
     */
    public function setCustomArgs($customArgs)
    {
        $this->customArgs = $customArgs;

        return $this;
    }
}