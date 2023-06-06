<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\Account;
use Peerme\MxProviders\Entities\Nft;
use Peerme\MxProviders\Entities\NftCollectionAccount;
use Peerme\MxProviders\Entities\NftCollectionRole;
use Peerme\MxProviders\Entities\TokenDetailedWithBalance;
use Peerme\MxProviders\Entities\Transaction;

class AccountEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getByAddress(string $address, array $params = []): Account
    {
        return Account::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}", [
                'query' => $params,
            ]),
        );
    }

    public function getNfts(string $address, array $params = []): Collection
    {
        return Nft::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/nfts", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getTokens(string $address, array $params = []): Collection
    {
        return TokenDetailedWithBalance::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/tokens", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getToken(string $address, string $token, array $params = []): TokenDetailedWithBalance
    {
        return TokenDetailedWithBalance::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/tokens/{$token}", [
                'query' => $params,
            ]),
        );
    }

    public function getCollections(string $address, array $params = []): Collection
    {
        return NftCollectionAccount::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/collections", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getCollection(string $address, string $collection, array $params = []): NftCollectionAccount
    {
        return NftCollectionAccount::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/collections/{$collection}", [
                'query' => $params,
            ]),
        );
    }

    public function getRolesCollections(string $address, array $params = []): Collection
    {
        return NftCollectionRole::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/roles/collections", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getRolesCollection(string $address, string $collection, array $params = []): NftCollectionRole
    {
        return NftCollectionRole::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/roles/collections/{$collection}", [
                'query' => $params,
            ]),
        );
    }

    public function getTransactions(string $address, array $params = []): Collection
    {
        return Transaction::fromApiResponse(
            $this->client->request('GET', "/accounts/{$address}/transactions", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }
}
