<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('can fulfill a condition', function () {

    Assert::for('hello')
        ->fulfills(fn (string $value) => $value === 'hello')
        ->fulfills(fn (string $value) => strlen($value) === 5);

    $this->expectNotToPerformAssertions();
});

it('fails if condition is not fulfilled', function () {
    expect(
        fn () => Assert::for('hello')
        ->fulfills(fn (string $value) => $value === 'world', 'Value is not "world"'),
    )->toThrow(InvalidArgumentException::class, 'Value is not "world"');
});

it('fails if a sub assertion is not fulfilled', function () {
    expect(
        fn () => Assert::for('hello')
        ->fulfills(function (string $value) {
            Assert::for($value)->same('world', 'Value is not "world"');

            return true;
        }),
    )->toThrow(InvalidArgumentException::class, 'Value is not "world"');
});
