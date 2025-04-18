<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UnionOptionalDependency
{
    /**
     * @var string|\Yiisoft\Definitions\Tests\Support\ColorInterface
     */
    private $value = 'test';
    /**
     * @param string|\Yiisoft\Definitions\Tests\Support\ColorInterface $value
     */
    public function __construct($value = 'test')
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
