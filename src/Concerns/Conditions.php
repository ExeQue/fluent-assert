<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Concerns;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Resolvers\Condition;

/**
 * @internal
 */
trait Conditions
{
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

    /**
     * @param string|int $key
     * @param callable(Assert, array-key): mixed $then
     * @param ?callable(Assert, array-key): mixed $otherwise
     */
    public function whenAt(string|int $key, callable $then, ?callable $otherwise = null): static
    {
        return $this->when(
            fn (Assert $assert) => $assert->any(
                fn (Assert $assert) => $assert->hasIndices()->keyExists($key),
                fn (Assert $assert) => $assert->object()->publicPropertyExists($key),
            ),
            fn (Assert $assert) => $assert->at($key, $then),
            fn (Assert $assert) => $otherwise($assert, $key)
        );
    }
}
