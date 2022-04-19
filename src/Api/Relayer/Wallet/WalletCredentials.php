<?php

namespace Starton\Api\Relayer\Wallet;

class WalletCredentials
{
    protected string $keyId;
    protected string $accessKeyId;
    protected string $secretAccessKey;
    protected string $region;

    public function __construct(
        string $keyId,
        string $accessKeyId,
        string $secretAccessKey,
        string $region
    ) {
        $this->keyId            = $keyId;
        $this->accessKeyId      = $accessKeyId;
        $this->secretAccessKey  = $secretAccessKey;
        $this->region           = $region;
    }

    /**
     * @return string
     */
    public function getKeyId(): string
    {
        return $this->keyId;
    }

    /**
     * @param string $keyId
     */
    public function setKeyId(string $keyId): void
    {
        $this->keyId = $keyId;
    }

    /**
     * @return string
     */
    public function getAccessKeyId(): string
    {
        return $this->accessKeyId;
    }

    /**
     * @param string $accessKeyId
     */
    public function setAccessKeyId(string $accessKeyId): void
    {
        $this->accessKeyId = $accessKeyId;
    }

    /**
     * @return string
     */
    public function getSecretAccessKey(): string
    {
        return $this->secretAccessKey;
    }

    /**
     * @param string $secretAccessKey
     */
    public function setSecretAccessKey(string $secretAccessKey): void
    {
        $this->secretAccessKey = $secretAccessKey;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }
}