<?php

namespace Starton\Enums;

use MabeEnum\Enum;

class Network extends Enum
{
    /**
     * ETHEREUM
     */
    const ETHEREUM              = 'ethereum-mainnet';
    const ETHEREUM_ROPSTEN      = 'ethereum-ropsten';
    const ETHEREUM_GOERLI       = 'ethereum-goerli';

    /**
     * BINANCE
     */
    const BINANCE               = 'binance-mainnet';
    const BINANCE_TESTNET       = 'binance-testnet';

    /**
     * POLYGON
     */
    const POLYGON               = 'polygon-mainnet';
    const POLYGON_MUMBAI        = 'polygon-mumbai';

    /**
     * AVALANCHE
     */
    const AVALANCHE             = 'avalanche-mainnet';
    const AVALANCHE_FUJI        = 'avalanche-fuji';
}