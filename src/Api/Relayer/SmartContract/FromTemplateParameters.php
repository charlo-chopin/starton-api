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

    /**
     * @param bool $initializedOnly
     * @return array
     */
    public function getAll(bool $initializedOnly = false): array
    {
        $data = [
            'network'           => $this->network,
            'name'              => $this->name,
            'description'       => $this->description,
            'params'            => $this->params,
            'signerWallet'      => $this->signerWallet,
            'templateId'        => $this->templateId,
            'speed'             => $this->speed,
        ];

        if ($initializedOnly) {
            if ($this->gasLimit) {
                $data['gasLimit'] = $this->gasLimit;
            }
            if ($this->customGaz) {
                $data['customGaz'] = $this->customGaz?->getAll();
            }
        } else {
            $data['gasLimit'] = $this->gasLimit;
            $data['customGaz'] = $this->customGaz?->getAll();
        }

        return $data;
    }
}