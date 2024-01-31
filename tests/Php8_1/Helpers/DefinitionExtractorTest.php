<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Php8_1\Helpers;

use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use Yiisoft\Definitions\Helpers\DefinitionExtractor;
use Yiisoft\Definitions\Tests\Support\Chair;
use Yiisoft\Definitions\Tests\Support\RedChair;
use Yiisoft\Test\Support\Container\SimpleContainer;

final class DefinitionExtractorTest extends TestCase
{
    public function testResolvableDependencyWithDefaultObject(): void
    {
        $container = new SimpleContainer([
            Chair::class => new Chair(),
        ]);

        $definitions = DefinitionExtractor::fromFunction(
            new ReflectionFunction(static function (Chair $chair = null) {
                $chair = $chair ?? new RedChair();
                return true;
            })
        );

        $this->assertInstanceOf(Chair::class, $definitions['chair']->resolve($container));
    }

    public function testResolvableNullableDependencyWithDefaultObject(): void
    {
        $container = new SimpleContainer([
            Chair::class => new Chair(),
        ]);

        $definitions = DefinitionExtractor::fromFunction(
            new ReflectionFunction(static function (?Chair $chair = null) {
                $chair = $chair ?? new RedChair();
                return true;
            })
        );

        $this->assertInstanceOf(Chair::class, $definitions['chair']->resolve($container));
    }

    public function testUnresolvableDependencyWithDefaultObject(): void
    {
        $container = new SimpleContainer();

        $definitions = DefinitionExtractor::fromFunction(
            new ReflectionFunction(static function (Chair $chair = null) {
                $chair = $chair ?? new RedChair();
                return true;
            })
        );

        $this->assertInstanceOf(RedChair::class, $definitions['chair']->resolve($container));
    }

    public function testUnresolvablNullableDependencyWithDefaultObject(): void
    {
        $container = new SimpleContainer();

        $definitions = DefinitionExtractor::fromFunction(
            new ReflectionFunction(static function (?Chair $chair = null) {
                $chair = $chair ?? new RedChair();
                return true;
            })
        );

        $this->assertInstanceOf(RedChair::class, $definitions['chair']->resolve($container));
    }
}
