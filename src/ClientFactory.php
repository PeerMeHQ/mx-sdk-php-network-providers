<?php

namespace Peerme\MxProviders;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class ClientFactory
{
    public static function create(string $baseUrl, array $options = []): ClientInterface
    {
        if (! isset($options['base_uri'])) {
            $options['base_uri'] = $baseUrl;
        }

        return new Client($options);
    }

    public static function mock(ResponseInterface $responseMock, array &$transactions = []): ClientInterface
    {
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $handlerStack->push(Middleware::history($transactions));

        return new Client(['handler' => $handlerStack]);
    }

    public static function mockError(RequestExceptionInterface $error, array &$transactions = []): ClientInterface
    {
        $mockHandler = new MockHandler([$error]);
        $handlerStack = HandlerStack::create($mockHandler);
        $handlerStack->push(Middleware::history($transactions));

        return new Client(['handler' => $handlerStack]);
    }
}
