<?php

namespace Starton\Api\Relayer\SmartContract;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class FromTemplateParameters
{
    public string $network;
    public string $signerWallet;
    public string $templateId;
    public array $params = [];
    public CustomGas|null $customGaz    = null;
    public string|null $name            = null;
    public string|null $description     = null;
    public string|null $gasLimit        = null;
    public string|null $speed           = null;

    public function __construct(
        string $templateId,
        string $network,
        string $signerWallet,
        array $other = []
    ) {
        $this->templateId = $templateId;
        $this->network = $network;
        $this->signerWallet = $signerWallet;

        foreach ($other as $key => $value) {
            $this->$key  = $value;
        }
    }

    public function getAll(): array
    {
        return [
            'network'           => $this->network,
            'name'              => $this->name,
            'description'       => $this->description,
            'params'            => $this->params,
            'signerWallet'      => $this->signerWallet,
            'templateId'        => $this->templateId,
            'gasLimit'          => $this->gasLimit,
            'speed'             => $this->speed,
            'customGaz'         => $this->customGaz?->getAll(),
        ];
    }
}