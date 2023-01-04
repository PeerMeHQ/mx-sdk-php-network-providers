<?php

use Peerme\MxProviders\Api\ApiNetworkProvider;
use Peerme\MxProviders\NetworkProvider;

it('creates an api client', function () {
    $client = NetworkProvider::api('https://api.multiversx.com');

    expect($client)
        ->toBeInstanceOf(ApiNetworkProvider::class);
});
