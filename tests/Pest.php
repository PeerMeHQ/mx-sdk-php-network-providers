<?php

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Peerme\MxProviders\ClientFactory;
use Peerme\MxProviders\Tests\ResponseSnapshotDriver;
use Spatie\Snapshots\MatchesSnapshots;

uses(MatchesSnapshots::class)->in(__DIR__);

function createMockedHttpClientWithResponseValue($value): ClientInterface
{
    $expectedResponse = new Response(200, [], $value);
    $transactions = [];

    return ClientFactory::mock($expectedResponse, $transactions);
}

function createMockedHttpClientWithResponseFile(string $fileName): ClientInterface
{
    $content = file_get_contents(__DIR__ . '/Api/responses/' . $fileName);

    return createMockedHttpClientWithResponseValue($content);
}

function assertMatchesResponseSnapshot($actual): void
{
    test()->assertMatchesSnapshot($actual, new ResponseSnapshotDriver);
}
