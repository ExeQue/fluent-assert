<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use Tests\Support\AssertableCallable;

describe('each()', function () {
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
});

describe('forEach()', function () {
    it('calls the callback with a new assertion with each value and index', function () {
        $assert = Assert::that(['a', 'b', 'c']);

        $callback = AssertableCallable::shouldBeCalled()
            ->seeing(
                [Assert::that('a'), 0],
                [Assert::that('b'), 1],
                [Assert::that('c'), 2],
            );

        $assert->forEach($callback);

        $assert = Assert::that(['a' => 'A', 'b' => 'B', 'c' => 'C']);

        $callback = AssertableCallable::shouldBeCalled()
            ->seeing(
                [Assert::that('A'), 'a'],
                [Assert::that('B'), 'b'],
                [Assert::that('C'), 'c'],
            );

        $assert->forEach($callback);
    });

    it('throws an exception if given a non-iterable', function () {
        $assert = Assert::that('not iterable');
        $callback = AssertableCallable::shouldNotBeCalled();

        expect(fn () => $assert->forEach($callback))->toThrow(InvalidArgumentException::class);
    });

    it('exception message starts with index of the first failure', function () {
        $assert = Assert::that(['a', 'b', 'c']);

        $callback = function (Assert $assertion, int $index) {
            $assertion->eq('a');
        };

        try {
            $assert->forEach($callback);
        } catch (IndexedInvalidArgumentException $exception) {
            expect($exception->getMessage())->toBe('[1]: ' . $exception->getPrevious()?->getMessage());
        }
    });
});

describe('forKeys()', function () {
    it('calls the callback with a new assertion with each key and index', function () {
        $assert = Assert::that(['a' => 'A', 'b' => 'B', 'c' => 'C']);

        $callback = AssertableCallable::shouldBeCalled()
            ->seeing(
                [Assert::that('a'), 0],
                [Assert::that('b'), 1],
                [Assert::that('c'), 2],
            );

        $assert->forKeys($callback);
    });

    it('throws an exception if given a non-iterable', function () {
        $assert = Assert::that('not iterable');
        $callback = AssertableCallable::shouldNotBeCalled();

        expect(fn () => $assert->forKeys($callback))->toThrow(InvalidArgumentException::class);
    });

    it('exception message starts with index of the first failure', function () {
        $assert = Assert::that(['a' => 'A', 'b' => 'B', 'c' => 'C']);

        $callback = function (Assert $assertion, int $index) {
            $assertion->eq('x');
        };

        try {
            $assert->forKeys($callback);
        } catch (IndexedInvalidArgumentException $exception) {
            expect($exception->getMessage())->toBe('[a]: ' . $exception->getPrevious()?->getMessage());
        }
    });
});
