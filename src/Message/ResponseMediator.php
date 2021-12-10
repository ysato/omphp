<?php

declare(strict_types=1);

namespace Ysato\OpenMeteoPhp\Message;

use Psr\Http\Message\ResponseInterface;

use function json_decode;
use function json_last_error;
use function strpos;

use const JSON_ERROR_NONE;

final class ResponseMediator
{
    /**
     * @return array<string, mixed>|string
     */
    public static function getContent(ResponseInterface $response)
    {
        $body = $response->getBody()->__toString();
        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
            /** @var array<string, mixed> $content */
            $content = json_decode($body, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $content;
            }
        }

        return $body;
    }
}
