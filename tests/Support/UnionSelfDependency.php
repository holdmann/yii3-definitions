<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UnionSelfDependency
{
    /**
     * @param $this|\Yiisoft\Definitions\Tests\Support\ColorInterface $a
     */
    public function __construct($a)
    {
    }
}
