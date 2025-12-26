<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;

it('can assert if keys exist in an array', function () {
    $array = [
        'name' => 'Alice',
        'age'  => 30,
        'city' => 'Wonderland',
    ];

    Assert::that($array)
        ->keysExists(
            [
                'name',
                'age',
                'city',
            ],
        );

    $this->expectNotToPerformAssertions();
});

it('can assert partial keys exist in an array', function () {
    $array = [
        'name' => 'Alice',
        'age'  => 30,
        'city' => 'Wonderland',
    ];

    Assert::that($array)
        ->keysExists(
            [
                'name',
                'age',
            ],
        );

    $this->expectNotToPerformAssertions();
});

it('fails if any key does not exist in an array', function () {
    $array = [
        'name' => 'Alice',
        'age'  => 30,
        'city' => 'Wonderland',
    ];

    expect(fn () => Assert::that($array)->keysExists(
        [
            'name',
            'country',
        ],
    ))->toThrow(InvalidArgumentException::class);
});

it('can assert keys in ArrayAccess object', function () {
    $array = new ArrayObject([
        'name' => 'Alice',
        'age'  => 30,
        'city' => 'Wonderland',
    ]);

    Assert::that($array)
        ->keysExists(
            [
                'name',
                'age',
            ],
        );

    $this->expectNotToPerformAssertions();
});
