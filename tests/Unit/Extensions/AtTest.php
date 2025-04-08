<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('calls callback on the element at index', function () {
    $assert = Assert::for(['a', 'b', 'c']);
    $called = 0;

    $assert->at(1, function (Assert $item, int $index) use (&$called) {
        expect($item->value())->toBe('b')
            ->and($index)->toBe(1);
        $called++;
    });

    expect($called)->toBe(1);
});

it('fails if the index does not exist', function () {
    $assert = Assert::for(['a', 'b', 'c']);

    expect(fn () => $assert->at(2, fn () => ''))->not->toThrow(InvalidArgumentException::class)
        ->and(fn () => $assert->at(3, fn () => ''))->toThrow(InvalidArgumentException::class);

    $assert = Assert::for(['a' => 'a', 'b' => 'b', 'c' => 'c']);
    expect(fn () => $assert->at('c', fn () => ''))->not->toThrow(InvalidArgumentException::class)
        ->and(fn () => $assert->at('d', fn () => ''))->toThrow(InvalidArgumentException::class);
});

it('can use a callable to extract the value to assert on', function () {
    $items = [
        random_bytes(8),
        $expected = random_bytes(8),
        random_bytes(8),
    ];

    $assert = Assert::for($items);

    $assert->at(
        fn (array $input) => $input[1],
        fn (Assert $assert) => expect($assert->value())->toBe($expected),
    );
});

it('can reference object properties', function () {
    $object = new class () {
        public string $name = 'John Doe';
    };

    $assert = Assert::for($object);

    $assert->at('name', function (Assert $item, string $key) use ($object) {
        expect($item->value())->toBe($object->name)->and($key)->toBe('name');
    });

    expect(function () {
        $object = new class () {
            private string $name = 'John Doe';
        };

        $assert = Assert::for($object);

        $assert->at('name', fn () => '');
    })->toThrow(InvalidArgumentException::class);
});

it('does not report index when the key does not exist', function () {
    $assert = Assert::for([
        'foo' => 'bar',
    ]);

    expect(fn () => $assert->at('baz', fn () => ''))->not->toThrow(
        IndexedInvalidArgumentException::class,
    );
});
