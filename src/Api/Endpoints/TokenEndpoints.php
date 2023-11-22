<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\TokenAccount;
use Peerme\MxProviders\Entities\TokenAddressRoles;
use Peerme\MxProviders\Entities\TokenDetailed;
use Peerme\MxProviders\Entities\Transaction;

class TokenEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getById(string $tokenId, array $params = []): TokenDetailed
    {
        return TokenDetailed::fromApiResponse(
            $this->client->request('GET', "/tokens/{$tokenId}", [
                'query' => $params,
            ]),
        );
    }

    public function getTokens(array $params = []): Collection
    {
        return TokenDetailed::fromApiResponse(
            $this->client->request('GET', "/tokens", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getAccounts(string $tokenId, array $params = []): Collection
    {
        return TokenAccount::fromApiResponse(
            $this->client->request('GET', "/tokens/{$tokenId}/accounts", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getAccountsCount(string $tokenId, array $params = []): int
    {
        return (int) $this->client->request('GET', "/tokens/{$tokenId}/accounts/count", [
            'query' => $params,
        ])
            ->getBody()
            ->getContents();
    }

    public function getTransactions(string $tokenId, array $params = []): Collection
    {
        return Transaction::fromApiResponse(
            $this->client->request('GET', "/tokens/{$tokenId}/transactions", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }

    public function getRoles(string $tokenId, array $params = []): Collection
    {
        return TokenAddressRoles::fromApiResponse(
            $this->client->request('GET', "/tokens/{$tokenId}/roles", [
                'query' => $params,
            ]),
            isCollection: true,
        );
    }
}
