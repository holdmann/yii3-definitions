<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UnionCar
{
    /**
     * @var \Yiisoft\Definitions\Tests\Support\NonExistingEngine|\Yiisoft\Definitions\Tests\Support\EngineMarkOne|\Yiisoft\Definitions\Tests\Support\EngineMarkTwo
     */
    private $engine;
    /**
     * @param \Yiisoft\Definitions\Tests\Support\NonExistingEngine|\Yiisoft\Definitions\Tests\Support\EngineMarkOne|\Yiisoft\Definitions\Tests\Support\EngineMarkTwo $engine
     */
    public function __construct($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return \Yiisoft\Definitions\Tests\Support\NonExistingEngine|\Yiisoft\Definitions\Tests\Support\EngineMarkOne|\Yiisoft\Definitions\Tests\Support\EngineMarkTwo
     */
    public function getEngine()
    {
        return $this->engine;
    }

    public function getEngineName(): string
    {
        return $this->engine->getName();
    }
}
