<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Rest;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tm4b\Hydrator\Strategy\StrategyInterface;

/**
 * Interface ClientInterface
 * @package Tm4b\Rest
 */
interface ClientInterface
{
    /**
     * @return mixed
     */
    public function getHttpClient();

    /**
     * @param string $path
     * @param array $params
     * @return mixed
     */
    public function get($path = null, array $params = []);

    /**
     * @param string $path
     * @param array $params
     * @return mixed
     */
    public function post($path = null, array $params = []);

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function send(RequestInterface $request);

    /**
     * @param ResponseInterface $response
     * @param $resultClass
     * @return mixed
     */
    public function hydrate(ResponseInterface $response, $resultClass);

    /**
     * @return StrategyInterface
     */
    public function decoder();
}