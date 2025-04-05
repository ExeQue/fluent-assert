<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
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

    expect(fn() => $assert->each(fn() => ''))->toThrow(InvalidArgumentException::class);
});

test('exception message starts with index of the first failure', function () {
    $assert = Assert::for(['a', 'b', 'c']);

    try {
        $assert->each(
            fn(Assert $assert) => $assert->eq('a')
        );
    } catch (InvalidArgumentException $exception) {
        expect($exception->getPrevious())->toBeInstanceOf(InvalidArgumentException::class)
            ->and($exception->getMessage())->toBe('[1]: ' . $exception->getPrevious()?->getMessage());
    }
});
