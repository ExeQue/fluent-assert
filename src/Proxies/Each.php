<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Proxies;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use ExeQue\FluentAssert\Proxies\Concerns\ActsOnIterables;

class Each extends Proxy
{
    use ActsOnIterables;

    public function __construct(
        Assert $assert,
        string $message = ''
    ) {
        parent::__construct($assert);

        $this->isIterable($this->assert, $message);
    }

    public function __call(string $name, array $arguments): static
    {
        try {
            $counter = 0;
            foreach ($this->value() as $index => $item) {
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
}
