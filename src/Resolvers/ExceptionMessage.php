<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Resolvers;

use ExeQue\FluentAssert\Exceptions\InvalidArgumentException;

/**
 * @internal
 */
class ExceptionMessage
{
    private array $exceptions;

    public function __construct(
        InvalidArgumentException ...$exceptions
    ) {
        $this->exceptions = $exceptions;
    }

    public static function for(
        InvalidArgumentException ...$exceptions
    ): static {
        return new static(...$exceptions);
    }

    public function join(string $glue, string $finalGlue): string
    {
        $exceptions = array_values($this->exceptions);

        $messages = array_map(
            $this->resolveMessage(...),
            $exceptions,
            array_keys($exceptions),
        );

        if (count($messages) === 1) {
            return array_shift($messages);
        }

        return implode($glue, array_slice($messages, 0, -1)) . $finalGlue . end($messages);
    }

    private function resolveMessage(InvalidArgumentException $exception, int $index): string
    {
        $message = $exception->getMessage();

        [$firstChar, $lastChar] = [$message[0], $message[-1]];

        $position = $this->position($index);

        if ($position !== 'first') {
            $message[0] = mb_strtolower($firstChar);
        }

        if ($lastChar === '.') {
            $message = mb_substr($message, 0, -1);
        }

        $message = preg_replace('/\. Got: (.+)$/', ' (Got: $1)', $message);

        if (($position === 'last' || $position === 'only') && $message[-1] !== '.') {
            $message .= '.';
        }

        return $message;
    }

    private function position(int $index): string
    {
        if (count($this->exceptions) === 1) {
            return 'only';
        }

        if ($index === 0) {
            return 'first';
        }

        if ($index === count($this->exceptions) - 1) {
            return 'last';
        }

        return 'middle';
    }
}
