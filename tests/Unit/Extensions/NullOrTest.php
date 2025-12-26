<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use PHPUnit\Framework\ExpectationFailedException;

it('stops if the value is null', function () {
    $this->expectNotToPerformAssertions();

    $assert = Assert::that(null);

    $assert->nullOr(function () {
        throw new ExpectationFailedException(
            'This should not be called because the value is null.'
        );
    });
});

it('calls the callback if the value is not null', function () {
    $assert = Assert::that('value');

    $assert->nullOr(function (Assert $assert) {
        expect($assert->value())->toBe('value');
    });
});
