<?php

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Peerme\MxProviders\ClientFactory;
use Peerme\MxProviders\Tests\MatchesSnapshots;
use Peerme\MxProviders\Tests\ResponseSnapshotDriver;

uses()->compact();
uses(MatchesSnapshots::class)->in(__DIR__);

function createMockedHttpClientWithResponse(array|string|int $value): ClientInterface
{
    $contents = is_string($value) && str_ends_with($value, '.json')
            ? file_get_contents(__DIR__ . '/Api/responses/' . $value)
            : $value;

    $response = new Response(200, [], $contents);
    $transactions = [];

    return ClientFactory::mock([$response], $transactions);
}

function assertMatchesResponseSnapshot($actual): void
{
    test()->assertMatchesSnapshot($actual, new ResponseSnapshotDriver);
}
