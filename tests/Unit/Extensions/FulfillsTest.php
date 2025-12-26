<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('can fulfill a condition', function () {

    Assert::that('hello')
        ->fulfills(fn (string $value) => $value === 'hello')
        ->fulfills(fn (string $value) => strlen($value) === 5);

    $this->expectNotToPerformAssertions();
});

it('fails if condition is not fulfilled', function () {
    expect(
        fn () => Assert::that('hello')
        ->fulfills(fn (string $value) => $value === 'world', 'Value is not "world"'),
    )->toThrow(InvalidArgumentException::class, 'Value is not "world"');
});

it('fails if a sub assertion is not fulfilled', function () {
    expect(
        fn () => Assert::that('hello')
        ->fulfills(function (string $value) {
            Assert::that($value)->same('world', 'Value is not "world"');

            return true;
        }),
    )->toThrow(InvalidArgumentException::class, 'Value is not "world"');
});
