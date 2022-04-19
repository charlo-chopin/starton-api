<?php

namespace Starton;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    private Client $client;
    private string $apiKey;

    protected string $baseUrl = 'https://api.starton.io';

    /**
     * HttpClient constructor.
     * @param string $apiKey
     * @throws Exception
     */
    public function __construct(string $apiKey)
    {
        try {
            $this->client = new Client([
                'base_uri' => $this->baseUrl,
            ]);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        $this->apiKey = $apiKey;
    }

    private function headers(): array
    {
        return [
            'x-api-key' => $this->apiKey,
        ];
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws Exception
     */
    private function http(string $method, string $uri, array $data = []): ResponseInterface
    {
        $options = array_merge(['headers' => $this->headers()], ['json' => $data]);

        try {
            $response = $this->client->request($method, "/v2/$uri", $options);
        } catch (GuzzleException $guzzleException) {
            throw new Exception($guzzleException->getMessage());
        }

        return $response;
    }

    /**
     * @param string $uri
     * @return ResponseInterface
     * @throws Exception
     */
    public function get(string $uri): ResponseInterface
    {
        return $this->http('GET', $uri);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws Exception
     */
    public function post(string $uri, array $data): ResponseInterface
    {
        return $this->http('POST', $uri, $data);
    }

    /**
     * @param string $uri
     * @return ResponseInterface
     * @throws Exception
     */
    public function delete(string $uri): ResponseInterface
    {
        return $this->http('DELETE', $uri);
    }
}
