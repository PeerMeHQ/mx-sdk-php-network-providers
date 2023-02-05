<?php

use Peerme\MxProviders\Api\Endpoints\TransactionEndpoints;

it('gets a transaction by transaction hash', function () {
    $client = createMockedHttpClientWithResponse('transactions/transaction.json');

    $actual = (new TransactionEndpoints($client))
        ->getByHash('01b94cb36f027bab9391414971c7feb348755c53f8ea27f19c18fb82db35ea7d');

    test()->assertMatchesSnapshot($actual);
});

it('gets all events of a transactions', function () {
    $client = createMockedHttpClientWithResponse('transactions/transaction-mixed-events.json');

    $actual = (new TransactionEndpoints($client))
        ->getByHash('5be5f3717595dc8b2bf462136fb95b60c0acb34aa8c8a4da62f57708cd24131f');

    expect($actual->getAllEvents())
        ->toHaveCount(76);
});
