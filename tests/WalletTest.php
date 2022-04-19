<?php

use PHPUnit\Framework\TestCase;
use Starton\StartonConnect;

class WalletTest extends TestCase
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
    public function canGetWallets()
    {
        $wallets = $this->startonConnect->relayer->getAllWallet();

        $this->assertNotEmpty($wallets);
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetWalletAccess()
    {
        $address = $_ENV['WALLET_ADDRESS'];

        $wallet = $this->startonConnect->relayer->getWalletAccess($address);

        $this->assertEquals($address, $wallet->getAddress());
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetWalletBalance()
    {
        $address = $_ENV['WALLET_ADDRESS'];

        $balances = $this->startonConnect->relayer->getWalletAllBalance($address);

        $this->assertNotEmpty($balances);
    }
}
