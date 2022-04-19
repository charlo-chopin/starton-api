<?php

namespace Starton\Api\Relayer\Helpers;

use JMS\Serializer\Serializer;
use Starton\Api\Relayer\SmartContractTemplate\SmartContractTemplate;
use Starton\Api\Relayer\SmartContractTemplate\SmartContractTemplateTag;

trait SmartContractTemplateHelper {
    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return SmartContractTemplate[]
     */
    public function deserializeSmartContractTemplates(
        Serializer $serializer,
        string $contents
    ): array {
        /** @var SmartContractTemplate[] $contracts */
        $contracts  = [];
        /** @var object[] $jsonData */
        $jsonData   = json_decode($contents)->items;

        foreach ($jsonData as $data) {
            /** @var string $stringifyData */
            $stringifyData  = json_encode($data);
            $contracts      []= $this->deserializeSmartContractTemplate($serializer, $stringifyData);
        }

        return $contracts;
    }

    public function deserializeSmartContractTemplate(
        Serializer $serializer,
        string $contents
    ): SmartContractTemplate {
        return $serializer->deserialize(
            $contents,
            SmartContractTemplate::class,
            'json',
        );
    }

    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return SmartContractTemplateTag[]
     */
    public function deserializeSmartContractTags(
        Serializer $serializer,
        string $contents
    ): array {
        /** @var SmartContractTemplate[] $contracts */
        $contracts  = [];
        /** @var object[] $jsonData */
        $jsonData   = json_decode($contents)->items;

        foreach ($jsonData as $data) {
            /** @var string $stringifyData */
            $stringifyData  = json_encode($data);
            $contracts      []= $this->deserializeSmartContractTemplate($serializer, $stringifyData);
        }

        return $contracts;
    }

    /**
     * @param Serializer $serializer
     * @param string $contents
     * @return SmartContractTemplateTag
     */
    public function deserializeSmartContractTag(
        Serializer $serializer,
        string $contents
    ): SmartContractTemplateTag {
        return $serializer->deserialize(
            $contents,
            SmartContractTemplateTag::class,
            'json',
        );
    }
}
