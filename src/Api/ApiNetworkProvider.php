<?php

namespace Peerme\MxProviders\Api;

use GuzzleHttp\ClientInterface;
use Peerme\MxProviders\Api\Endpoints\AccountEndpoints;
use Peerme\MxProviders\Api\Endpoints\BlockEndpoints;
use Peerme\MxProviders\Api\Endpoints\CollectionEndpoints;
use Peerme\MxProviders\Api\Endpoints\DexEndpoints;
use Peerme\MxProviders\Api\Endpoints\NetworkEndpoints;
use Peerme\MxProviders\Api\Endpoints\NftEndpoints;
use Peerme\MxProviders\Api\Endpoints\TokenEndpoints;
use Peerme\MxProviders\Api\Endpoints\TransactionEndpoints;
use Peerme\MxProviders\Api\Endpoints\VmEndpoints;

final class ApiNetworkProvider
{
    public function __construct(
        public readonly ClientInterface $client,
    ) {
    }

    public function accounts(): AccountEndpoints
    {
        return new AccountEndpoints($this->client);
    }

    public function network(): NetworkEndpoints
    {
        return new NetworkEndpoints($this->client);
    }

    public function blocks(): BlockEndpoints
    {
        return new BlockEndpoints($this->client);
    }

    public function collections(): CollectionEndpoints
    {
        return new CollectionEndpoints($this->client);
    }

    public function mex(): DexEndpoints
    {
        return new DexEndpoints($this->client);
    }

    public function nfts(): NftEndpoints
    {
        return new NftEndpoints($this->client);
    }

    public function tokens(): TokenEndpoints
    {
        return new TokenEndpoints($this->client);
    }

    public function transactions(): TransactionEndpoints
    {
        return new TransactionEndpoints($this->client);
    }

    public function vm(): VmEndpoints
    {
        return new VmEndpoints($this->client);
    }
}
