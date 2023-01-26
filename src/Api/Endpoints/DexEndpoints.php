<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\DexPair;
use Peerme\MxProviders\Entities\DexToken;

class DexEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getPairs(array $params = []): Collection
    {
        return DexPair::fromApiResponse(
            $this->client->request('GET', '/mex/pairs', [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getTokens(array $params = []): Collection
    {
        return DexToken::fromApiResponse(
            $this->client->request('GET', '/mex/tokens', [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }
}
