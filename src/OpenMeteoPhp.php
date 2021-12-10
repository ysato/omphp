<?php

declare(strict_types=1);

namespace Ysato\OpenMeteoPhp;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Exception;
use Http\Discovery\Psr17FactoryDiscovery;
use Ysato\HttpClientBuilder\Builder;
use Ysato\OpenMeteoPhp\Message\ResponseMediator;
use Ysato\OpenMeteoPhp\Plugin\PathPrepend;

use function array_merge;
use function http_build_query;

class OpenMeteoPhp
{
    private Builder $httpClientBuilder;

    public function __construct(?Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();

        $this->httpClientBuilder->addPlugin(
            new AddHostPlugin(Psr17FactoryDiscovery::findUriFactory()->createUri('https://api.open-meteo.com'))
        );
        $this->httpClientBuilder->addPlugin(new PathPrepend('/v1'));
    }

    /**
     * @param array<string, string> $options
     *
     * @return array<string, mixed>|string
     *
     * @throws Exception
     */
    public function forecast(float $latitude, float $longitude, array $options = [])
    {
        $httpClient = $this->httpClientBuilder->getHttpClient();

        $parameters = array_merge(['latitude' => $latitude, 'longitude' => $longitude], $options);
        $query = http_build_query($parameters);

        return ResponseMediator::getContent($httpClient->get('/forecast?' . $query));
    }
}
