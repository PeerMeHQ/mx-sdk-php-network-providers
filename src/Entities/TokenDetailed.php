<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;
use Peerme\Mx\Address;

final class TokenDetailed implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $identifier,
        public string $name,
        public string $ticker,
        public Address $owner,
        public int $decimals,
        public bool $isPaused,
        public ?TokenAssets $assets,
        public bool $canUpgrade,
        public bool $canMint,
        public bool $canBurn,
        public bool $canChangeOwner,
        public bool $canPause,
        public bool $canFreeze,
        public bool $canWipe,
        public string $supply,
        public ?string $minted = null,
        public ?string $burnt = null,
    ) {
    }

    public static function transformResponse(array $res): array
    {
        return array_merge($res, [
            'owner' => Address::fromBech32($res['owner']),
            'assets' => isset($res['assets']) ? TokenAssets::fromArray($res['assets']) : null,
        ]);
    }
}
