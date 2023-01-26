<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Peerme\Mx\Transaction;
use Peerme\MxProviders\Entities\TransactionDetailed;
use Peerme\MxProviders\Entities\TransactionSendResult;

class TransactionEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getByHash(string $txHash, array $params = []): TransactionDetailed
    {
        return TransactionDetailed::fromApiResponse(
            $this->client->request('GET', "/transactions/{$txHash}", [
                'query' => $params,
            ]),
        );
    }

    public function send(Transaction $tx): TransactionSendResult
    {
        return TransactionSendResult::fromApiResponse(
            $this->client->request('POST', "/transactions", [
                'json' => $tx->toSendable(),
            ]),
        );
    }
}
