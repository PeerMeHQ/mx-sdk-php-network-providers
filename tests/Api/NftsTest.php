<?php

use Peerme\MxProviders\Api\Endpoints\NftEndpoints;
use Peerme\MxProviders\Entities\Nft;

it('gets an nft by id', function () {
    $client = createMockedHttpClientWithResponse('nfts/nft.json');

    $actual = (new NftEndpoints($client))
        ->getById('MARSHM1-021222-74');

    assertMatchesResponseSnapshot($actual);

    expect($actual)->toBeInstanceOf(Nft::class);
    expect(base64_decode($actual->attributes))->toBe("Background:white; skin:orange; contour:black; effect:half tone; accessories:dango");
    expect($actual->description)->toBe("test description");
    expect($actual->royalties)->toBe(8);
});

it('gets the owner accounts of an nft', function () {
    $client = createMockedHttpClientWithResponse('nfts/accounts.json');

    $actual = (new NftEndpoints($client))
        ->getAccounts('SCYPERKS-025266-01');

    assertMatchesResponseSnapshot($actual);
});
