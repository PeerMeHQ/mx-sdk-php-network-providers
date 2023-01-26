<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\Nft;
use Peerme\MxProviders\Entities\NftOwner;

class NftEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getById(string $identifier, array $params = []): Nft
    {
        return Nft::fromApiResponse(
            $this->client->request('GET', "/nfts/{$identifier}", [
                'query' => $params,
            ]),
        );
    }

    public function getAccounts(string $identifier, array $params = []): Collection
    {
        return NftOwner::fromApiResponse(
            $this->client->request('GET', "/nfts/{$identifier}/accounts", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }
}
