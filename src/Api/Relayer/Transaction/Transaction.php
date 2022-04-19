<?php

namespace Starton\Api\Relayer\Transaction;

use Starton\Enums\Network;
use Starton\Enums\Status;

class Transaction
{
    protected string $id;
    protected string|null $blockHash = null;
    protected int $blockNumber;
    protected int $chainId;
    protected string $data;
    protected string $from;
    protected string $gasLimit;
    protected string $gasPrice;
    protected string|null $maxFeePerGas = null;
    protected string|null $maxPriorityFeePerGas = null;
    protected string|null $metadata = null;
    protected string $network;
    protected int $nonce;
    protected int $type = 0;
    protected string $signerWallet;
    protected string $publishedDate;
    protected string $signedDate;
    protected string $minedDate;
    protected string $signedTransaction;
    protected string $status;
    protected string $to;
    protected string $transactionHash;
    protected string $value;
    protected string $projectId;
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
     * @return string|null
     */
    public function getBlockHash(): ?string
    {
        return $this->blockHash;
    }

    /**
     * @param string|null $blockHash
     */
    public function setBlockHash(?string $blockHash): void
    {
        $this->blockHash = $blockHash;
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
     * @return int
     */
    public function getChainId(): int
    {
        return $this->chainId;
    }

    /**
     * @param int $chainId
     */
    public function setChainId(int $chainId): void
    {
        $this->chainId = $chainId;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getGasLimit(): string
    {
        return $this->gasLimit;
    }

    /**
     * @param string $gasLimit
     */
    public function setGasLimit(string $gasLimit): void
    {
        $this->gasLimit = $gasLimit;
    }

    /**
     * @return string
     */
    public function getGasPrice(): string
    {
        return $this->gasPrice;
    }

    /**
     * @param string $gasPrice
     */
    public function setGasPrice(string $gasPrice): void
    {
        $this->gasPrice = $gasPrice;
    }

    /**
     * @return string|null
     */
    public function getMaxFeePerGas(): ?string
    {
        return $this->maxFeePerGas;
    }

    /**
     * @param string|null $maxFeePerGas
     */
    public function setMaxFeePerGas(?string $maxFeePerGas): void
    {
        $this->maxFeePerGas = $maxFeePerGas;
    }

    /**
     * @return string|null
     */
    public function getMaxPriorityFeePerGas(): ?string
    {
        return $this->maxPriorityFeePerGas;
    }

    /**
     * @param string|null $maxPriorityFeePerGas
     */
    public function setMaxPriorityFeePerGas(?string $maxPriorityFeePerGas): void
    {
        $this->maxPriorityFeePerGas = $maxPriorityFeePerGas;
    }

    /**
     * @return string|null
     */
    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * @param string|null $metadata
     */
    public function setMetadata(?string $metadata): void
    {
        $this->metadata = $metadata;
    }

    /**
     * @return string
     */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /**
     * @param string $network
     */
    public function setNetwork(string $network): void
    {
        $this->network = $network;
    }

    /**
     * @return int
     */
    public function getNonce(): int
    {
        return $this->nonce;
    }

    /**
     * @param int $nonce
     */
    public function setNonce(int $nonce): void
    {
        $this->nonce = $nonce;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
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
    public function getPublishedDate(): string
    {
        return $this->publishedDate;
    }

    /**
     * @param string $publishedDate
     */
    public function setPublishedDate(string $publishedDate): void
    {
        $this->publishedDate = $publishedDate;
    }

    /**
     * @return string
     */
    public function getSignedDate(): string
    {
        return $this->signedDate;
    }

    /**
     * @param string $signedDate
     */
    public function setSignedDate(string $signedDate): void
    {
        $this->signedDate = $signedDate;
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
     * @return string
     */
    public function getSignedTransaction(): string
    {
        return $this->signedTransaction;
    }

    /**
     * @param string $signedTransaction
     */
    public function setSignedTransaction(string $signedTransaction): void
    {
        $this->signedTransaction = $signedTransaction;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getTransactionHash(): string
    {
        return $this->transactionHash;
    }

    /**
     * @param string $transactionHash
     */
    public function setTransactionHash(string $transactionHash): void
    {
        $this->transactionHash = $transactionHash;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
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
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
}