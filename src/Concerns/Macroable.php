<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Concerns;

use BadMethodCallException;

/**
 * @internal
 * @codeCoverageIgnore
 */
trait Macroable
{
    private static array $macros = [];

    public static function macro(string $name, callable $assertion): void
    {
        static::$macros[$name] = $assertion;
    }

    public function __call(string $name, array $arguments)
    {
        $macros = static::$macros;

        if (isset($macros[$name]) && is_callable($macros[$name])) {
            $callback = ($macros[$name])(...);

            return $callback->bindTo($this)(...$arguments) ?? $this;
        }

        $class = static::class;

        throw new BadMethodCallException("Call to undefined method $class::$name()");
    }
}
