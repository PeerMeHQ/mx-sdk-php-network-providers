<?php

namespace Peerme\MxProviders\Entities;

use Illuminate\Support\Collection;
use Peerme\Mx\Address;
use Peerme\MxProviders\Api\HasApiResponses;
use Peerme\MxProviders\Entities\TokenAssets;

final class NftCollection implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public string $collection,
        public string $type,
        public string $name,
        public string $ticker,
        public Address $owner,
        public ?TokenAssets $assets,
        public bool $canFreeze = false,
        public bool $canWipe = false,
        public bool $canPause = false,
        public bool $canTransferNftCreateRole = false,
        /** @var \Peerme\MxProviders\Entities\CollectionRoles */
        public Collection $roles = new Collection,
    ) {
    }

    protected static function transformResponse(array $res): array
    {
        return array_merge($res, [
            'owner' => Address::fromBech32($res['owner']),
            'roles' => isset($res['roles']) ? CollectionRoles::fromArrayMultiple($res['roles']) : collect(),
            'assets' => isset($res['assets']) ? TokenAssets::fromArray($res['assets']) : null,
        ]);
    }
}
