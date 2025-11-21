<?php

declare(strict_types=1);

use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;
use ExeQue\FluentAssert\Resolvers\ExceptionMessage;

it('joins exception messages and adds a final dot at the end', function () {
    $exceptionA = new InvalidArgumentException('first message');
    $exceptionB = new InvalidArgumentException('second message');

    $message = ExceptionMessage::for(
        $exceptionA,
        $exceptionB
    );

    $expected = 'first message and second message.';

    $actual = $message->join(', ', ' and ');

    expect($actual)->toBe($expected);
});

it('strips dots from the end of all messages except the last', function () {
    $exceptionA = new InvalidArgumentException('first message.');
    $exceptionB = new InvalidArgumentException('second message.');

    $message = ExceptionMessage::for(
        $exceptionA,
        $exceptionB
    );

    $expected = 'first message and second message.';

    $actual = $message->join(', ', ' and ');

    expect($actual)->toBe($expected);
});

it('can take any glue and final glue', function (array $messages, string $glue, string $finalGlue, string $expected) {
    $exceptions = array_map(fn ($message) => new InvalidArgumentException($message), $messages);

    $message = ExceptionMessage::for(...$exceptions);

    $actual = $message->join($glue, $finalGlue);

    expect($actual)->toBe($expected);
})->with([
    'first' => fn () => [
        'messages' => [
            'first message',
            'second message',
            'third message',
        ],
        'glue' => ', ',
        'finalGlue' => ' and ',
        'expected' => 'first message, second message and third message.',
    ],
    'second' => fn () => [
        'messages' => [
            'first message.',
            'second message.',
            'third message.',
        ],
        'glue' => ' and ',
        'finalGlue' => ' and ',
        'expected' => 'first message and second message and third message.',
    ],
    'third' => fn () => [
        'messages' => [
            'first message.',
            'second message.',
            'third message.',
        ],
        'glue' => '@',
        'finalGlue' => '#',
        'expected' => 'first message@second message#third message.',
    ],
]);

it('outputs the first message if only one exception is given', function () {
    $exception = new InvalidArgumentException('first message');

    $message = ExceptionMessage::for($exception);

    $expected = 'first message.';

    $actual = $message->join(', ', ' and ');

    expect($actual)->toBe($expected);
});
