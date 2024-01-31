<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UnionOptionalDependency
{
    private $value = null;
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
