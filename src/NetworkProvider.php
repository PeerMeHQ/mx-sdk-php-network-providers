<?php

namespace Peerme\MxProviders;

use GuzzleHttp\ClientInterface;
use Peerme\MxProviders\Api\ApiNetworkProvider;

class NetworkProvider
{
    public static function api(string $baseUrl, ?ClientInterface $client = null): ApiNetworkProvider
    {
        return new ApiNetworkProvider(
            $client ?? ClientFactory::create($baseUrl),
        );
    }
}
