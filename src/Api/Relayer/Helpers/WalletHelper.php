<?php


namespace Starton\Api\Relayer\Helpers;

use JMS\Serializer\Serializer;
use Starton\Api\Relayer\Wallet\Wallet;
use Starton\Api\Relayer\Wallet\WalletBalance;

trait WalletHelper
{
    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return Wallet[]
     */
    public function deserializeWallets(
        Serializer $serializer,
        string     $contents
    ): array {
        /** @var Wallet[] $wallets */
        $wallets = [];
        /** @var object[] $jsonData */
        $jsonData = json_decode($contents)->items;

        foreach ($jsonData as $data) {
            /** @var string $stringifyData */
            $stringifyData = json_encode($data);
            $wallets    [] = $this->deserializeWallet($serializer, $stringifyData);
        }

        return $wallets;
    }

    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return Wallet
     */
    public function deserializeWallet(
        Serializer $serializer,
        string     $contents
    ): Wallet {
        return $serializer->deserialize(
            $contents,
            Wallet::class,
            'json',
        );
    }

    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return WalletBalance[]
     */
    public function deserializeBalances(
        Serializer $serializer,
        string     $contents
    ): array {
        /** @var WalletBalance[] $balances */
        $balances = [];
        /** @var object[] $jsonData */
        $jsonData = json_decode($contents);

        foreach ($jsonData as $data) {
            $balances [] = $this->deserializeBalance($serializer, $data);
        }

        return $balances;
    }

    /**
     * @param Serializer $serializer
     * @param object $contents
     * @return WalletBalance
     */
    public function deserializeBalance(
        Serializer $serializer,
        object     $contents
    ): WalletBalance {
        $contents->balance->network         = $contents->network;
        $contents->balance->address         = $contents->address;
        $contents->balance->currencySymbol  = $contents->currencySymbol;

        /** @var string $stringifyData */
        $stringifyData = json_encode($contents->balance);

        return $serializer->deserialize(
            $stringifyData,
            WalletBalance::class,
            'json',
        );
    }
}