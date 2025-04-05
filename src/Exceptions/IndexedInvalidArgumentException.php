<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Exceptions;

use Throwable;

class IndexedInvalidArgumentException extends InvalidArgumentException
{
    private string $originalMessage;

    public function __construct(
        private readonly string|int $index,
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        $this->originalMessage = $message;

        parent::__construct("[$this->index]: $message", $code, $previous);
    }

    public function getIndex(): int|string
    {
        return $this->index;
    }

    public function getOriginalMessage(): string
    {
        return $this->originalMessage;
    }
}
