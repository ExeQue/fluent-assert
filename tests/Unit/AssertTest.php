<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Base;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('asserts value has indices', function (mixed $input) {
    Base::hasIndices($input);

    $this->expectNotToPerformAssertions();
})->with(fn () => [
    'array'            => [
        'input' => [1, 2, 3, 4],
    ],
    ArrayAccess::class => [
        'input' => new ArrayObject([1, 2, 3, 4]),
    ],
]);

it('fails to assert value has indices', function (mixed $input) {
    expect(fn () => Base::hasIndices($input))->toThrow(InvalidArgumentException::class);
})->with(fn () => [
    'string' => [
        'input' => 'string',
    ],
    'int'    => [
        'input' => 1,
    ],
    'float'  => [
        'input' => 1.0,
    ],
    'bool'   => [
        'input' => true,
    ],
]);

it('asserts value contains value', function () {
    Base::arrayContains(['foo', 'bar'], 'foo');
    Base::arrayContains(['foo', 'bar'], 'bar');

    $this->expectNotToPerformAssertions();
});

it('fails to assert value contains value', function (mixed $input) {
    expect(fn () => Base::arrayContains(['foo', 'bar'], $input))->toThrow(InvalidArgumentException::class);
})->with(fn () => [
    'string' => [
        'input' => 'string',
    ],
    'int'    => [
        'input' => 1,
    ],
    'float'  => [
        'input' => 1.0,
    ],
    'bool'   => [
        'input' => true,
    ],
]);

it('asserts value is type', function (string $type, mixed $input) {
    Base::type($input, $type);

    $this->expectNotToPerformAssertions();
})->with(fn () => [
    'string'        => [
        'type'  => 'string',
        'input' => 'string',
    ],
    'int'           => [
        'type'  => 'int',
        'input' => 1,
    ],
    'float'         => [
        'type'  => 'float',
        'input' => 1.0,
    ],
    'bool'          => [
        'type'  => 'bool',
        'input' => true,
    ],
    stdClass::class => [
        'type'  => stdClass::class,
        'input' => new stdClass(),
    ],
    'resource'      => [
        'type'  => 'resource',
        'input' => fopen('php://memory', 'rb'),
    ],
]);

it('fails to assert value is type', function (string $type, mixed $input) {
    expect(fn () => Base::type($input, $type))->toThrow(InvalidArgumentException::class);
})->with(fn () => [
    'string with array' => [
        'type'  => 'string',
        'input' => [],
    ],
    'int with array'    => [
        'type'  => 'int',
        'input' => [],
    ],
    'float with string'  => [
        'type'  => 'float',
        'input' => 'test',
    ],
]);
