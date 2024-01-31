<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support\DefinitionStorage;

final class ServiceWithNonResolvableUnionTypes
{
    /**
     * @param \Yiisoft\Definitions\Tests\Support\DefinitionStorage\ServiceWithNonExistingDependency|\Yiisoft\Definitions\Tests\Support\DefinitionStorage\ServiceWithPrivateConstructor $class
     */
    public function __construct($class)
    {
    }
}
