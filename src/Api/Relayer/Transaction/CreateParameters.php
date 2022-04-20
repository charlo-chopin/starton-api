<?php

namespace Starton\Api\Relayer\Transaction;

use Starton\Api\Relayer\SmartContract\CustomGas;

class CreateParameters
{
    public int $chainId;
    public string $data;
    public string $speed;
    public string $from;
    public string $to;
    public string $network;
    public CustomGas|null $customGas = null;
    public string|null $gasLimit = null;
    public string|null $signerWallet = null;
    public int|null $nonce = null;
    public string|null $value = null;
    public string|null $metadata = null;

    public function __construct(
        string $network,
        string $from,
        string $to
    ) {
        $this->speed        = 'low';
        $this->from         = $from;
        $this->to           = $to;
        $this->network      = $network;
        $this->value        = '0';
    }

    public function getAll(): array
    {
        return [];
    }
}