<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

final class CollectionRoles implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public bool $canTransferRole = false,
        public bool $canCreate = false,
        public bool $canBurn = false,
    ) {
    }
}
