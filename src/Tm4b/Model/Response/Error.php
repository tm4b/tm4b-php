<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Model\Response;

/**
 * Class ErrorResponse
 * @package Tm4b\Model\Response
 */
class Error
{
    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $learnMore;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return Error
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Error
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getLearnMore()
    {
        return $this->learnMore;
    }

    /**
     * @param string $learnMore
     * @return Error
     */
    public function setLearnMore($learnMore)
    {
        $this->learnMore = $learnMore;

        return $this;
    }
}