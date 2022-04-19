<?php


use PHPUnit\Framework\TestCase;
use Starton\Helpers\HttpStatusCodeHelper;
use Starton\StartonConnect;

class AuthenticationTest extends TestCase
{
    protected function setUp(): void
    {
        require_once('vendor/autoload.php');
        Dotenv\Dotenv::createImmutable(__DIR__)->load();
        parent::setUp();
    }

    /**
     * Check if the service can be instantiated
     * @group authentication
     * @test
     */
    public function canAuthenticate()
    {
        try {
            $startonConnect = new StartonConnect($_ENV['API_KEY']);
        } catch (Exception $exception) {
            $startonConnect = null;
        }

        $this->assertNotNull($startonConnect);
    }

    /**
     * Use the health endpoint to check if the
     * service can access api and if the api is up
     * @test
     * @group authentication
     * @throws Exception
     */
    public function canPingApi()
    {
        $startonConnect        = new StartonConnect($_ENV['API_KEY']);
        $responseLibrary       = $startonConnect->health();
        $responseRelayer       = $startonConnect->relayer->health();

        $this->assertEquals(HttpStatusCodeHelper::OK, $responseLibrary->getStatusCode());
        $this->assertEquals(HttpStatusCodeHelper::OK, $responseRelayer->getStatusCode());
    }
}
