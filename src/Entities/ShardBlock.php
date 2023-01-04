<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class ShardBlock implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $hash,
        public int $nonce,
        public int $round,
        public int $shard,
    ) {
    }
}
