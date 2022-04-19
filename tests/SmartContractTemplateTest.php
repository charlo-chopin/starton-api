<?php

use PHPUnit\Framework\TestCase;
use Starton\StartonConnect;

class SmartContractTemplateTest extends TestCase
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
    public function canGetAllSmartContractTemplate()
    {
        $templates = $this->startonConnect->relayer->getAllSmartContractTemplate();

        $this->assertIsArray($templates);
        $this->assertNotEmpty($templates);
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetSmartContractTemplate()
    {
        // First get all contracts
        $templates = $this->startonConnect->relayer->getAllSmartContractTemplate();
        $id        = $templates[0]->getId();

        // Then retrieve one by ID
        $template = $this->startonConnect->relayer->getSmartContractTemplate($id);

        $this->assertEquals($id, $template->getId());
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetAllSmartContractTemplateTag()
    {
        $tags = $this->startonConnect->relayer->getAllSmartContractTemplateTag();

        $this->assertIsArray($tags);
        $this->assertNotEmpty($tags);
    }

    /**
     * @test
     * @group Relayer
     * @throws Exception
     */
    public function canGetSmartContractTemplateTag()
    {
        // First get all contracts
        $tags = $this->startonConnect->relayer->getAllSmartContractTemplateTag();
        $id   = $tags[0]->getId();

        // Then retrieve one by ID
        $tag = $this->startonConnect->relayer->getSmartContractTemplateTag($id);

        $this->assertEquals($id, $tag->getId());
    }
}
