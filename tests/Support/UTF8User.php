<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class UTF8User
{
    /**
     * @var string
     */
    public $айди;
    /**
     * @var string
     */
    private $имя;

    public function установитьИмя(string $v): void
    {
        $this->имя = $v;
    }
}
