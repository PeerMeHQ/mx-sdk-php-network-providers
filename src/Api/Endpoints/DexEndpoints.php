<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\DexPair;
use Peerme\MxProviders\Entities\MexToken;

class DexEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getPairs(): Collection
    {
        return DexPair::fromApiResponse(
            $this->client->request('GET', "/mex/pairs"),
            isCollection: true,
        );
    }

    public function getTokens(): Collection
    {
        return MexToken::fromApiResponse(
            $this->client->request('GET', "/mex/tokens"),
            isCollection: true,
        );
    }
}
