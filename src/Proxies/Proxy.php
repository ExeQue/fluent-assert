<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Proxies;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Concerns\DocblockMixin;

abstract class Proxy
{
    use DocblockMixin;

    public function __construct(
        protected Assert $assert,
    ) {
    }

    abstract public function __call(string $name, array $arguments): static;

    final public function value(): mixed
    {
        return $this->assert->value();
    }
}
