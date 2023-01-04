<?php

namespace Peerme\MxProviders\Entities;

use Illuminate\Support\Collection;
use Peerme\MxProviders\Api\HasApiResponses;
use Peerme\Mx\Address;

final class TransactionLogEvent implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public Address $address,
        public string $identifier,
        public Collection $topics,
        public ?string $data = null,
    ) {
    }

    protected static function transformResponse(array $res): array
    {
        return array_merge($res, [
            'address' => isset($res['address']) ? Address::fromBech32($res['address']) : null,
            'topics' => isset($res['topics']) ? collect($res['topics']) : [],
        ]);
    }
}
