<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Proxies;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

class Not extends Proxy
{
    public function __construct(
        Assert $assert,
        private string $message = ''
    ) {
        parent::__construct($assert);
    }

    public function __call(string $name, array $arguments): static
    {
        try {
            $this->assert->{$name}(...$arguments);
        } catch (InvalidArgumentException) {
            return $this;
        }

        throw new InvalidArgumentException($this->message ?: 'Did not fail expectation.');
    }
}
