<?php

declare(strict_types=1);

namespace Tests\Fixtures;

enum SampleIntBackedEnum: int
{
    case First = 1;

    case Second = 2;
}
