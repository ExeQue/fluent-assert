<?php

declare(strict_types=1);

namespace Tests\Support;

use Closure;

class AssertableCallable
{
    private bool $executed = false;

    private mixed $return = null;

    private function __construct(
        private readonly bool $expected = false,
        private readonly string $message = '',
    ) {
    }

    public static function shouldNotBeCalled(string $message = ''): static
    {
        return new static(false, $message);
    }

    public static function shouldBeCalled(?callable $callback = null, string $message = ''): static
    {
        $callable = new static(true, $message);

        if ($callback !== null) {
            $callable->using($callback);
        }

        return $callable;
    }

    public function using(mixed $returns): static
    {
        $this->return = $returns;

        return $this;
    }

    public function __invoke(): mixed
    {
        $this->executed = true;

        if (is_callable($this->return)) {
            return ($this->return)(...func_get_args());
        }

        return $this->return;
    }

    public function asClosure(): Closure
    {
        return $this(...);
    }

    public function __destruct()
    {
        $message = $this->message ?: match ($this->expected) {
            true  => 'Expected callable to be called, but it was not.',
            false => 'Expected callable not to be called, but it was.',
        };

        expect($this->executed)->toBe(
            $this->expected,
            $message,
        );
    }
}
