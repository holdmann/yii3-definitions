<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests;

use Yiisoft\Definitions\Tests\Support\ColorInterface;
use Yiisoft\Definitions\Tests\Support\EngineInterface;

final class FunBike
{
    /**
     * @var string|\Yiisoft\Definitions\Tests\Support\ColorInterface
     */
    public $color;
    /**
     * @var string|\Yiisoft\Definitions\Tests\Support\EngineInterface
     */
    public $engine;
    /**
     * @param string|\Yiisoft\Definitions\Tests\Support\ColorInterface $color
     * @param string|\Yiisoft\Definitions\Tests\Support\EngineInterface $engine
     */
    public function __construct($color, $engine)
    {
        $this->color = $color;
        $this->engine = $engine;
    }
}
