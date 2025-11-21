<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Concerns\Macroable;

it('can add custom macros', function () {
    $class = new class () {
        use Macroable;
    };

    $class::macro('testing', function (string $value) {
        return strtoupper($value);
    });

    expect($class->testing('hello world'))->toBe('HELLO WORLD');
});

it('injects $this into macro', function () {
    $class = new class () {
        use Macroable;

        public function getValue(): string
        {
            return 'fluent';
        }
    };
    $class::macro('greet', function (string $value) use ($class) {
        expect($class)->toBe($this);

        return 'Hello, ' . $value . '!';
    });

    expect($class->greet('fluent'))->toBe('Hello, fluent!');
});
