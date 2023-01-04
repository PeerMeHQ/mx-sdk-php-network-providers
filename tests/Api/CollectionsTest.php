<?php

use Peerme\MxProviders\Api\Endpoints\CollectionEndpoints;
use Peerme\MxProviders\Entities\NftCollection;

it('gets a collection by id', function () {
    $client = createMockedHttpClientWithResponseFile('collections/collection.json');

    $actual = (new CollectionEndpoints($client))
        ->getById('VNFT-507997');

    assertMatchesResponseSnapshot($actual);

    expect($actual)->toBeInstanceOf(NftCollection::class);
});

it('gets nfts', function () {
    $client = createMockedHttpClientWithResponseFile('collections/nfts.json');

    $actual = (new CollectionEndpoints($client))
        ->getNftsById('VNFT-507997');

    assertMatchesResponseSnapshot($actual);
});

it('gets accounts', function () {
    $client = createMockedHttpClientWithResponseFile('collections/accounts.json');

    $actual = (new CollectionEndpoints($client))
        ->getAccounts('VNFT-507997');

    assertMatchesResponseSnapshot($actual);
});
