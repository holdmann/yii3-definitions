<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class EngineMarkTwo implements EngineInterface
{
    public const NAME = 'Mark Two';

    /**
     * @var int
     */
    private $number;

    public function getName(): string
    {
        return self::NAME;
    }

    public function setNumber(int $value): void
    {
        $this->number = $value;
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}
