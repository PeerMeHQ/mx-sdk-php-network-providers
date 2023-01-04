<?php

use Peerme\MxProviders\Api\Endpoints\NetworkEndpoints;

it('gets economics', function () {
    $client = createMockedHttpClientWithResponseFile('network/economics.json');

    $actual = (new NetworkEndpoints($client))
        ->getEconomics();

    assertMatchesResponseSnapshot($actual);
});

it('gets constants', function () {
    $client = createMockedHttpClientWithResponseFile('network/constants.json');

    $actual = (new NetworkEndpoints($client))
        ->getNetworkConstants();

    assertMatchesResponseSnapshot($actual);
});
