<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Exceptions;

class BulkInvalidArgumentException extends InvalidArgumentException
{
    public function __construct(
        private readonly array $exceptions,
        string $message = "",
        int $code = 0,
    ) {
        $first = reset($exceptions);

        parent::__construct($message, $code, $first);
    }

    /**
     * @return InvalidArgumentException[]
     */
    public function getExceptions(): array
    {
        return $this->exceptions;
    }
}
