<?php

namespace Starton\Api\Relayer\SmartContract;


use Starton\Enums\Network;
use Starton\Enums\Status;

// 🚨 Necessary import
use JMS\Serializer\Annotation\Type;

class SmartContract {
    protected string $id;
    protected string $name;
    protected string|null $description = null;
    protected string $network;
    protected string $bytecode;
    protected string $compilerVersion;
    /**
     * @var array
     * @Type ("array<string>")
     */
    protected array $params;
    /**
     * @var array|null
     * @Type ("array<string>")
     */
    protected array|null $abi = null;
    protected string $source;
    protected string $projectId;
    protected string $address;
    protected string $signerWallet;
    protected string $creationHash;
    protected string $status;
    protected string $minedDate;
    protected int $blockNumber;
    protected string $createdAt;
    protected string $updatedAt;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): string|null
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(string|null $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /**
     * @param Network $network
     */
    public function setNetwork(Network $network): void
    {
        $this->network = $network;
    }

    /**
     * @return string
     */
    public function getBytecode(): string
    {
        return $this->bytecode;
    }

    /**
     * @param string $bytecode
     */
    public function setBytecode(string $bytecode): void
    {
        $this->bytecode = $bytecode;
    }

    /**
     * @return string
     */
    public function getCompilerVersion(): string
    {
        return $this->compilerVersion;
    }

    /**
     * @param string $compilerVersion
     */
    public function setCompilerVersion(string $compilerVersion): void
    {
        $this->compilerVersion = $compilerVersion;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @return array|null
     */
    public function getAbi(): array|null
    {
        return $this->abi;
    }

    /**
     * @param array|null $abi
     */
    public function setAbi(array|null $abi): void
    {
        $this->abi = $abi;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }

    /**
     * @param string $projectId
     */
    public function setProjectId(string $projectId): void
    {
        $this->projectId = $projectId;
    }

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
     * @return string
     */
    public function getSignerWallet(): string
    {
        return $this->signerWallet;
    }

    /**
     * @param string $signerWallet
     */
    public function setSignerWallet(string $signerWallet): void
    {
        $this->signerWallet = $signerWallet;
    }

    /**
     * @return string
     */
    public function getCreationHash(): string
    {
        return $this->creationHash;
    }

    /**
     * @param string $creationHash
     */
    public function setCreationHash(string $creationHash): void
    {
        $this->creationHash = $creationHash;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getMinedDate(): string
    {
        return $this->minedDate;
    }

    /**
     * @param string $minedDate
     */
    public function setMinedDate(string $minedDate): void
    {
        $this->minedDate = $minedDate;
    }

    /**
     * @return int
     */
    public function getBlockNumber(): int
    {
        return $this->blockNumber;
    }

    /**
     * @param int $blockNumber
     */
    public function setBlockNumber(int $blockNumber): void
    {
        $this->blockNumber = $blockNumber;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}