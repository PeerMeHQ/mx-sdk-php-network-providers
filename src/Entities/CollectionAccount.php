<?php

namespace Peerme\MxProviders\Entities;

use Brick\Math\BigInteger;
use Peerme\Mx\Address;
use Peerme\MxProviders\Api\HasApiResponses;

final class CollectionAccount implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public Address $address,
        public BigInteger $balance,
    ) {
    }

    public static function transformResponse(array $res): array
    {
        return array_merge($res, [
            'address' => Address::fromBech32($res['address']),
            'balance' => BigInteger::of($res['balance'] ?? 1),
        ]);
    }
}
