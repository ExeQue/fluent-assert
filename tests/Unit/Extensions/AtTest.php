<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException;
use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

describe('at()', function () {
    it('calls callback on the element at index', function () {
        $assert = Assert::that(['a', 'b', 'c']);
        $called = 0;

        $assert->at(1, function (Assert $item, int $index) use (&$called) {
            expect($item->value())->toBe('b')
                ->and($index)->toBe(1);
            $called++;
        });

        expect($called)->toBe(1);
    });

    it('fails if the index does not exist', function () {
        $assert = Assert::that(['a', 'b', 'c']);

        expect(fn () => $assert->at(2, fn () => ''))->not->toThrow(InvalidArgumentException::class)
            ->and(fn () => $assert->at(3, fn () => ''))->toThrow(InvalidArgumentException::class);

        $assert = Assert::that(['a' => 'a', 'b' => 'b', 'c' => 'c']);
        expect(fn () => $assert->at('c', fn () => ''))->not->toThrow(InvalidArgumentException::class)
            ->and(fn () => $assert->at('d', fn () => ''))->toThrow(InvalidArgumentException::class);
    });

    it('can use a callable to extract the value to assert on', function () {
        $items = [
            random_bytes(8),
            $expected = random_bytes(8),
            random_bytes(8),
        ];

        $assert = Assert::that($items);

        $assert->at(
            fn (array $input) => $input[1],
            fn (Assert $assert) => expect($assert->value())->toBe($expected),
        );
    });

    it('can reference object properties', function () {
        $object = new class () {
            public string $name = 'John Doe';
        };

        $assert = Assert::that($object);

        $assert->at('name', function (Assert $item, string $key) use ($object) {
            expect($item->value())->toBe($object->name)->and($key)->toBe('name');
        });

        expect(function () {
            $object = new class () {
                private string $name = 'John Doe';
            };

            $assert = Assert::that($object);

            $assert->at('name', fn () => '');
        })->toThrow(InvalidArgumentException::class);
    });

    it('does not report index when the key does not exist', function () {
        $assert = Assert::that([
            'foo' => 'bar',
        ]);

        expect(fn () => $assert->at('baz', fn () => ''))->not->toThrow(
            IndexedInvalidArgumentException::class,
        );
    });

    it('throws an indexed invalid argument when the callback fails', function () {
        $assert = Assert::that(['a', 'b', 'c']);

        expect(fn () => $assert->at(1, fn () => throw new InvalidArgumentException('Test')))
            ->toThrow(function (IndexedInvalidArgumentException $exception) {
                expect($exception->getIndex())->toBe(1)
                    ->and($exception->getOriginalMessage())->toBe('Test');
            });
    });
});

describe('atMany()', function () {
    it('can map at multiple keys', function () {
        $this->expectNotToPerformAssertions();

        $array = [
            'first_name' => 'Alice',
            'last_name'  => 'Smith',
            'age' => 30,
        ];

        Assert::that($array)
            ->atMany([
                'first_name' => fn (Assert $firstName) => $firstName->string()->eq('Alice'),
                'last_name'  => fn (Assert $lastName) => $lastName->string()->eq('Smith'),
                'age'        => fn (Assert $age) => $age->integer()->eq(30),
            ]);
    });

    it('throws an indexed invalid argument when any callback fails', function () {
        $array = [
            'first_name' => 'Alice',
            'last_name'  => 'Smith',
            'age' => 30,
        ];

        expect(fn () => Assert::that($array)
            ->atMany([
                'first_name' => fn (Assert $firstName) => $firstName->string()->eq('Alice'),
                'last_name'  => fn (Assert $lastName) => $lastName->string()->eq('Smith'),
                'age'        => fn (Assert $age) => $age->integer()->eq(25),
            ]))->toThrow(function (IndexedInvalidArgumentException $exception) {
                expect($exception->getIndex())->toBe('age');
            });
    });

    it('can use numeric keys', function () {
        $this->expectNotToPerformAssertions();

        $array = ['apple', 'banana', 'cherry'];

        Assert::that($array)
            ->atMany([
                0 => fn (Assert $item) => $item->string()->eq('apple'),
                1 => fn (Assert $item) => $item->string()->eq('banana'),
                2 => fn (Assert $item) => $item->string()->eq('cherry'),
            ]);

        Assert::that($array)
            ->atMany([
                fn (Assert $item) => $item->string()->eq('apple'),
                fn (Assert $item) => $item->string()->eq('banana'),
                fn (Assert $item) => $item->string()->eq('cherry'),
            ]);
    });

    it('fails if a key does not exist', function () {
        $array = [
            'first_name' => 'Alice',
            'last_name'  => 'Smith',
        ];

        expect(fn () => Assert::that($array)
            ->atMany([
                'first_name' => fn (Assert $firstName) => $firstName->string()->eq('Alice'),
                'age'        => fn (Assert $age) => $age->integer()->eq(30),
            ]))->toThrow(function (InvalidArgumentException $exception) {
                expect($exception::class)->toBe(InvalidArgumentException::class);
            });
    });

    it('fails if a numeric index does not exist', function () {
        $array = ['apple', 'banana', 'cherry'];

        expect(fn () => Assert::that($array)
            ->atMany([
                0 => fn (Assert $item) => $item->string()->eq('apple'),
                3 => fn (Assert $item) => $item->string()->eq('date'),
            ]))->toThrow(function (InvalidArgumentException $exception) {
                expect($exception::class)->toBe(InvalidArgumentException::class);
            });
    });

    it('fails if given a mapping that is not `[array-key => callable]`', function () {
        $array = [
            'first_name' => 'Alice',
            'last_name'  => 'Smith',
        ];

        expect(fn () => Assert::that($array)
            ->atMany([
                'first_name' => fn (Assert $firstName) => $firstName->string()->eq('Alice'),
                'age'        => 'not a callable',
            ]))->toThrow(InvalidArgumentException::class);
    });
});
