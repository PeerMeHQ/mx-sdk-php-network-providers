<?php

namespace Peerme\MxProviders;

use Peerme\MxProviders\Api\ApiNetworkProvider;

class NetworkProvider
{
    public static function api(string $baseUrl): ApiNetworkProvider
    {
        $client = ClientFactory::create($baseUrl);

        return new ApiNetworkProvider($client);
    }
}
