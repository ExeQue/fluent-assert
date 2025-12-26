<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('calls callback on each element', function () {
    $this->expectNotToPerformAssertions();

    $assert = Assert::that(['a', 'b', 'c']);

    $assert->each()->oneOf(['a', 'b', 'c']);
});

it('throws an exception if given a non-iterable', function () {
    $assert = Assert::that('not iterable');

    expect(fn () => $assert->each())->toThrow(InvalidArgumentException::class);
});

test('exception message starts with index of the first failure', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    try {
        $assert->each()->eq('a');
    } catch (InvalidArgumentException $exception) {
        expect($exception->getPrevious())->toBeInstanceOf(InvalidArgumentException::class)
            ->and($exception->getMessage())->toBe('[1]: ' . $exception->getPrevious()?->getMessage());
    }
});

it('can test keys in an iterable', function () {
    Assert::that(['a' => 'A', 'b' => 'B', 'c' => 'C'])->keys()->string();

    Assert::that([1,2,3,4])->keys()->integer();

    [$obj1, $obj2] = [new stdClass(), new stdClass()];
    $map = new WeakMap();
    $map[$obj1] = 1;
    $map[$obj2] = 2;

    $assert = Assert::that($map);

    $assert->keys()->isInstanceOf(stdClass::class);

    expect(fn () => $assert->keys()->string())->toThrow(function (IndexedInvalidArgumentException $exception) {
        expect($exception->getIndex())->toBe(0);
    });

    $assert = Assert::that([1,2,3,4]);

    expect(fn () => $assert->keys()->string())->toThrow(InvalidArgumentException::class);
});
