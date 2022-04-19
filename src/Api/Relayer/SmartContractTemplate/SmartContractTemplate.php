<?php

namespace Starton\Api\Relayer\SmartContractTemplate;

use Starton\Enums\BlockChain;

// 🚨 Necessary import
use JMS\Serializer\Annotation\Type;

class SmartContractTemplate
{
    protected string $id;
    protected string $name;
    protected string|null $description = null;

    /**
     * @var SmartContractTemplateTag[]
     * @Type ("array<Starton\Api\Relayer\SmartContractTemplate\SmartContractTemplateTag>")
     */
    protected array $tags;
    protected string $byteCode;
    /**
     * @var BlockChain[] $blockChains
     * @Type ("array<Starton\Enums\BlockChain>")
     */
    protected array $blockChains;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getByteCode(): string
    {
        return $this->byteCode;
    }

    /**
     * @param string|null $byteCode
     * @return void
     */
    public function setByteCode(string $byteCode = null): void
    {
        $this->byteCode = $byteCode;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param SmartContractTemplateTag[] $tags
     * @return void
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return BlockChain[]
     */
    public function getBlockChains(): array
    {
        return $this->blockChains;
    }

    /**
     * @param BlockChain[] $blockChains
     * @return void
     */
    public function setBlockChains(array $blockChains): void
    {
        $this->blockChains = $blockChains;
    }
}
