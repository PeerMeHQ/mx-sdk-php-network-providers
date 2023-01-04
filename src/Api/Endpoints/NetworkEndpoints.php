<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Peerme\MxProviders\Entities\Economics;
use Peerme\MxProviders\Entities\NetworkConstants;

final class NetworkEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getEconomics(): Economics
    {
        return Economics::fromApiResponse(
            $this->client->request('GET', "/economics")
        );
    }

    public function getNetworkConstants(): NetworkConstants
    {
        return NetworkConstants::fromApiResponse(
            $this->client->request('GET', "/constants")
        );
    }
}
