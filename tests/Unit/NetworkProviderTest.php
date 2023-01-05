<?php

use GuzzleHttp\Psr7\Response;
use Peerme\MxProviders\Api\ApiNetworkProvider;
use Peerme\MxProviders\ClientFactory;
use Peerme\MxProviders\NetworkProvider;

it('creates an api network provider', function () {
    $provider = NetworkProvider::api('https://api.multiversx.com');

    expect($provider)
        ->toBeInstanceOf(ApiNetworkProvider::class);
});

it('creates an api network provider with a custom http client', function () {
    $responses = [
        new Response(200, [], '[]'),
    ];

    $transactions = [];

    $options = [
        'base_uri' => 'https://api.aaa.com',
    ];

    $client = ClientFactory::mock($responses, $transactions, $options);

    $provider = NetworkProvider::api('https://api.bbb.com', $client);

    expect($provider->client)->toBe($client);
});
