<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException;

it('does not stop at first failure', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    expect(fn () => $assert->and(
        fn (Assert $assert) => $assert->minCount(4),
        fn (Assert $assert) => $assert->maxCount(2),
    ))->toThrow(function (BulkInvalidArgumentException $exception) {
        expect($exception->getExceptions())
            ->toHaveCount(2)
            ->each->toBeInstanceOf(
                InvalidArgumentException::class,
            );

        $exceptions = $exception->getExceptions();

        expect($exception->getPrevious())->toBe(reset($exceptions));
    });
});

it('cannot fail at all', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    $assert->and(
        fn (Assert $assert) => $assert->minCount(3),
        fn (Assert $assert) => $assert->maxCount(3),
        fn (Assert $assert) => $assert->arrayContains('b'),
    );

    $this->expectNotToPerformAssertions();
});
