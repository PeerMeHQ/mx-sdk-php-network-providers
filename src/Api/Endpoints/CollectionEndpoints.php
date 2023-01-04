<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\CollectionAccount;
use Peerme\MxProviders\Entities\Nft;
use Peerme\MxProviders\Entities\NftCollection;

class CollectionEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getById(string $identifier, array $params = []): NftCollection
    {
        return NftCollection::fromApiResponse(
            $this->client->request('GET', "/collections/{$identifier}", $params),
        );
    }

    public function getNftsById(string $identifier, array $params = []): Collection
    {
        return Nft::fromApiResponse(
            $this->client->request('GET', "/collections/{$identifier}/nfts", $params),
            isCollection: true,
        );
    }

    public function getAccounts(string $tokenId, array $params = []): Collection
    {
        return CollectionAccount::fromApiResponse(
            $this->client->request('GET', "/collections/{$tokenId}/accounts", $params),
            isCollection: true,
        );
    }
}
