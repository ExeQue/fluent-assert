<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use Tests\Support\AssertableCallable;

describe('when()', function () {
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
});

describe('whenAt()', function () {
    it('calls then when key exists in array', function () {
        $assert = Assert::that(['a' => 'b']);

        $then = AssertableCallable::shouldBeCalled()->times(1)->seeing(
            [Assert::that('b'), 'a']
        );

        $assert->whenAt('a', $then);
    });

    it('calls otherwise when key does not exist in array', function () {
        $assert = Assert::that(['a' => 'b']);

        $then = AssertableCallable::shouldNotBeCalled();

        $otherwise = AssertableCallable::shouldBeCalled()->times(1)->seeing(
            [Assert::that(['a' => 'b']), 'b']
        );

        $assert->whenAt('b', $then, $otherwise);
    });

    it('calls then when public property exists on object', function () {
        $obj = new class () {
            public string $public = 'foo';
        };

        $assert = Assert::that($obj);

        $then = AssertableCallable::shouldBeCalled()->times(1)->seeing(
            [Assert::that('foo'), 'public']
        );

        $assert->whenAt('public', $then, fn () => func_get_args());
    });

    it('calls otherwise when public property does not exist on object', function () {
        $obj = new class () {
            private string $private = 'foo';
            protected string $protected = 'bar';
        };

        $assert = Assert::that($obj);

        $then = AssertableCallable::shouldNotBeCalled();

        $otherwise = AssertableCallable::shouldBeCalled()->once()->seeing(
            [Assert::that($obj), 'private']
        );

        $assert->whenAt('private', $then, $otherwise);

        $otherwise = AssertableCallable::shouldBeCalled()->once()->seeing(
            [Assert::that($obj), 'protected']
        );

        $assert->whenAt('protected', $then, $otherwise);
    });

    it('calls then when static public property exists on object', function () {
        $obj = new class () {
            public static string $public = 'foo';
        };

        $assert = Assert::that($obj);

        $then = AssertableCallable::shouldBeCalled()->times(1)->seeing(
            [Assert::that('foo'), 'public']
        );

        $assert->whenAt('public', $then);
    });
});


it('does not throw an error if key does not exists and no otherwise is given', function () {
    $assert = Assert::that(['a' => 'b']);

    $callback = AssertableCallable::shouldNotBeCalled();

    $assert->whenAt('c', $callback);
});
