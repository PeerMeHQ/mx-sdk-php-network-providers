<?php

namespace Peerme\MxProviders\Entities;

use Peerme\Mx\Address;
use Peerme\MxProviders\Api\HasApiResponses;

final class TokenAddressRoles implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public Address $address,
        public array $roles = [],
    ) {
    }

    public static function transformResponse(array $res): array
    {
        return array_merge($res, [
            'address' => Address::fromBech32($res['address']),
        ]);
    }
}
