<?php

use Peerme\MxProviders\Api\Endpoints\DexEndpoints;

it('gets dex pairs', function () {
    $client = createMockedHttpClientWithResponseFile('mex/pairs.json');

    $actual = (new DexEndpoints($client))
        ->getPairs();

    assertMatchesResponseSnapshot($actual);
});

it('gets mex tokens', function () {
    $client = createMockedHttpClientWithResponseFile('mex/tokens.json');

    $actual = (new DexEndpoints($client))
        ->getTokens();

    assertMatchesResponseSnapshot($actual);
});
