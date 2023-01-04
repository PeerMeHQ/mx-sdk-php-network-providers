<?php

use Peerme\MxProviders\Api\Endpoints\TransactionEndpoints;

it('gets a transaction by transaction hash', function () {
    $client = createMockedHttpClientWithResponse('transactions/transaction.json');

    $actual = (new TransactionEndpoints($client))
        ->getByHash('01b94cb36f027bab9391414971c7feb348755c53f8ea27f19c18fb82db35ea7d');

    test()->assertMatchesSnapshot($actual);
});
