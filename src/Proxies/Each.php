<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Proxies;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

class Each extends Proxy
{
    private iterable $values;

    public function __construct(
        private Assert $base,
        string $message = ''
    ) {
        $this->base->isIterable($message);

        $this->values = $this->base->value();
    }

    public function __call(string $name, array $arguments): static
    {
        $this->ensureAssertMethodIsCovered($name);

        try {
            $counter = 0;
            foreach ($this->values as $index => $item) {
                Assert::that($item)->{$name}(...$arguments);
                $counter++;
            }
        } catch (InvalidArgumentException $exception) {
            throw new IndexedInvalidArgumentException(
                index: is_scalar($index) ? $index : $counter,
                message: $exception->getMessage(),
                previous: $exception,
            );
        }

        return $this;
    }

    public function back(): Assert
    {
        return $this->base;
    }
}
