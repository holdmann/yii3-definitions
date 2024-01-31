<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

/**
 * A gear box.
 */
final class GearBox
{
    /**
     * @var int
     */
    private $maxGear = 5;
    public function __construct(int $maxGear = 5)
    {
        $this->maxGear = $maxGear;
    }
}
