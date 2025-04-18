<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class Notebook
{
    /**
     * @var \NotExist1|\NotExist2
     */
    public $notExist;
    /**
     * @param \NotExist1|\NotExist2 $notExist
     */
    public function __construct($notExist)
    {
        $this->notExist = $notExist;
    }
}
