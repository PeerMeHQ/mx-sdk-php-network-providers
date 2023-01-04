<?php

use Peerme\MxProviders\Api\Endpoints\BlockEndpoints;

it('gets blocks', function () {
    $client = createMockedHttpClientWithResponseFile('blocks/blocks.json');

    $actual = (new BlockEndpoints($client))
        ->getBlocks();

    assertMatchesResponseSnapshot($actual);
});
