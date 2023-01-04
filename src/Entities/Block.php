<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class Block implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $hash,
        public int $epoch,
        public int $nonce,
        public string $prevHash,
        public string $proposer,
        public string $pubKeyBitmap,
        public int $round,
        public int $shard,
        public int $size,
        public int $sizeTxs,
        public string $stateRootHash,
        public int $timestamp,
        public int $txCount,
        public int $gasConsumed,
        public int $gasRefunded,
        public int $gasPenalized,
        public int $maxGasLimit,
    ) {
    }
}
