<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('calls callback on each element', function () {
    $assert = Assert::for(['a', 'b', 'c']);
    $called = 0;

    $assert->each(
        function (Assert $item, int $index) use (&$called) {
            expect($item->value())->toBe(['a', 'b', 'c'][$index]);
            $called++;
        },
    );

    expect($called)->toBe(3);
});

it('throws an exception if given a non-iterable', function () {
    $assert = Assert::for('not iterable');

    expect(fn () => $assert->each(fn () => ''))->toThrow(InvalidArgumentException::class);
});

test('exception message starts with index of the first failure', function () {
    $assert = Assert::for(['a', 'b', 'c']);

    try {
        $assert->each(
            fn (Assert $assert) => $assert->eq('a')
        );
    } catch (InvalidArgumentException $exception) {
        expect($exception->getPrevious())->toBeInstanceOf(InvalidArgumentException::class)
            ->and($exception->getMessage())->toBe('[1]: ' . $exception->getPrevious()?->getMessage());
    }
});

it('can test keys in an iterable', function () {
    $assert = Assert::for(['a' => 'A', 'b' => 'B', 'c' => 'C']);

    $assert->eachKey(
        fn (Assert $key, string $value) => $key->string()
    );

    $assert = Assert::for([1,2,3,4]);

    $assert->eachKey(
        fn (Assert $key, int $value) => $key->integer()
    );

    [$obj1, $obj2] = [new stdClass(), new stdClass()];
    $map = new WeakMap();
    $map[$obj1] = 1;
    $map[$obj2] = 2;

    $assert = Assert::for($map);

    $assert->eachKey(
        fn (Assert $key, int $value) => $key->isInstanceOf(stdClass::class)
    );
    expect(fn () => $assert->eachKey(fn (Assert $key) => $key->string()))->toThrow(function (IndexedInvalidArgumentException $exception) {
        expect($exception->getIndex())->toBe(0);
    });

    $assert = Assert::for([1,2,3,4]);

    expect(fn () => $assert->eachKey(fn (Assert $key) => $key->string()))->toThrow(InvalidArgumentException::class);
});
