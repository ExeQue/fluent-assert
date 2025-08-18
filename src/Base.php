<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert;

use ArrayAccess;
use BackedEnum;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use ReflectionClass;
use ReflectionProperty;
use UnitEnum;
use Webmozart\Assert\Assert as WebmozartAssert;

/**
 * @internal
 */
class Base extends WebmozartAssert
{
    protected static function reportInvalidArgument($message): void
    {
        throw new InvalidArgumentException($message);
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     */
    public static function hasIndices(mixed $value, string $message = ''): void
    {
        if (is_array($value) === false && $value instanceof ArrayAccess === false) {
            static::reportInvalidArgument(
                sprintf(
                    $message ?: 'Expected an array or ArrayAccess. Got %s',
                    static::typeToString($value),
                ),
            );
        }
    }

    /**
     * @param array  $array
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     */
    public static function arrayContains(array $array, mixed $value, string $message = ''): void
    {
        self::inArray($value, $array, $message);
    }

    /**
     * @param mixed  $value
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public static function type(mixed $value, string $type, string $message = ''): void
    {
        if ($type === 'resource' && is_resource($value)) {
            return;
        }

        if (get_debug_type($value) !== $type) {
            static::reportInvalidArgument(
                sprintf(
                    $message ?: 'Expected type %s. Got %s',
                    $type,
                    static::typeToString($value),
                ),
            );
        }
    }

    private static function propertyAssert($value, string $name, string $message, callable $callback): void
    {
        self::propertyExists($value, $name, $message);

        $callback((new ReflectionClass($value))->getProperty($name));
    }

    /**
     * @param string|object $value
     * @param string $name
     * @param string $message
     */
    public static function publicPropertyExists($value, string $name, string $message = ''): void
    {
        self::propertyAssert($value, $name, $message, function (ReflectionProperty $property) {
            if ($property->isPublic() === false) {
                static::reportInvalidArgument(
                    sprintf(
                        'Expected public property %s on %s.',
                        $property->getName(),
                        $property->getDeclaringClass()->getName(),
                    ),
                );
            }
        });
    }

    /**
     * @param string|object $value
     * @param string $name
     * @param string $message
     */
    public static function protectedPropertyExists($value, string $name, string $message = ''): void
    {
        self::propertyAssert($value, $name, $message, function (ReflectionProperty $property) {
            if ($property->isProtected() === false) {
                static::reportInvalidArgument(
                    sprintf(
                        'Expected protected property %s on %s.',
                        $property->getName(),
                        $property->getDeclaringClass()->getName(),
                    ),
                );
            }
        });
    }

    /**
     * @param string|object $value
     * @param string $name
     * @param string $message
     */
    public static function privatePropertyExists($value, string $name, string $message = ''): void
    {
        self::propertyAssert($value, $name, $message, function (ReflectionProperty $property) {
            if ($property->isPrivate() === false) {
                static::reportInvalidArgument(
                    sprintf(
                        'Expected private property %s on %s.',
                        $property->getName(),
                        $property->getDeclaringClass()->getName(),
                    ),
                );
            }
        });
    }

    /**
     * @param string|object $value
     * @param string $name
     * @param string $message
     */
    public static function staticPropertyExists($value, string $name, string $message = ''): void
    {
        self::propertyAssert($value, $name, $message, function (ReflectionProperty $property) {
            if ($property->isStatic() === false) {
                static::reportInvalidArgument(
                    sprintf(
                        'Expected static property %s on %s.',
                        $property->getName(),
                        $property->getDeclaringClass()->getName(),
                    ),
                );
            }
        });
    }

    /**
     * @param string|object $value
     * @param string $name
     * @param string $message
     */
    public static function instancedPropertyExists($value, string $name, string $message = ''): void
    {
        self::propertyAssert($value, $name, $message, function (ReflectionProperty $property) {
            if ($property->isStatic()) {
                static::reportInvalidArgument(
                    sprintf(
                        'Expected instanced property %s on %s.',
                        $property->getName(),
                        $property->getDeclaringClass()->getName(),
                    ),
                );
            }
        });
    }

    /**
     * @param string $value
     * @param class-string<UnitEnum> $enumClass
     * @param string $message
     * @return void
     */
    public static function enumCaseExists($value, string $enumClass, string $message = ''): void
    {
        static::implementsInterface(
            $enumClass,
            UnitEnum::class,
            'Expected enum class to implement UnitEnum interface.'
        );

        $names = array_map(fn (UnitEnum $enum) => $enum->name, $enumClass::cases());

        if (!in_array($value, $names, true)) {
            static::reportInvalidArgument(
                sprintf(
                    $message ?: 'Expected value to be one of %s. Got %s',
                    implode(', ', $names),
                    static::typeToString($value),
                ),
            );
        }
    }

    /**
     * @param string $value
     * @param class-string<BackedEnum> $enumClass
     * @param string $message
     * @return void
     */
    public static function enumValueExists($value, string $enumClass, string $message = ''): void
    {
        static::implementsInterface(
            $enumClass,
            BackedEnum::class,
            'Expected enum class to implement BackedEnum interface.'
        );

        $values = array_map(fn (BackedEnum $enum) => $enum->value, $enumClass::cases());

        if (!in_array($value, $values, true)) {
            static::reportInvalidArgument(
                sprintf(
                    $message ?: 'Expected value to be one of %s. Got %s',
                    implode(', ', $values),
                    static::typeToString($value),
                ),
            );
        }
    }

    /**
     * @param mixed $value
     * @param callable $callback
     * @return void
     */
    public static function nullOr($value, callable $callback): void
    {
        if ($value === null) {
            return;
        }

        $callback($value);
    }
}
