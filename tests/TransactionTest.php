<?php

use PHPUnit\Framework\TestCase;
use Starton\Api\Relayer\Transaction\CreateParameters;
use Starton\Enums\Network;
use Starton\StartonConnect;

class TransactionTest extends TestCase
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
    public function canGetTransactions()
    {
        $transactions = $this->startonConnect->relayer->getTransactions();

        $this->assertIsArray($transactions);
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetTransaction()
    {
        $transaction = $this->startonConnect->relayer->getTransaction($_ENV['TRANSACTION_ID']);

        $this->assertIsString($transaction->getId());
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canCreateTransaction()
    {
        $value                      = "777";
        $createParameters           = new CreateParameters(
            Network::BINANCE_TESTNET,
            $_ENV['WALLET_ADDRESS'],
            $_ENV['SMART_CONTRACT_ADDRESS']
        );
        $createParameters->value    = $value;
        $createParameters->signerWallet = $_ENV['WALLET_ADDRESS'];
        $transaction                = $this
            ->startonConnect
            ->relayer
            ->createTransaction($createParameters);

        $this->assertEquals($value, $transaction->getValue());
    }
}