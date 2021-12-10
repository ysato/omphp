<?php

declare(strict_types=1);

namespace Ysato\OpenMeteoPhp;

use GuzzleHttp\Psr7\Response;
use Http\Client\Common\HttpMethodsClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FakeHttpMethodsClient implements HttpMethodsClientInterface
{
    private Response $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function get($uri, array $headers = []): ResponseInterface
    {
        unset($uri, $headers);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function head($uri, array $headers = []): ResponseInterface
    {
        unset($uri, $headers);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function trace($uri, array $headers = []): ResponseInterface
    {
        unset($uri, $headers);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function post($uri, array $headers = [], $body = null): ResponseInterface
    {
        unset($uri, $headers, $body);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function put($uri, array $headers = [], $body = null): ResponseInterface
    {
        unset($uri, $headers, $body);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function patch($uri, array $headers = [], $body = null): ResponseInterface
    {
        unset($uri, $headers, $body);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function delete($uri, array $headers = [], $body = null): ResponseInterface
    {
        unset($uri, $headers, $body);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function options($uri, array $headers = [], $body = null): ResponseInterface
    {
        unset($uri, $headers, $body);

        return $this->response;
    }

    /**
     * @param array<array-key, mixed> $headers
     */
    public function send(string $method, $uri, array $headers = [], $body = null): ResponseInterface
    {
        unset($method, $uri, $headers, $body);

        return $this->response;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        unset($request);

        return $this->response;
    }
}
