<?php

declare(strict_types=1);

namespace Ysato\OpenMeteoPhp;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function json_encode;

use const JSON_THROW_ON_ERROR;

class OpenMeteoPhpTest extends TestCase
{
    public function testIsInstanceOfOpenMeteoPhp(): void
    {
        $SUT = new OpenMeteoPhp();

        $this->assertInstanceOf(OpenMeteoPhp::class, $SUT);
    }

    public function testForecast(): void
    {
        $expected = ['foo' => 'bar'];
        $response = new Response(200, ['Content-Type' => 'application/json'], json_encode($expected, JSON_THROW_ON_ERROR));

        $SUT = new OpenMeteoPhp(new FakeBuilder($response));

        $this->assertSame(['foo' => 'bar'], $SUT->forecast(52.52, 13.41, ['hourly' => 'temperature_2m']));
    }
}
