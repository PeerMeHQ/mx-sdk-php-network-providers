<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;

class VmResultBase implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public $data,
    ) {
    }
}
