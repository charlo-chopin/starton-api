<?php

namespace Starton\Api\Relayer\Wallet;

use Starton\Enums\Network;

// 🚨 Necessary import
use JMS\Serializer\Annotation\Type;

class Wallet
{
    protected string $address;
    protected WalletCredentials $credentials;
    /**
     * @var Network[] $networks
     * @Type ("array<Starton\Enums\Network>")
     */
    protected array $networks;
    protected string|null $description;
    protected string|null $metadata;
    protected string $createdAt;
    protected string|null $updatedAt;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return object
     */
    public function getCredentials(): object
    {
        return $this->credentials;
    }

    /**
     * @param WalletCredentials $credentials
     */
    public function setCredentials(WalletCredentials $credentials): void
    {
        $this->credentials = $credentials;
    }

    /**
     * @return Network[]
     */
    public function getNetworks(): array
    {
        return $this->networks;
    }

    /**
     * @param Network[] $networks
     */
    public function setNetworks(array $networks): void
    {
        $this->networks = $networks;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getMetadata(): string
    {
        if (null === $this->metadata) {
            return "";
        }

        return $this->metadata;
    }

    /**
     * @param string $metadata
     */
    public function setMetadata(string $metadata): void
    {
        $this->metadata = $metadata;
    }
}