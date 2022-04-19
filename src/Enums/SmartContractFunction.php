<?php

namespace Starton\Enums;

use MabeEnum\Enum;

class SmartContractFunction extends Enum
{
    const DEFAULT_ADMIN_ROLE        = "DEFAULT_ADMIN_ROLE";
    const MINTER_ROLE               = "MINTER_ROLE";
    const PAUSER_ROLE               = "PAUSER_ROLE";
    const ALLOWANCE                 = "allowance"; /* (address,address) */
    const APPROVE                   = "approve"; /* (address,uint256) */
    const BALANCE_OF                = "balanceOf"; /* (address) */
    const BURN                      = "burn"; /* (uint256) */
    const BURN_FROM                 = "burnFrom"; /* (address,uint256) */
    const DECIMALS                  = "decimals";
    const DECREASE_ALLOWANCE        = "decreaseAllowance"; /* (address,uint256) */
    const GET_ROLE_ADMIN            = "getRoleAdmin"; /* (bytes32) */
    const GRANT_ROLE                = "grantRole"; /* (bytes32,address) */
    const HAS_ROLE                  = "hasRole"; /* (bytes32,address) */
    const INCREASE_ALLOWANCE        = "increaseAllowance"; /* (address,uint256) */
    const MINT                      = "mint"; /* (address,uint256) */
    const NAME                      = "name";
    const PAUSE                     = "pause";
    const PAUSED                    = "paused";
    const RENOUNCE_ROLE             = "renounceRole(bytes32,address)";
    const REVOKE_ROLE               = "revokeRole"; /* (bytes32,address) */
    const SUPPORTS_INTERFACE        = "supportsInterface"; /* (bytes4) */
    const SYMBOL                    = "symbol";
    const TOTAL_SUPPLY              = "totalSupply";
    const TRANSFER                  = "transfer"; /* (address,uint256) */
    const TRANSFER_FROM             = "transferFrom"; /* (address,address,uint256) */
    const UNPAUSE                   = "unpause";
}