<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */
namespace Tm4b\Rest;

use Http\Client\HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tm4b\Exception\HttpClientException;
use Tm4b\Hydrator\ObjectHydrator;
use Tm4b\Hydrator\Strategy\JsonDecodeStrategy;
use Tm4b\Hydrator\Strategy\StrategyInterface;
use Zend\Diactoros\Request;
use Tm4b\Hydrator\HydrationInterface;

/**
 * Class Client
 * @package Tm4b\Rest
 *
 * REST API URL: https://www.tm4b.com/api/rest/v1
 */
class Client implements ClientInterface
{
    const VERSION = "1.0";

    /**
     * @var HttpClient used to make requests
     */
    protected $httpClient;

    /**
     * @var array Options for requests and headers
     */
    protected $options;

    /**
     * @var HydrationInterface
     */
    protected $hydrator;

    /**
     * @var JsonDecodeStrategy
     */
    protected $decoder;

    /**
     * @var bool
     */
    protected $sandbox = false;

    /**
     * Valid options for requests that can be overridden with the setOptions
     */
    protected $validOptions = [
        'host' => 'api.tm4b.com',
        'scheme' => 'https',
        'apiKey' => null,
        'version' => 'v1',
        'debug' => false,
    ];

    /**
     * Client constructor.
     * @param HttpClient $httpClient
     * @param array $options
     */
    public function __construct(HttpClient $httpClient, array $options)
    {
        $this->setHttpClient($httpClient);
        $this->setOptions($options);
        $this->setHydrator(new ObjectHydrator());
        $this->setDecoder(new JsonDecodeStrategy());
    }

    /**
     * @return bool
     */
    public function isSandbox()
    {
        return $this->sandbox;
    }

    /**
     * @param bool $sandbox
     */
    public function setSandbox($sandbox)
    {
        $this->sandbox = (bool) $sandbox;
    }

    /**
     * @return StrategyInterface
     */
    public function decoder()
    {
        return $this->decoder;
    }

    /**
     * @param StrategyInterface $decoder
     * @return $this
     */
    public function setDecoder(StrategyInterface $decoder)
    {
        $this->decoder = $decoder;

        return $this;
    }

    /**
     * @return HydrationInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @param HydrationInterface $hydrator
     * @return Client
     */
    public function setHydrator(HydrationInterface $hydrator = null)
    {
        $this->hydrator = $hydrator;

        return $this;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param HttpClient $httpClient
     * @return Client
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Client
     */
    public function setOptions($options)
    {
        if (!isset($this->options['apiKey']) && (!isset($options['apiKey']) || !preg_match(
                    '/\S/',
                    $options['apiKey']
                ))) {
            throw new \InvalidArgumentException('You must provide an API key');
        }

        foreach ($this->validOptions as $key => $value) {
            if (isset($options[$key])) {
                $this->options[$key] = $options[$key];
            } else {
                $this->options[$key] = $this->validOptions[$key];
            }
        }
        return $this;
    }

    /**
     * @param null $path
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function get($path = null, array $params = [])
    {
        $url = $this->buildUrl($path, $params);
        $request = new Request(
            $url,
            'GET'
        );

        return $this->send($request);
    }

    /**
     * @param null $path
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function post($path = null, array $params = [])
    {
        $url = $this->buildUrl($path, $params);
        $request = new Request(
            $url,
            'POST'
        );
        $request->getBody()->write(json_encode($params));

        return $this->send($request);
    }

    /**
     * @param RequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function send(RequestInterface $request)
    {
        //$request = $request->withHeader('Accept', 'application/json');
        $request = $request->withHeader('Content-Type', 'application/json');
        $request = $request->withHeader('Authorization', sprintf("Bearer %s", $this->getApiKey()));
        $request = $request->withHeader(
            'User-Agent',
            sprintf(
                "tm4b-php/%s;php%s.%s",
                $this->getApiVersion(),
                PHP_MAJOR_VERSION,
                PHP_MINOR_VERSION
            )
        );

        return $this->getHttpClient()->sendRequest($request);
    }

    /**
     * @param null $path
     * @param array $params
     * @return string
     */
    public function buildUrl($path = null, array $params = [])
    {
        $options = $this->options;
        $queryString = (empty($params)) ? '' : sprintf("?%s", http_build_query($params));

        return sprintf(
            "%s://%s/%s%s",
            $options['scheme'],
            $options['host'],
            $options['version'],
            $path
        );
    }

    /**
     * @return mixed
     */
    protected function getApiKey()
    {
        return $this->options['apiKey'];
    }

    /**
     * @return mixed
     */
    protected function getApiVersion()
    {
        return $this->options['version'];
    }

    /**
     * Create the rest client instance with minimal configuration
     *
     * @param array $options
     * @return Client
     */
    public static function create(array $options)
    {
        $client = new \Http\Adapter\Guzzle6\Client();

        return new self($client, $options);
    }

    /**
     * @return Api\Message
     */
    public function messages()
    {
        return new Api\Message($this);
    }

    /**
     * @return Api\Account
     */
    public function account()
    {
        return new Api\Account($this);
    }

    /**
     * @return $this
     */
    public function disableHydrator()
    {
        $this->setHydrator(null);

        return $this;
    }

    /**
     * @param ResponseInterface $response
     * @param $object
     * @return mixed|ResponseInterface
     * @throws HttpClientException
     */
    public function hydrate(ResponseInterface $response, $object)
    {
        //raw response
        if ($this->hydrator === null) {
            return $response;
        }

        $statusCode = $response->getStatusCode();
        if ($statusCode !== 200 && $statusCode !== 201) {
            throw new HttpClientException(sprintf("HTTP Error [%s]", $statusCode), $statusCode, $response);
        }

        //return $this->getHydrator()->hydrate($data, $object);
        return $this->decoder->extract($response);
    }
}