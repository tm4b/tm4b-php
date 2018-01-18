<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */
namespace Tm4b\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClientException
 * @package Tm4b\Exception
 */
class HttpClientException extends \Exception
{
    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * @var array
     */
    private $responseBody;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @param string $message
     * @param int $code
     * @param ResponseInterface|null $response
     */
    public function __construct($message, $code = 0, ResponseInterface $response = null)
    {
        parent::__construct($message, $code);
        if ($response instanceof ResponseInterface) {
            $this->response = $response;
            $this->statusCode = $response->getStatusCode();
            $this->responseBody = $this->extract($response);
        }
    }

    /**
     * @return null|ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return array
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $data
     * @return array|string
     */
    protected function extract(ResponseInterface $data)
    {
        $body = $data->getBody()->__toString();
        $contentType = $data->getHeaderLine('Content-Type');
        if (strpos($contentType, 'application/json') !== 0) {
            return $body;
        }

        return json_decode($body, true);
    }
}