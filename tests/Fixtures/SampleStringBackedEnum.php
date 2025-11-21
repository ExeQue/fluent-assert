<?php

declare(strict_types=1);

namespace Tests\Fixtures;

enum SampleStringBackedEnum: string
{
    case First = 'first';

    case Second = 'second';
}
