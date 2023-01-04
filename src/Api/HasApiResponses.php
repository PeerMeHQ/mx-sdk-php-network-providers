<?php

namespace Peerme\MxProviders\Api;

use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\IEntity;
use Peerme\MxProviders\Exceptions\RequestException;
use Psr\Http\Message\ResponseInterface;

trait HasApiResponses
{
    public array $rawResponse = [];

    public static function fromApiResponse(ResponseInterface $res, bool $isCollection = false): IEntity|Collection
    {
        static::throwIfError($res);

        $unpacked = json_decode($res->getBody()->getContents(), true);

        return $isCollection
            ? static::fromArrayMultiple($unpacked)
            : static::fromArray($unpacked);
    }

    public static function fromArray(array $data): IEntity
    {
        return new static(...static::filterUnallowedProperties(
            static::transformResponse($data)
        ));
    }

    public static function fromArrayMultiple(array $data): Collection
    {
        return (new Collection($data))
            ->map(fn ($item) => static::fromArray($item));
    }

    protected static function transformResponse(array $res): array
    {
        return $res;
    }

    protected static function filterUnallowedProperties(array $res): array
    {
        return (new Collection($res))
            ->intersectByKeys(get_class_vars(static::class))
            ->all();
    }

    private static function throwIfError(ResponseInterface $res): void
    {
        $status = (int) $res->getStatusCode();
        $isServerError = $status >= 500;
        $isClientError = $status >= 400 && $status < 500;

        if ($isServerError || $isClientError) {
            throw new RequestException($res);
        }
    }
}
