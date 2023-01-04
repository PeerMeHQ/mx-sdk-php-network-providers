<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class MexToken implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $id,
        public string $symbol,
        public string $name,
        public float $price,
    ) {
    }
}
