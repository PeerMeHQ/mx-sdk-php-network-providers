<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class DexPair implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $baseId,
        public float $basePrice,
        public string $baseSymbol,
        public string $baseName,
        public string $quoteId,
        public float $quotePrice,
        public string $quoteSymbol,
        public string $quoteName,
        public string $totalValue,
        public ?string $volume24h = null,
    ) {
    }
}
