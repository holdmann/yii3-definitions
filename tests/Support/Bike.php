<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class Bike
{
    /**
     * @var string|\Yiisoft\Definitions\Tests\Support\ColorInterface
     */
    public $color;
    /**
     * @var \Yiisoft\Definitions\Tests\Support\EngineInterface
     */
    public $engine;
    /**
     * @param string|\Yiisoft\Definitions\Tests\Support\ColorInterface $color
     */
    public function __construct($color, EngineInterface $engine)
    {
        $this->color = $color;
        $this->engine = $engine;
    }
}
