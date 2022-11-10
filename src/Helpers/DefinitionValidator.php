<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Helpers;

use Yiisoft\Definitions\ArrayDefinition;
use Yiisoft\Definitions\Contract\DefinitionInterface;
use Yiisoft\Definitions\Contract\ReferenceInterface;
use Yiisoft\Definitions\Exception\InvalidConfigException;

use function is_array;
use function is_callable;
use function is_object;
use function is_string;

/**
 * Definition validator checks if definition is valid.
 */
final class DefinitionValidator
{
    /**
     * Validates that definition is valid. Throws exception otherwise.
     *
     * @param mixed $definition Definition to validate.
     *
     * @throws InvalidConfigException If definition is not valid.
     */
    public static function validate(mixed $definition, ?string $id = null): void
    {
        // Reference or ready object
        if (is_object($definition) && self::isValidObject($definition)) {
            return;
        }

        // Class
        if (is_string($definition) && $definition !== '') {
            return;
        }

        // Callable definition
        if ($definition !== '' && is_callable($definition, true)) {
            return;
        }

        // Array definition
        if (is_array($definition)) {
            self::validateArrayDefinition($definition, $id);
            return;
        }

        throw new InvalidConfigException(
            'Invalid definition: '
            . ($definition === '' ? 'empty string.' : var_export($definition, true))
        );
    }

    /**
     * Validates that array definition is valid. Throws exception otherwise.
     *
     * @param array $definition Array definition to validate.
     *
     * @throws InvalidConfigException If definition is not valid.
     */
    public static function validateArrayDefinition(array $definition, ?string $id = null): void
    {
        $className = $definition[ArrayDefinition::CLASS_NAME] ?? $id ?? throw new InvalidConfigException(
            'Invalid definition: no class name specified.'
        );
        self::validateClassName($className);

        foreach ($definition as $key => $value) {
            if (!is_string($key)) {
                throw new InvalidConfigException(
                    sprintf(
                        'Invalid definition: invalid key in array definition. Allow only string keys, got %d.',
                        $key,
                    ),
                );
            }

            // Class
            if ($key === ArrayDefinition::CLASS_NAME) {
                continue;
            }

            // Constructor arguments
            if ($key === ArrayDefinition::CONSTRUCTOR) {
                if (!is_array($value)) {
                    throw new InvalidConfigException(
                        sprintf(
                            'Invalid definition: incorrect constructor arguments. Expected array, got %s.',
                            get_debug_type($value)
                        )
                    );
                }
                /** @var mixed $argument */
                foreach ($value as $argument) {
                    if (is_object($argument) && !self::isValidObject($argument)) {
                        throw new InvalidConfigException(
                            'Only references are allowed in constructor arguments, a definition object was provided: ' .
                            var_export($argument, true)
                        );
                    }
                }
                continue;
            }

            // Methods and properties
            if (str_ends_with($key, '()')) {
                /**
                 * Regular expression from https://www.php.net/manual/en/functions.user-defined.php
                 */
                if (!preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*\(\)$/', $key)) {
                    throw new InvalidConfigException(
                        sprintf(
                            'Invalid definition: incorrect method name. Got "%s".',
                            $key
                        )
                    );
                }
                if (!is_array($value)) {
                    throw new InvalidConfigException(
                        sprintf(
                            'Invalid definition: incorrect method "%s" arguments. Expected array, got "%s". '.
                            'Probably you should wrap them into square brackets.',
                            $key,
                            get_debug_type($value),
                        )
                    );
                }
                continue;
            }
            if (str_starts_with($key, '$')) {
                continue;
            }

            self::throwInvalidArrayDefinitionKey($key);
        }
    }

    /**
     * @throws InvalidConfigException
     */
    private static function throwInvalidArrayDefinitionKey(string $key): void
    {
        $preparedKey = trim(strtr($key, [
            '()' => '',
            '$' => '',
        ]));

        if ($preparedKey === '' || !preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $preparedKey)) {
            throw new InvalidConfigException(
                sprintf('Invalid definition: key "%s" is not allowed.', $key)
            );
        }

        throw new InvalidConfigException(
            sprintf(
                'Invalid definition: key "%s" is not allowed. Did you mean "%s()" or "$%s"?',
                $key,
                $preparedKey,
                $preparedKey
            )
        );
    }

    /**
     * Deny `DefinitionInterface`, exclude `ReferenceInterface`
     */
    private static function isValidObject(object $value): bool
    {
        return !($value instanceof DefinitionInterface) || $value instanceof ReferenceInterface;
    }

    private static function validateClassName(mixed $class): void
    {
        if ($class === '' || !is_string($class)) {
            throw new InvalidConfigException(
                sprintf(
                    'Invalid definition: class name must be a non-empty string, got "%s".',
                    get_debug_type($class),
                )
            );
        }
        if (!class_exists($class)) {
            throw new InvalidConfigException(
                sprintf(
                    'Invalid definition: invalid class name "%s". Class must exist.',
                    $class,
                ),
            );
        }
    }
}
