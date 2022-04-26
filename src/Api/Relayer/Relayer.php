<?php

namespace Starton\Api\Relayer;

use Exception;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Starton\Api\Relayer\Helpers\SmartContractHelper;
use Starton\Api\Relayer\Helpers\SmartContractTemplateHelper;
use Starton\Api\Relayer\Helpers\TransactionHelper;
use Starton\Api\Relayer\Helpers\WalletHelper;
use Starton\Api\Relayer\SmartContract\CallParameters;
use Starton\Api\Relayer\SmartContract\FromTemplateParameters;
use Starton\Api\Relayer\SmartContract\SmartContract;
use Starton\Api\Relayer\SmartContractTemplate\SmartContractTemplate;
use Starton\Api\Relayer\SmartContractTemplate\SmartContractTemplateTag;
use Starton\Api\Relayer\Transaction\CreateParameters;
use Starton\Api\Relayer\Transaction\Transaction;
use Starton\Api\Relayer\Wallet\Wallet;
use Starton\Api\Relayer\Wallet\WalletBalance;
use Starton\Api\Relayer\Wallet\WalletCredentials;
use Starton\Enums\Network;
use Starton\Helpers\HttpStatusCodeHelper;
use Starton\HttpClient;

class Relayer
{
    use SmartContractTemplateHelper;
    use SmartContractHelper;
    use WalletHelper;
    use TransactionHelper;

    private HttpClient $httpClient;
    private Serializer $serializer;

