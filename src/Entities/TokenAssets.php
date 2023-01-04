<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class TokenAssets implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $description,
        public string $status,
        public string $pngUrl,
        public string $svgUrl,
        public ?string $website = null,
    ) {
    }
}
