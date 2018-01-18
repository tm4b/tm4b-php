<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Model\Response;

/**
 * Class Message
 * @package Tm4b\Model\Response
 */
class Message
{
    /**
     * message_reference
     * @var string
     */
    protected $messageReference;

    /**
     * message_status
     * @var string
     */
    protected $messageStatus;

    /**
     * total_cost
     * @var float
     */
    protected $totalCost;

    /**
     * sms_count
     * @var int
     */
    protected $smsCount;

    /**
     * @var Sms[]
     */
    protected $sms;

    /**
     * @var Error[]
     */
    protected $errors;

    /**
     * @return string
     */
    public function getMessageReference()
    {
        return $this->messageReference;
    }

    /**
     * @param string $messageReference
     * @return Message
     */
    public function setMessageReference($messageReference)
    {
        $this->messageReference = $messageReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageStatus()
    {
        return $this->messageStatus;
    }

    /**
     * @param string $messageStatus
     * @return Message
     */
    public function setMessageStatus($messageStatus)
    {
        $this->messageStatus = $messageStatus;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * @param float $totalCost
     * @return Message
     */
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;

        return $this;
    }

    /**
     * @return int
     */
    public function getSmsCount()
    {
        return $this->smsCount;
    }

    /**
     * @param int $smsCount
     * @return Message
     */
    public function setSmsCount($smsCount)
    {
        $this->smsCount = $smsCount;

        return $this;
    }

    /**
     * @return Sms[]
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * @param Sms[] $sms
     * @return Message
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param Error[] $errors
     * @return Message
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return (null !== $this->errors);
    }
}