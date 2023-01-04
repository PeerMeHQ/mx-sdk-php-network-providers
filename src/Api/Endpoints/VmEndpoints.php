<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Peerme\Mx\Utils\Encoder;
use Peerme\MxProviders\Entities\VmHexResult;
use Peerme\MxProviders\Entities\VmIntResult;
use Peerme\MxProviders\Entities\VmQueryResult;
use Peerme\MxProviders\Entities\VmStringResult;

class VmEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function query(string $contractAddress, string $func, array $args = [], array $params = []): VmQueryResult
    {
        return VmQueryResult::fromApiResponse(
            $this->client->request('POST', "/vm-values/query", [
                'scAddress' => $contractAddress,
                'funcName' => $func,
                'args' => collect($args)->map(fn ($a) => Encoder::toHex($a))->all(),
                ...$params,
            ], unwrapData: true)
        );
    }

    public function hex(string $contractAddress, string $func, array $args = [], array $params = []): VmHexResult
    {
        return VmHexResult::fromApiResponse(
            $this->client->request('POST', "/vm-values/hex", [
                'scAddress' => $contractAddress,
                'funcName' => $func,
                'args' => collect($args)->map(fn ($a) => Encoder::toHex($a))->all(),
                ...$params,
            ], unwrapData: true)
        );
    }

    public function string(string $contractAddress, string $func, array $args = [], array $params = []): VmStringResult
    {
        return VmStringResult::fromApiResponse(
            $this->client->request('POST', "/vm-values/string", [
                'scAddress' => $contractAddress,
                'funcName' => $func,
                'args' => collect($args)->map(fn ($a) => Encoder::toHex($a))->all(),
                ...$params,
            ], unwrapData: true)
        );
    }

    public function int(string $contractAddress, string $func, array $args = [], array $params = []): VmIntResult
    {
        return VmIntResult::fromApiResponse(
            $this->client->request('POST', "/vm-values/int", [
                'scAddress' => $contractAddress,
                'funcName' => $func,
                'args' => collect($args)->map(fn ($a) => Encoder::toHex($a))->all(),
                ...$params,
            ], unwrapData: true)
        );
    }
}
