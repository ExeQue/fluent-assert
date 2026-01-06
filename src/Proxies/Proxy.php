<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Proxies;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Concerns\DocblockMixin;

abstract class Proxy
{
    use DocblockMixin;

    abstract public function __call(string $name, array $arguments): static;

    abstract public function back(): Assert;
}
