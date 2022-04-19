<?php


namespace Starton\Api\Relayer\Helpers;

use JMS\Serializer\Serializer;
use Starton\Api\Relayer\SmartContract\SmartContract;

trait SmartContractHelper
{
    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return SmartContract[]
     */
    public function deserializeSmartContracts(
        Serializer $serializer,
        string     $contents
    ): array
    {
        /** @var SmartContract[] $contracts */
        $contracts = [];
        /** @var object[] $jsonData */
        $jsonData = json_decode($contents)->items;

        foreach ($jsonData as $data) {
            // Receive params without keys.
            $params = [
                'name'              => $data->params[0],
                'symbol'            => $data->params[1],
                'initialSupply'     => $data->params[2]
            ];

            $data->params = $params;
            /** @var string $stringifyData */
            $stringifyData = json_encode($data);
            $contracts      [] = $this->deserializeSmartContract($serializer, $stringifyData);
        }

        return $contracts;
    }

    public function deserializeSmartContract(
        Serializer $serializer,
        string     $contents
    ): SmartContract
    {
        return $serializer->deserialize(
            $contents,
            SmartContract::class,
            'json',
        );
    }
}
