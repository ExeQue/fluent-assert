<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert;

use ArrayAccess;
use ExeQue\FluentAssert\Concerns\Macroable;
use ExeQue\FluentAssert\Concerns\Mixin;
use ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use ExeQue\FluentAssert\Proxies\Each;
use ExeQue\FluentAssert\Proxies\Not;
use ExeQue\FluentAssert\Resolvers\Condition;
use ExeQue\FluentAssert\Resolvers\ExceptionMessage;
use ExeQue\FluentAssert\Support\KeyIterator;

/**
 * @template TValue of mixed
 */
class Assert
{
    use Mixin;
    use Macroable;

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

        return new Each($this->duplicate(), $message);
    }

    public function keys(string $message = ''): Each
    {
        $this->used = true;

        return new Each(self::that(new KeyIterator($this->value)), $message);
    }

    /**
     * @param callable(Assert, string|int|null): mixed $callback
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
                $value = $this->value->{$index};
            }

            $assert = self::for($value);
        } else {
            $assert = self::for($index($this->value));
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
                ExceptionMessage::for(...$exceptions)->join(', ', ', or '),
            );
        }

        return $this;
    }

    public function when(mixed $condition, callable $then, ?callable $otherwise = null): static
    {
        $this->used = true;

        $condition = Condition::for($condition, $this);

        if ($condition->eval() !== false) {
            $then($this->duplicate());
        } elseif ($otherwise !== null) {
            $otherwise($this->duplicate());
        }

        return $this;
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
