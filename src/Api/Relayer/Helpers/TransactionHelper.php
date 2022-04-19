<?php

namespace Starton\Api\Relayer\Helpers;

use JMS\Serializer\Serializer;
use Starton\Api\Relayer\Transaction\Transaction;

trait TransactionHelper
{
    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return Transaction[]
     */
    public function deserializeTransactions(
        Serializer $serializer,
        string     $contents
    ): array {
        /** @var Transaction[] $transactions */
        $transactions = [];
        /** @var object[] $jsonData */
        $jsonData = json_decode($contents)->items;

        foreach ($jsonData as $data) {
            /** @var string $stringifyData */
            $stringifyData   = json_encode($data);
            $transactions [] = $this->deserializeTransaction($serializer, $stringifyData);
        }

        return $transactions;
    }

    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return Transaction
     */
    public function deserializeTransaction(
        Serializer $serializer,
        string     $contents
    ): Transaction {
        return $serializer->deserialize(
            $contents,
            Transaction::class,
            'json',
        );
    }

}