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
            static function (ReflectionMethod $method) {
                $return = $method->getReturnType();

                if ($return instanceof ReflectionNamedType) {
                    $types = [$return];
                } elseif ($return instanceof ReflectionUnionType) {
                    $types = $return->getTypes();
                } else {
                    $types = [];
                }

                $types = array_map(fn (ReflectionNamedType $type) => $type->getName(), $types);

                return
                    !$method->isStatic() &&
                    str_starts_with($method->getName(), '__') === false &&
                    $types !== [] &&
                    in_array('static', $types, true);
            }
        )
    );
});

dataset('invalid assert methods', function () {
    return [
        'nonExistentMethod',
        'anotherInvalidMethod',
        'yetAnotherFakeMethod',
        'each',
        'not',
        'value',
    ];
});


describe(Each::class, function () {
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

    it('can step back to the original Assert', function () {
        $originalAssert = Assert::that([1]);
        $eachAssert = new Each($originalAssert);

        expect($eachAssert->back())->toBe($originalAssert);
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

    it('can step back to the original Assert', function () {
        $originalAssert = Assert::that(1);
        $notAssert = new Not($originalAssert);

        expect($notAssert->back())->toBe($originalAssert);
    });
});
