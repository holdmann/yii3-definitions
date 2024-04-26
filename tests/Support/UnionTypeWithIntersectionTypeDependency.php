<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UnionTypeWithIntersectionTypeDependency
{
    /**
     * @var \Yiisoft\Definitions\Tests\Support\Bike|\Yiisoft\Definitions\Tests\Support\GearBox&\Yiisoft\Definitions\Tests\Support\stdClass|\Yiisoft\Definitions\Tests\Support\Chair
     */
    public $dependency;
    /**
     * @param \Yiisoft\Definitions\Tests\Support\Bike|\Yiisoft\Definitions\Tests\Support\GearBox&\Yiisoft\Definitions\Tests\Support\stdClass|\Yiisoft\Definitions\Tests\Support\Chair $dependency
     */
    public function __construct($dependency)
    {
        $this->dependency = $dependency;
    }
}
