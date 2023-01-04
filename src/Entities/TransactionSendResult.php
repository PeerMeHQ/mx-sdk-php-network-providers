<?php

namespace Peerme\MxProviders\Entities;

use Peerme\MxProviders\Api\HasApiResponses;
use Peerme\Mx\Address;

final class TransactionSendResult implements IEntity
{
    use HasApiResponses;

    public function __construct(
        public Address $receiver,
        public int $receiverShard,
        public Address $sender,
        public int $senderShard,
        public string $status,
        public string $txHash,
    ) {
    }

    protected static function transformResponse(array $res): array
    {
        return array_merge($res, [
            'receiver' => Address::fromBech32($res['receiver']),
            'sender' => Address::fromBech32($res['sender']),
        ]);
    }
}
