<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Proxies\Each;
use ExeQue\FluentAssert\Proxies\Not;

dataset('assert methods', function () {
    $reflector = new ReflectionClass(Assert::class);

    return array_map(
        fn (ReflectionMethod $method) => $method->getName(),
        array_filter(
            $reflector->getMethods(ReflectionMethod::IS_PUBLIC),
            static fn (ReflectionMethod $method) => !$method->isStatic()
                && str_starts_with($method->getName(), '__') === false
        )
    );
});

dataset('invalid assert methods', function () {
    return [
        'nonExistentMethod',
        'anotherInvalidMethod',
        'yetAnotherFakeMethod',
    ];
});


describe(Each::class, function () {
    it('proxies values', function () {
        $assert = new Each(Assert::that([1,2,3]));

        expect($assert->value())->toEqual([1,2,3]);
    });

    it('proxies all methods', function (string $method) {
        $assert = new Each(Assert::that([1]));

        try {
            $assert->{$method}();

            expect(1)->toBe(1);
        } catch (Throwable $exception) {
            expect($exception)->not->toBeInstanceOf(BadMethodCallException::class);
        }
    })->with('assert methods');

    it('invalid method calls throw BadMethodCallException', function (string $method) {
        $assert = new Each(Assert::that([1]));

        $this->expectException(BadMethodCallException::class);

        $assert->{$method}();
    })->with('invalid assert methods');

    it('can be invoked through Assert', function () {
        $assert = Assert::that([1])->each();

        expect($assert)->toBeInstanceOf(Each::class);
    });
});

describe(Not::class, function () {
    it('proxies all methods', function (string $method) {
        $assert = new Not(Assert::that(1));

        try {
            $assert->{$method}();

            expect(1)->toBe(1);
        } catch (Throwable $exception) {
            expect($exception)->not->toBeInstanceOf(BadMethodCallException::class);
        }
    })->with('assert methods');

    it('invalid method calls throw BadMethodCallException', function (string $method) {
        $assert = new Not(Assert::that(1));

        $this->expectException(BadMethodCallException::class);

        $assert->{$method}();
    })->with('invalid assert methods');

    it('can be invoked through Assert', function () {
        $assert = Assert::that(1)->not();

        expect($assert)->toBeInstanceOf(Not::class);
    });
});
