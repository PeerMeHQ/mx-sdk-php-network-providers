<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class Economics implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public int $totalSupply,
        public int $circulatingSupply,
        public int $staked,
        public float $price,
        public int $marketCap,
        public float $apr,
        public float $topUpApr,
        public float $baseApr,
    ) {
    }
}
