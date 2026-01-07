<?php

declare(strict_types=1);

namespace Tests\Fixtures;

class SampleObject
{
    public string $public = 'foo';

    private string $private = 'bar';

    protected string $protected = 'baz';
}
