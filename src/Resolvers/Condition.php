<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Resolvers;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\ConditionAssert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

readonly class Condition
{
    public function __construct(
        private mixed $condition,
        private Assert $assert,
    ) {
    }

    public static function for(
        mixed $condition,
        Assert $assert,
    ): static {
        return new static($condition, $assert);
    }

    public function eval(): bool
    {
        if (is_callable($this->condition)) {
            $assert = ConditionAssert::fromAssert($this->assert);

            try {
                $result = ($this->condition)($assert);

                if ($result === $assert) {
                    if ($assert->wasUsed()) {
                        return true;
                    }

                    if ($assert->wasUsed() === false) {
                        return false;
                    }
                }

                if ($result === null && $assert->wasUsed()) {
                    return true;
                }

                return (bool)$result;
            } catch (InvalidArgumentException) {
                return false;
            }
        }

        return (bool)$this->condition;
    }
}
