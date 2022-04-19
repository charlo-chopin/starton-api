<?php

namespace Starton\Api\Relayer\SmartContract;

class CallParameters
{
    /* SmartContractFunction */
    public string $functionName;

    public array $params;
    public string $speed;
    public CustomGas|null $customGas = null;
    public string|null $gasLimit = null;
    public string|null $signerWallet = null;
    public int|null $nonce = 0;
    public string|null $value = null;

    public function __construct(string $functionName, array $params = [])
    {
        $this->functionName = $functionName;
        $this->params       = $params;
        $this->speed        = 'low';
    }

    public function getAll(): array
    {
        return [
            'functionName' => $this->functionName,
            'params' => $this->params,
            'speed' => $this->speed,
            'customGas' => $this->customGas,
            'gasLimit' => $this->gasLimit,
            'signerWallet' => $this->signerWallet,
            'nonce' => $this->nonce,
            'value' => $this->value
        ];
    }
}