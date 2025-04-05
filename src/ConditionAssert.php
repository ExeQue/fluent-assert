<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert;

/**
 * @internal
 */
class ConditionAssert extends Assert
{
    public function wasUsed(): bool
    {
        return $this->used;
    }

    public static function fromAssert(Assert $assert): static
    {
        return new static($assert->value());
    }
}
