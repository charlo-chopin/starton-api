<?php


namespace Starton;

use Exception;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\ResponseInterface;
use Starton\Api\Relayer\Relayer;

class StartonConnect
{
    private HttpClient $httpClient;
    private Serializer $serializer;

    public Relayer $relayer;

    /**
     * StartonConnect constructor.
     * @param string $apiKey
     * @throws Exception
     */
    public function __construct(string $apiKey)
    {
        $this->httpClient   = new HttpClient($apiKey);
        $this->serializer   = SerializerBuilder::create()->build();
        $this->relayer      = new Relayer($this->httpClient, $this->serializer);
    }

    /**
     * @return ResponseInterface
     * @throws Exception
     */
    public function health(): ResponseInterface
    {
        return $this->httpClient->get('/library/health');
    }
}
