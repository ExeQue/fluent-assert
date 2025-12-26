<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Proxies\Concerns;

use ExeQue\FluentAssert\Assert;

/**
 * @internal
 */
trait ActsOnIterables
{
    private bool $isIterable = false;

    protected function isIterable(Assert $assert, string $message = ''): void
    {
        // @codeCoverageIgnoreStart
        if ($this->isIterable) {
            return;
        }
        // @codeCoverageIgnoreEnd

        $assert->isIterable($message);
        $this->isIterable = true;
    }
}
