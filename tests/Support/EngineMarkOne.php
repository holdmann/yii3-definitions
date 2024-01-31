<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class EngineMarkOne implements EngineInterface
{
    public const NAME = 'Mark One';
    /**
     * @var int
     */
    private $number = 0;

    public function __construct(int $number = 0)
    {
        $this->number = $number;
    }

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
