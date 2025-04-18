<?php

declare(strict_types=1);

namespace Yiisoft\Definitions;

use Psr\Container\ContainerInterface;
use Yiisoft\Definitions\Contract\ReferenceInterface;
use Yiisoft\Definitions\Exception\InvalidConfigException;

use function is_string;

/**
 * The `Reference` defines a dependency to a service in the container or factory in another service definition.
 * For example:
 *
 * ```php
 * [
 *    InterfaceA::class => ConcreteA::class,
 *    'alternativeForA' => ConcreteB::class,
 *    MyService::class => [
 *        '__construct()' => [
 *            Reference::to('alternativeForA'),
 *        ],
 *    ],
 * ]
 * ```
 */
final class Reference implements ReferenceInterface
{
    /**
     * @readonly
     */
    private bool $optional;
    private string $id;

    /**
     * @throws InvalidConfigException
     * @param mixed $id
     */
    private function __construct(
        $id,
        bool $optional
    ) {
        $this->optional = $optional;
        if (!is_string($id)) {
            throw new InvalidConfigException('Reference ID must be string.');
        }

        $this->id = $id;
    }

    /**
     * @throws InvalidConfigException If ID is not string.
     * @param mixed $id
     */
    public static function to($id): self
    {
        return new self($id, false);
    }

    /**
     * Optional reference returns `null` when there is no corresponding definition in container.
     *
     * @param mixed $id ID of the service or object to point to.
     *
     * @throws InvalidConfigException If ID is not string.
     */
    public static function optional($id): self
    {
        return new self($id, true);
    }

    /**
     * @return mixed
     */
    public function resolve(ContainerInterface $container)
    {
        return (!$this->optional || $container->has($this->id)) ? $container->get($this->id) : null;
    }
}
