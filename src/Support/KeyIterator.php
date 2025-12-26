<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Support;

use IteratorAggregate;
use Traversable;

/**
 * @internal
 */
class KeyIterator implements IteratorAggregate
{
    public function __construct(
        private iterable $iterable,
    ) {
    }

    public function getIterator(): Traversable
    {
        foreach ($this->iterable as $key => $item) {
            yield $key;
        }
    }
}
