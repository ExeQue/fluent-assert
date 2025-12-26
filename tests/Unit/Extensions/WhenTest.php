<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use Tests\Support\AssertableCallable;

it('can use any value for condition', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $truthfulConditions = [
        true,
        1,
        'foo',
        [1],
    ];

    $falsifiableConditions = [
        false,
        0,
        '',
        [],
    ];

    foreach ($truthfulConditions as $condition) {
        $called = false;

        $assert->when($condition, function (Assert $assert) use (&$called) {
            $called = true;
            $assert->count(3);
        });

        expect($called)->toBeTrue();
    }

    foreach ($falsifiableConditions as $condition) {
        $called = false;

        $assert->when($condition, function (Assert $assert) use (&$called) {
            $called = true;
            $assert->count(3);
        });

        expect($called)->toBeFalse();
    }
});

it('can accept callables as condition', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $truthfulConditions = [
        fn () => true,
        fn () => 1,
        fn () => 'foo',
        fn () => [1],
    ];

    $falsifiableConditions = [
        fn () => false,
        fn () => null,
        fn () => 0,
        fn () => '',
        fn () => [],
    ];

    foreach ($truthfulConditions as $condition) {
        $called = false;

        $assert->when($condition, function (Assert $assert) use (&$called) {
            $called = true;
            $assert->count(3);
        });

        expect($called)->toBeTrue();
    }

    foreach ($falsifiableConditions as $condition) {
        $called = false;

        $assert->when($condition, function (Assert $assert) use (&$called) {
            $called = true;
            $assert->count(3);
        });

        expect($called)->toBeFalse();
    }
});

it('runs callback if callback condition returns used non-failed assert', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->when(
        function (Assert $assert) {
            return $assert->count(3);
        },
        AssertableCallable::shouldBeCalled(),
    );
});

it('runs callback if callback condition returns null', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->when(
        function (Assert $assert) {
            $assert->count(3);

            return null;
        },
        AssertableCallable::shouldBeCalled(),
    );
});

it('will not run callback if callback condition returns falsy value', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->when(
        function (Assert $assert) {
            $assert->count(3);

            return false;
        },
        AssertableCallable::shouldNotBeCalled(),
    );
});

it('will not run callback if callback condition fails assertion', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->when(
        fn (Assert $assert) => $assert->count(1),
        AssertableCallable::shouldNotBeCalled(),
    );
});

it('will not run callback if callback condition returns unused assert', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->when(
        function (Assert $conditionAssert) {
            return $conditionAssert;
        },
        AssertableCallable::shouldNotBeCalled(),
    );
});

it('calls otherwise if condition is falsy', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->when(
        false,
        AssertableCallable::shouldNotBeCalled(),
        AssertableCallable::shouldBeCalled(),
    );
});
