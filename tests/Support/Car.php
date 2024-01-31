<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class Car
{
    /**
     * @var \Yiisoft\Definitions\Tests\Support\ColorInterface|null
     */
    public $color;
    /**
     * @var \Yiisoft\Definitions\Tests\Support\EngineInterface
     */
    private $engine;
    /**
     * @var mixed[]
     */
    private $moreEngines = [];

    public function __construct(EngineInterface $engine, array $moreEngines = [])
    {
        $this->engine = $engine;
        $this->moreEngines = $moreEngines;
    }

    public function getEngine(): EngineInterface
    {
        return $this->engine;
    }

    public function getEngineName(): string
    {
        return $this->engine->getName();
    }

    public function setColor(ColorInterface $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getColor(): ?ColorInterface
    {
        return $this->color;
    }

    public function getMoreEngines(): array
    {
        return $this->moreEngines;
    }
}
