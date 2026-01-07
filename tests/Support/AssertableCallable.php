<?php

declare(strict_types=1);

namespace Tests\Support;

use Closure;

class AssertableCallable
{
    private bool $executed = false;

    private int $executions = 0;
    private ?int $expectedExecutions = null;

    private mixed $return = null;

    private ?array $args     = null;
    private bool   $expected = true;

    private function __construct(
        private readonly string $message = '',
    ) {
    }

    public static function shouldNotBeCalled(string $message = ''): static
    {
        return self::shouldBeCalled(message: $message)->never();
    }

    public static function shouldBeCalled(?callable $callback = null, string $message = ''): static
    {
        $callable = new static($message);

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

    public function times(int $times): static
    {
        $this->expectedExecutions = $times;

        if ($times <= 0) {
            $this->expected = false;
        }

        return $this;
    }

    public function never(): static
    {
        return $this->times(0);
    }

    public function once(): static
    {
        return $this->times(1);
    }

    public function seeing(array ...$args): static
    {
        $this->times(count($args));

        $this->args = $args;

        return $this;
    }

    public function __invoke(): mixed
    {
        $this->executed = true;
        $this->executions++;

        if ($this->args !== null) {
            $expectedArgs = $this->args[$this->executions - 1] ?? null;

            expect(func_get_args())->toEqual(
                $expectedArgs,
                'Callable was called with unexpected arguments.',
            );
        }

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
            false => 'Expected callable not to be called, but it was called %s times',
        };

        expect($this->executed)->toBe(
            $this->expected,
            sprintf($message, $this->executions),
        );

        if ($this->expectedExecutions !== null) {
            $message = $this->message ?: 'Expected callable to be called %s times, but it was only called %s times.';

            expect($this->executions)->toBe(
                $this->expectedExecutions,
                sprintf($message, $this->expectedExecutions, $this->executions),
            );
        }
    }
}
