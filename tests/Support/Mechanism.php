<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class Mechanism
{
    public EngineInterface $engine;
    /**
     * @var string|\Yiisoft\Definitions\Tests\Support\ColorInterface
     */
    public $color;
    /**
     * @param string|\Yiisoft\Definitions\Tests\Support\ColorInterface $color
     */
    public function __construct(EngineInterface $engine, $color)
    {
        $this->engine = $engine;
        $this->color = $color;
    }
}
