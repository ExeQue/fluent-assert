<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('fails if assertion does not', function () {
    $assert = Assert::for(['a', 'b', 'c']);

    expect(fn () => $assert->not(
        fn (Assert $assert) => $assert->arrayContains('b'),
    ))->toThrow(InvalidArgumentException::class);
});
