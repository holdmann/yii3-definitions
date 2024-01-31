<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class Tree
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string|\Yiisoft\Definitions\Tests\Support\ColorInterface
     */
    public $color;
    /**
     * @param string|\Yiisoft\Definitions\Tests\Support\ColorInterface $color
     */
    public function __construct(string $name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
}
