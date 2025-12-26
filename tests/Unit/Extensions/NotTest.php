<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('fails if assertion does not', function () {
    $assert = Assert::that(['a', 'b', 'c']);

    expect(fn () => $assert->not()->arrayContains('b'))->toThrow(InvalidArgumentException::class);
});

it('passes if assertion does not', function () {
    $this->expectNotToPerformAssertions();

    $assert = Assert::that(['a', 'b', 'c']);

    $assert->not()->arrayContains('d');
});
