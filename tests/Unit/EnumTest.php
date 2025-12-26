<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use Tests\Fixtures\SampleIntBackedEnum;
use Tests\Fixtures\SampleStringBackedEnum;
use Tests\Fixtures\SampleUnitEnum;
use Tests\Fixtures\SecondEnum;

it('checks if the given value is a valid enum case', function (string $enumClass) {
    $assert = Assert::that('First');

    $assert->enumCaseExists($enumClass);

    expect(fn () => $assert->enumCaseExists(SecondEnum::class))->toThrow(InvalidArgumentException::class);
})->with([
    UnitEnum::class         => [
        'enumClass' => SampleUnitEnum::class,
    ],
    StringBackedEnum::class => [
        'enumClass' => SampleStringBackedEnum::class,
    ],
    IntBackedEnum::class    => [
        'enumClass' => SampleIntBackedEnum::class,
    ],
]);

it('checks if the given valid is a valid enum value', function (mixed $input, string $enumClass) {
    $assert = Assert::that($input);

    $assert->enumValueExists($enumClass);

    expect(fn () => $assert->enumValueExists(SecondEnum::class))->toThrow(InvalidArgumentException::class);
})->with([
    StringBackedEnum::class => [
        'input'      => 'first',
        'enumClass'  => SampleStringBackedEnum::class,
    ],
    IntBackedEnum::class    => [
        'input'      => 1,
        'enumClass'  => SampleIntBackedEnum::class,
    ],
]);

it('cannot test for values on a non-backed enum', function () {
    expect(fn () => Assert::that('foo')->enumValueExists(SampleUnitEnum::class))
        ->toThrow(
            InvalidArgumentException::class,
            'Expected enum class to implement BackedEnum interface.'
        );
});

it('cannot test for cases on a non-enum', function () {
    expect(fn () => Assert::that('foo')->enumCaseExists(stdClass::class))
        ->toThrow(
            InvalidArgumentException::class,
            'Expected enum class to implement UnitEnum interface.'
        );
});

it('cannot test for values on a non-enum', function () {
    expect(fn () => Assert::that('foo')->enumValueExists(stdClass::class))
        ->toThrow(
            InvalidArgumentException::class,
            'Expected enum class to implement BackedEnum interface.'
        );
});
