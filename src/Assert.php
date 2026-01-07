<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert;

use ArrayAccess;
use ExeQue\FluentAssert\Concerns\Conditions;
use ExeQue\FluentAssert\Concerns\Macroable;
use ExeQue\FluentAssert\Concerns\Mixin;
use ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use ExeQue\FluentAssert\Proxies\Each;
use ExeQue\FluentAssert\Proxies\Not;
use ExeQue\FluentAssert\Resolvers\ExceptionMessage;
use ExeQue\FluentAssert\Support\KeyIterator;
use ReflectionProperty;

/**
 * @template TValue of mixed
 */
class Assert
{
    use Mixin;
    use Macroable;
    use Conditions;

    protected bool $used = false;

    /**
     * @param TValue $value
     */
    public function __construct(
        private readonly mixed $value,
    ) {
    }

    /**
     * @param TValue $value
     *
     * @return self<TValue>
     *
     * @deprecated Use Assert::that() instead.
     * @codeCoverageIgnore
     */
    public static function for(mixed $value): static
    {
        return new static($value);
    }

    /**
     * @param TValue $value
     *
     * @return self<TValue>
     */
    public static function that(mixed $value): static
    {
        return new static($value);
    }

    /**
     * @return TValue
     */
    public function value(): mixed
    {
        return $this->value;
    }

    public function each(string $message = ''): Each
    {
        $this->used = true;

        $this->isIterable($message);

        return new Each($this->duplicate(), $message);
    }

    /**
     * @param callable(self $value, array-key $key): mixed $callback
     * @return $this
     */
    public function forEach(callable $callback): static
    {
        $this->used = true;

        $this->isIterable();

        foreach ($this->value as $key => $item) {
            try {
                $callback(self::that($item), $key);
            } catch (InvalidArgumentException $exception) {
                throw new IndexedInvalidArgumentException(
                    index: $key,
                    message: $exception->getMessage(),
                    previous: $exception,
                );
            }
        }

        return $this;
    }

    public function keys(string $message = ''): Each
    {
        $this->used = true;

        return new Each(self::that(new KeyIterator($this->value)), $message);
    }

    /**
     * @param callable(self $keys, int $index): mixed $callback
     * @return $this
     */
    public function forKeys(callable $callback): static
    {
        $this->used = true;

        $this->isIterable();

        $iterator = new KeyIterator($this->value);

        foreach ($iterator as $index => $key) {
            try {
                $callback(self::that($key), $index);
            } catch (InvalidArgumentException $exception) {
                throw new IndexedInvalidArgumentException(
                    index: $key,
                    message: $exception->getMessage(),
                    previous: $exception,
                );
            }
        }

        return $this;
    }

    /**
     * @param callable(Assert, array-key|null): mixed $callback
     */
    public function at(string|int|callable $index, callable $callback, string $message = ''): static
    {
        $this->used = true;

        $usingCallable = false;
        if (is_string($index) || is_int($index)) {
            if (is_array($this->value) || $this->value instanceof ArrayAccess) {
                $this->keyExists($index, $message);
                $value = $this->value[$index];
            } else {
                $this->publicPropertyExists($index, $message);

                $property = new ReflectionProperty($this->value(), $index);

                $value = $property->getValue($this->value());
            }

            $assert = self::that($value);
        } else {
            $assert = self::that($index($this->value));
            $usingCallable = true;
        }
        try {
            $callback($assert, $usingCallable === false ? $index : null);
        } catch (InvalidArgumentException $exception) {
            throw new IndexedInvalidArgumentException(
                index: $index,
                message: $exception->getMessage(),
                previous: $exception,
            );
        }

        return $this;
    }

    /**
     * @param array<callable(Assert, array-key|null): mixed> $map
     * @param string $message
     * @return $this
     */
    public function atMany(array $map, string $message = ''): static
    {
        $this->used = true;

        Base::allIsCallable($map);

        foreach ($map as $index => $callback) {
            $this->at($index, $callback, $message);
        }

        return $this;
    }

    /**
     * @param array<callable(Assert): mixed> $callbacks
     */
    public function or(callable ...$callbacks): static
    {
        $this->used = true;

        $exceptions = [];

        foreach ($callbacks as $callback) {
            try {
                $callback($this->duplicate());

                return $this;
            } catch (InvalidArgumentException $exception) {
                $exceptions[] = $exception;
            }
        }

        throw new BulkInvalidArgumentException(
            $exceptions,
            ExceptionMessage::for(...$exceptions)->join(', ', ', or '),
        );
    }

    /**
     * @param array<callable(Assert): mixed> $callbacks
     */
    public function any(callable ...$callbacks): static
    {
        return $this->or(...$callbacks);
    }

    /**
     * @param array<callable(Assert): mixed> $callbacks
     */
    public function and(callable ...$callbacks): static
    {
        $this->used = true;

        $exceptions = [];

        foreach ($callbacks as $callback) {
            try {
                $callback($this->duplicate());
            } catch (InvalidArgumentException $exception) {
                $exceptions[] = $exception;
            }
        }

        if ($exceptions !== []) {
            throw new BulkInvalidArgumentException(
                $exceptions,
                ExceptionMessage::for(...$exceptions)->join(', ', ', and '),
            );
        }

        return $this;
    }

    /**
     * @param array<callable(Assert): mixed> $callbacks
     */
    public function all(callable ...$callbacks): static
    {
        return $this->and(...$callbacks);
    }

    public function not(string $message = ''): Not
    {
        $this->used = true;

        return new Not($this->duplicate(), $message);
    }

    public function nullOr(callable $callback): static
    {
        $this->used = true;

        Base::nullOr($this->value, function () use ($callback) {
            $callback($this->duplicate());
        });

        return $this;
    }

    public function duplicate(): static
    {
        return new static($this->value);
    }
}
