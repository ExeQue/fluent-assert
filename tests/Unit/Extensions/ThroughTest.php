<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use Tests\Support\AssertableCallable;

it('calls callback', function () {
    $assert = Assert::that('a');

    $callback = AssertableCallable::shouldBeCalled(
        fn (Assert $passed) => expect($passed)->toBe($assert)
    );

    $assert->through($callback);
});
