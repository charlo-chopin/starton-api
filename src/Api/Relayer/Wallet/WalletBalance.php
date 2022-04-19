<?php

namespace Starton\Api\Relayer\Wallet;

use Starton\Enums\Network;

class WalletBalance
{
    /*
     * Metadata
     */
    protected string $network;
    protected string $address;
    protected string $currencySymbol;

    /*
     * Balance
     */
    protected string $raw;
    protected string $formatted;
    protected string $hex;
    protected int $decimal;

    /**
     * @return string
     */
    public function getRaw(): string
    {
        return $this->raw;
    }

    /**
     * @param string $raw
     */
    public function setRaw(string $raw): void
    {
        $this->raw = $raw;
    }

    /**
     * @return string
     */
    public function getFormatted(): string
    {
        return $this->formatted;
    }

    /**
     * @param string $formatted
     */
    public function setFormatted(string $formatted): void
    {
        $this->formatted = $formatted;
    }

    /**
     * @return string
     */
    public function getHex(): string
    {
        return $this->hex;
    }

    /**
     * @param string $hex
     */
    public function setHex(string $hex): void
    {
        $this->hex = $hex;
    }

    /**
     * @return int
     */
    public function getDecimal(): int
    {
        return $this->decimal;
    }

    /**
     * @param int $decimal
     */
    public function setDecimal(int $decimal): void
    {
        $this->decimal = $decimal;
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
    public function getCurrencySymbol(): string
    {
        return $this->currencySymbol;
    }

    /**
     * @param string $currencySymbol
     */
    public function setCurrencySymbol(string $currencySymbol): void
    {
        $this->currencySymbol = $currencySymbol;
    }
}