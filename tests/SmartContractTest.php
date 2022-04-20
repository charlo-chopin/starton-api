<?php

use PHPUnit\Framework\TestCase;
use Starton\Api\Relayer\SmartContract\CallParameters;
use Starton\Enums\Network;
use Starton\Enums\SmartContractFunction;
use Starton\Helpers\HttpStatusCodeHelper;
use Starton\StartonConnect;

class SmartContractTest extends TestCase
{
    protected StartonConnect $startonConnect;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        require_once('vendor/autoload.php');
        Dotenv\Dotenv::createImmutable(__DIR__)->load();
        $this->startonConnect = new StartonConnect($_ENV['API_KEY']);

        parent::setUp();
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetAllSmartContract()
    {
        $contracts = $this->startonConnect->relayer->getAllSmartContract();

        $this->assertIsArray($contracts);
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function canInteractWithSmartContractRead()
    {
        $smartContractParameters    = new CallParameters(SmartContractFunction::TOTAL_SUPPLY);
        $network                    = Network::BINANCE_TESTNET;
        $address                    = $_ENV['SMART_CONTRACT_ADDRESS'];

        $response = $this->startonConnect->relayer->smartContractInteract(
            $network,
            $address,
            $smartContractParameters
        );

        $this->assertEquals(HttpStatusCodeHelper::CREATED, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function canInteractWithSmartContractCall()
    {
        $smartContractParameters    = new CallParameters(SmartContractFunction::TRANSFER);
        $network                    = Network::BINANCE_TESTNET;
        $amount                     = (string)(1 * pow(10, 18));

        $smartContractParameters->signerWallet = $_ENV['WALLET_ADDRESS'];
        $smartContractParameters->params = [
            $_ENV['WALLET_ADDRESS_EXTERNAL'],
            $amount,
        ];

        $response = $this->startonConnect->relayer->smartContractInteract(
            $network,
            $_ENV['SMART_CONTRACT_ADDRESS'],
            $smartContractParameters,
            false
        );

        $this->assertEquals(HttpStatusCodeHelper::CREATED, $response->getStatusCode());
    }

    /**
     * @test
     * @throws Exception
     */
    public function canGetAvailableFunctions()
    {
        $network                    = Network::BINANCE_TESTNET;
        $address                    = $_ENV['SMART_CONTRACT_ADDRESS'];
        $availableFunctions         = $this->startonConnect->relayer->getSmartContractAvailableFunctions(
            $network,
            $address
        );

        $this->assertIsArray($availableFunctions);
    }
}
