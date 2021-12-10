<?php

declare(strict_types=1);

namespace Ysato\OpenMeteoPhp;

use GuzzleHttp\Psr7\Response;
use Http\Client\Common\HttpMethodsClientInterface;
use Ysato\HttpClientBuilder\Builder;

class FakeBuilder extends Builder
{
    private Response $response;

    public function __construct(Response $response)
    {
        $this->response = $response;

        parent::__construct();
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return new FakeHttpMethodsClient($this->response);
    }
}
