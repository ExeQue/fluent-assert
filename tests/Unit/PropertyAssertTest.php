<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

it('checks if public property exists', function () {
    $assert = Assert::for(
        new class () {
            public string $foo = 'Foo';
            public static string $bar = 'Bar';

            private string $baz = 'Baz';
        },
    );

    $assert->publicPropertyExists('foo');
    $assert->publicPropertyExists('bar');
    expect(fn () => $assert->publicPropertyExists('baz'))->toThrow(InvalidArgumentException::class);
});

it('checks if private property exists', function () {
    $assert = Assert::for(
        new class () {
            public string $foo = 'Foo';
            public static string $bar = 'Bar';

            private string $baz = 'Baz';
        },
    );

    $assert->privatePropertyExists('baz');
    expect(fn () => $assert->privatePropertyExists('foo'))->toThrow(InvalidArgumentException::class);
});

it('checks if protected property exists', function () {
    $assert = Assert::for(
        new class () {
            public string $foo = 'Foo';
            public static string $bar = 'Bar';

            protected string $baz = 'Baz';
        },
    );

    $assert->protectedPropertyExists('baz');
    expect(fn () => $assert->protectedPropertyExists('foo'))->toThrow(InvalidArgumentException::class);
});

it('checks if static property exists', function () {
    $assert = Assert::for(
        new class () {
            public string $foo = 'Foo';
            public static string $bar = 'Bar';

            private string $baz = 'Baz';
        },
    );

    $assert->staticPropertyExists('bar');
    expect(fn () => $assert->staticPropertyExists('foo'))->toThrow(InvalidArgumentException::class);
});