    public function __construct(
        HttpClient $httpClient,
        Serializer $serializer
    ) {
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    /**
     * @return ResponseInterface
     * @throws Exception
     */
    public function health():ResponseInterface
    {
        return $this->httpClient->get('/relayer/health');
    }

    /**
     * @return SmartContractTemplate[]
     * @throws Exception
     */
    public function getAllSmartContractTemplate(): array
    {
        $response = $this->httpClient->get('smart-contract-template');
        return $this->deserializeSmartContractTemplates(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @Param string $id
     * @return SmartContractTemplate
     * @throws Exception
     */
    public function getSmartContractTemplate(string $id): SmartContractTemplate
    {
        $response = $this->httpClient->get("smart-contract-template/$id");

        return $this->deserializeSmartContractTemplate(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }


    /**
     * @throws Exception
     */
    public function getAllSmartContractTemplateTag(): array
    {
        $response = $this->httpClient->get('smart-contract-template-tag');

        return $this->deserializeSmartContractTags(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @throws Exception
     */
    public function getSmartContractTemplateTag(string $id): SmartContractTemplateTag
    {
        $response = $this->httpClient->get("smart-contract-template-tag/$id");

        return $this->deserializeSmartContractTag(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @return SmartContract[]
     * @throws Exception
     */
    public function getAllSmartContract(): array
    {
        $response = $this->httpClient->get('smart-contract');

        return $this->deserializeSmartContracts(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @Param string $id
     * @return SmartContract
     * @throws Exception
     */
    public function getSmartContract(string $id): SmartContract
    {
        $response = $this->httpClient->get("smart-contract/$id");

        return $this->deserializeSmartContract(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @Param FromTemplateParameters $data
     * @return SmartContract
     * @throws Exception
     */
    public function createSmartContractFromTemplate(
        FromTemplateParameters $parameters
    ): SmartContract {
        $response = $this->httpClient->post('smart-contract/from-template', $parameters->getAll());

        return $this->deserializeSmartContract(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @test
     * @return Wallet[] array
     * @throws Exception
     */
    public function getAllWallet(): array
    {
        $response = $this->httpClient->get('wallet');

        return $this->deserializeWallets(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @test
     * @param string $address
     * @return Wallet
     * @throws Exception
     */
    public function getWalletAccess(string $address): Wallet
    {
        $response = $this->httpClient->get("wallet/$address");

        return $this->deserializeWallet(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @param WalletCredentials $credentials
     * @param string|null $description
     * @param string|null $metadata
     * @return Wallet
     * @throws Exception
     */
    public function createWalletAccess(
        WalletCredentials $credentials,
        string $description = null,
        string $metadata = null
    ): Wallet {
        $response = $this->httpClient->post('wallet', [
            'description'   => $description,
            'metadata'      => $metadata,
            'credentials'   => [
                'keyId'             => $credentials->getKeyId(),
                'accessKeyId'       => $credentials->getAccessKeyId(),
                'secretAccessKey'   => $credentials->getSecretAccessKey(),
                'region'            => $credentials->getRegion()
            ],
        ]);

        return $this->deserializeWallet(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @param string $address
     * @param bool $deleteOnKms
     * @return bool
     * @throws Exception
     */
    public function deleteWalletAccess(string $address, bool $deleteOnKms): bool
    {
        $response = $this->httpClient->delete("wallet/$address", [
            'deleteOnKms' => $deleteOnKms
        ]);

        return $response->getStatusCode() === HttpStatusCodeHelper::OK;
    }

    /**
     * @param string $address
     * @return bool
     * @throws Exception
     */
    public function walletSignMessage(string $address): bool
    {
        $response = $this->httpClient->post("wallet/$address/sign-message", []);

        return $response->getStatusCode() === HttpStatusCodeHelper::OK;
    }

    /**
     * @param string $address
     * @return WalletBalance[]
     * @throws Exception
     */
    public function getWalletAllBalance(string $address): array
    {
        $response = $this->httpClient->get("/wallet/$address/balance");

        return $this->deserializeBalances(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @param string $address
     * @param Network $network
     * @return WalletBalance
     * @throws Exception
     */
    public function getWalletBalanceByNetwork(
        string $address,
        Network $network
    ): WalletBalance {
        $response = $this->httpClient->get("/wallet/$address/$network/balance");

        return $this->deserializeBalance(
            $this->serializer,
            json_decode($response->getBody()->getContents())
        );
    }

    /**
     * @param string $address
     * @param Network $network
     * @return WalletBalance
     * @throws Exception
     */
    public function getWalletErc20BalanceByNetwork(
        string $address,
        Network $network
    ): WalletBalance {
        $response = $this->httpClient->get("/wallet/$address/$network/erc20-balance");

        return $this->deserializeBalance(
            $this->serializer,
            json_decode($response->getBody()->getContents())
        );
    }

    /**
     * @param string $network
     * @param string $address
     * @param CallParameters $callParameters
     * @param bool $read
     * @return ResponseInterface
     * @throws Exception
     */
    public function smartContractInteract(
        string $network,
        string $address,
        CallParameters $callParameters,
        bool $read = true
    ): ResponseInterface
    {
        $type = $read ? 'read' : 'call';

        return $this->httpClient->post(
            "/smart-contract/$network/$address/$type",
            $callParameters->getAll()
        );
    }

    /**
     * @param string $network
     * @param string $address
     * @return array
     * @throws Exception
     */
    public function getSmartContractAvailableFunctions(
        string $network,
        string $address
    ): array {
        return json_decode(
            $this->httpClient
                ->get("/smart-contract/$network/$address/available-functions")
                ->getBody()
        );
    }

    /**
     * @return Transaction[]
     * @throws Exception
     */
    public function getTransactions(): array
    {
        $response = $this->httpClient->get('transaction');

        return $this->deserializeTransactions(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @param string $transactionId
     * @return Transaction
     * @throws Exception
     */
    public function getTransaction(string $transactionId): Transaction
    {
        $response = $this->httpClient->get("transaction/$transactionId");

        return $this->deserializeTransaction(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }

    /**
     * @param CreateParameters $createParameters
     * @return Transaction
     * @throws Exception
     */
    public function createTransaction(CreateParameters $createParameters): Transaction
    {
        $response = $this->httpClient->post('transaction', $createParameters->getAll());

        return $this->deserializeTransaction(
            $this->serializer,
            $response->getBody()->getContents()
        );
    }
}