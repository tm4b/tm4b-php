<?php

namespace Tm4b\Hydrator\Strategy;

use Psr\Http\Message\ResponseInterface;
use Tm4b\Exception\DecodeException;
use Webmozart\Assert\Assert;

/**
 * Class JsonDecodeStrategy
 * @package Tm4b\Hydrator\Strategy
 */
class JsonDecodeStrategy implements StrategyInterface
{
    /**
     * @param $data
     * @return array
     * @throws DecodeException
     */
    public function extract($data)
    {
        if (!$data instanceof ResponseInterface) {
            Assert::isInstanceOf($data, ResponseInterface::class);
        }

        $body = $data->getBody()->__toString();
        $statusCode = $data->getStatusCode();
        $contentType = $data->getHeaderLine('Content-Type');

        if (strpos($contentType, 'application/json') !== 0) {
            throw new DecodeException(
                sprintf("Unsupported content response %s", $contentType), $statusCode, $data
            );
        }

        $content = json_decode($body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new DecodeException(
                sprintf('Unable to decode the response body: %s', json_last_error_msg()), $statusCode, $data
            );
        }

        return $content;
    }
}