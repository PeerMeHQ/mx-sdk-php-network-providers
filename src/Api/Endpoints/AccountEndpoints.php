<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\Account;
use Peerme\MxProviders\Entities\Nft;
use Peerme\MxProviders\Entities\NftCollectionAccount;
use Peerme\MxProviders\Entities\NftCollectionRole;
use Peerme\MxProviders\Entities\TokenDetailedWithBalance;

class AccountEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getByAddress(string $address): Account
    {
        return Account::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}")
        );
    }

    public function getNfts(string $address, array $params = []): Collection
    {
        return Nft::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/nfts", $params),
        isCollection: true);
    }

    public function getTokens(string $address, array $params = []): Collection
    {
        return TokenDetailedWithBalance::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/tokens", $params),
        isCollection: true);
    }

    public function getToken(string $address, string $token): TokenDetailedWithBalance
    {
        return TokenDetailedWithBalance::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/tokens/{$token}")
        );
    }

    public function getCollections(string $address, array $params = []): Collection
    {
        return NftCollectionAccount::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/collections", $params),
            isCollection: true,
        );
    }

    public function getCollection(string $address, string $collection, array $params = []): NftCollectionAccount
    {
        return NftCollectionAccount::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/collections/{$collection}", $params),
        );
    }

    public function getRolesCollections(string $address, array $params = []): Collection
    {
        return NftCollectionRole::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/roles/collections", $params),
            isCollection: true,
        );
    }

    public function getRolesCollection(string $address, string $collection, array $params = []): NftCollectionRole
    {
        return NftCollectionRole::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/roles/collections/{$collection}", $params),
        );
    }
}
