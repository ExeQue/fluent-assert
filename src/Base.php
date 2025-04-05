<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert;

use ArrayAccess;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
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
}
