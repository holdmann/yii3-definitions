<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UnionBuiltinDependency
{
    /**
     * @var string|int
     */
    private $value;
    /**
     * @param string|int $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
