<?php

namespace Peerme\MxProviders\Entities;

use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

interface IEntity
{
    public static function fromApiResponse(ResponseInterface $res, bool $isCollection = false): IEntity|Collection;
}
