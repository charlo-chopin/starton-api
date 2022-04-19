<?php

namespace Starton\Api\Relayer\SmartContract;

use JetBrains\PhpStorm\ArrayShape;

class CustomGas
{
    public string $gasPrice;
    public string $maxFeePerGas;
    public string $maxPriorityFeePerGas;

    #[ArrayShape(['gasPrice' => "string", 'maxFeePerGas' => "string", 'maxPriorityFeePerGas' => "string"])]
    public function getAll(): array
    {
        return [
            'gasPrice'              => $this->gasPrice,
            'maxFeePerGas'          => $this->maxFeePerGas,
            'maxPriorityFeePerGas'  => $this->maxPriorityFeePerGas,
        ];
    }
}