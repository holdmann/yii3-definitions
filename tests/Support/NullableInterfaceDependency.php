<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class NullableInterfaceDependency
{
    /**
     * @var \Yiisoft\Definitions\Tests\Support\EngineInterface|null
     */
    private $engine;
    public function __construct(?EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function getEngine(): ?EngineInterface
    {
        return $this->engine;
    }
}
