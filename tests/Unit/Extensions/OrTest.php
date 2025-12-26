<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('stops at the first non-failure', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->or(
        fn (Assert $assert) => $assert->count(3),
        fn (Assert $assert) => $assert->string(),
    );

    $this->expectNotToPerformAssertions();
});

it('does not stop at the first failure if non-failure exists', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->or(
        fn (Assert $assert) => $assert->string(),
        fn (Assert $assert) => $assert->count(3),
    );

    $this->expectNotToPerformAssertions();
});

it('throws a bulk exception if all assertions fail', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    expect(fn () => $assert->or(
        fn (Assert $assert) => $assert->string(),
        fn (Assert $assert) => $assert->count(2),
        fn (Assert $assert) => $assert->integer(),
    ))->toThrow(function (BulkInvalidArgumentException $exception) {
        expect($exception->getExceptions())
            ->toHaveCount(3)
            ->each->toBeInstanceOf(
                InvalidArgumentException::class,
            );

        $exceptions = $exception->getExceptions();

        expect($exception->getPrevious())->toBe(reset($exceptions));
    });
});

it('can be invoked through alias', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    expect(fn () => $assert->any(
        fn (Assert $assert) => $assert->string(),
        fn (Assert $assert) => $assert->count(2),
        fn (Assert $assert) => $assert->integer(),
    ))->toThrow(BulkInvalidArgumentException::class);
});
