<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Concerns;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Base;
use UnitEnum;
use BackedEnum;

/**
 * This file is auto-generated. Do not edit it manually.
 *
 * @extends Assert
 * @codeCoverageIgnore
 */
trait Mixin
{
    // region [ Base::alnum ]

    /**
     * @param string $message
     *
     * @see Base::alnum
     */
    public function alnum($message = ''): static
    {
        $this->used = true;

        Base::alnum($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrAlnum
     */
    public function nullOrAlnum($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::alnum($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allAlnum
     */
    public function allAlnum($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->alnum(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrAlnum
     */
    public function allNullOrAlnum($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrAlnum(...$args)
        );
    }

    // endregion [ Base::alnum ]

    // region [ Base::alpha ]

    /**
     * @param string $message
     *
     * @see Base::alpha
     */
    public function alpha($message = ''): static
    {
        $this->used = true;

        Base::alpha($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrAlpha
     */
    public function nullOrAlpha($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::alpha($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allAlpha
     */
    public function allAlpha($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->alpha(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrAlpha
     */
    public function allNullOrAlpha($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrAlpha(...$args)
        );
    }

    // endregion [ Base::alpha ]

    // region [ Base::arrayContains ]

    /**
     * @param mixed $value
     * @param string $message
     *
     * @see Base::arrayContains
     */
    public function arrayContains($value, $message = ''): static
    {
        $this->used = true;

        Base::arrayContains($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $value
     * @param string $message
     *
     * @see Base::nullOrArrayContains
     */
    public function nullOrArrayContains($value, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::arrayContains($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $value
     * @param string $message
     *
     * @see Base::allArrayContains
     */
    public function allArrayContains($value, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->arrayContains(...$args)
        );
    }

    /**
     * @param mixed $value
     * @param string $message
     *
     * @see Base::allNullOrArrayContains
     */
    public function allNullOrArrayContains($value, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrArrayContains(...$args)
        );
    }

    // endregion [ Base::arrayContains ]

    // region [ Base::boolean ]

    /**
     * @param string $message
     *
     * @see Base::boolean
     */
    public function boolean($message = ''): static
    {
        $this->used = true;

        Base::boolean($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrBoolean
     */
    public function nullOrBoolean($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::boolean($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allBoolean
     */
    public function allBoolean($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->boolean(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrBoolean
     */
    public function allNullOrBoolean($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrBoolean(...$args)
        );
    }

    // endregion [ Base::boolean ]

    // region [ Base::classExists ]

    /**
     * @param string $message
     *
     * @see Base::classExists
     */
    public function classExists($message = ''): static
    {
        $this->used = true;

        Base::classExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrClassExists
     */
    public function nullOrClassExists($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::classExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allClassExists
     */
    public function allClassExists($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->classExists(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrClassExists
     */
    public function allNullOrClassExists($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrClassExists(...$args)
        );
    }

    // endregion [ Base::classExists ]

    // region [ Base::contains ]

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::contains
     */
    public function contains($subString, $message = ''): static
    {
        $this->used = true;

        Base::contains($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::nullOrContains
     */
    public function nullOrContains($subString, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::contains($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::allContains
     */
    public function allContains($subString, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->contains(...$args)
        );
    }

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::allNullOrContains
     */
    public function allNullOrContains($subString, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrContains(...$args)
        );
    }

    // endregion [ Base::contains ]

    // region [ Base::count ]

    /**
     * @param int $number
     * @param string $message
     *
     * @see Base::count
     */
    public function count($number, $message = ''): static
    {
        $this->used = true;

        Base::count($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int $number
     * @param string $message
     *
     * @see Base::nullOrCount
     */
    public function nullOrCount($number, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::count($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int $number
     * @param string $message
     *
     * @see Base::allCount
     */
    public function allCount($number, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->count(...$args)
        );
    }

    /**
     * @param int $number
     * @param string $message
     *
     * @see Base::allNullOrCount
     */
    public function allNullOrCount($number, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrCount(...$args)
        );
    }

    // endregion [ Base::count ]

    // region [ Base::countBetween ]

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::countBetween
     */
    public function countBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        Base::countBetween($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::nullOrCountBetween
     */
    public function nullOrCountBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::countBetween($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allCountBetween
     */
    public function allCountBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->countBetween(...$args)
        );
    }

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allNullOrCountBetween
     */
    public function allNullOrCountBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrCountBetween(...$args)
        );
    }

    // endregion [ Base::countBetween ]

    // region [ Base::digits ]

    /**
     * @param string $message
     *
     * @see Base::digits
     */
    public function digits($message = ''): static
    {
        $this->used = true;

        Base::digits($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrDigits
     */
    public function nullOrDigits($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::digits($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allDigits
     */
    public function allDigits($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->digits(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrDigits
     */
    public function allNullOrDigits($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrDigits(...$args)
        );
    }

    // endregion [ Base::digits ]

    // region [ Base::directory ]

    /**
     * @param string $message
     *
     * @see Base::directory
     */
    public function directory($message = ''): static
    {
        $this->used = true;

        Base::directory($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrDirectory
     */
    public function nullOrDirectory($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::directory($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allDirectory
     */
    public function allDirectory($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->directory(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrDirectory
     */
    public function allNullOrDirectory($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrDirectory(...$args)
        );
    }

    // endregion [ Base::directory ]

    // region [ Base::email ]

    /**
     * @param string $message
     *
     * @see Base::email
     */
    public function email($message = ''): static
    {
        $this->used = true;

        Base::email($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrEmail
     */
    public function nullOrEmail($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::email($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allEmail
     */
    public function allEmail($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->email(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrEmail
     */
    public function allNullOrEmail($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrEmail(...$args)
        );
    }

    // endregion [ Base::email ]

    // region [ Base::endsWith ]

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::endsWith
     */
    public function endsWith($suffix, $message = ''): static
    {
        $this->used = true;

        Base::endsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::nullOrEndsWith
     */
    public function nullOrEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::endsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::allEndsWith
     */
    public function allEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->endsWith(...$args)
        );
    }

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::allNullOrEndsWith
     */
    public function allNullOrEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrEndsWith(...$args)
        );
    }

    // endregion [ Base::endsWith ]

    // region [ Base::enumCaseExists ]

    /**
     * @param class-string<UnitEnum> $enumClass
     * @param string $message
     *
     * @see Base::enumCaseExists
     */
    public function enumCaseExists($enumClass, $message = ''): static
    {
        $this->used = true;

        Base::enumCaseExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param class-string<UnitEnum> $enumClass
     * @param string $message
     *
     * @see Base::nullOrEnumCaseExists
     */
    public function nullOrEnumCaseExists($enumClass, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::enumCaseExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param class-string<UnitEnum> $enumClass
     * @param string $message
     *
     * @see Base::allEnumCaseExists
     */
    public function allEnumCaseExists($enumClass, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->enumCaseExists(...$args)
        );
    }

    /**
     * @param class-string<UnitEnum> $enumClass
     * @param string $message
     *
     * @see Base::allNullOrEnumCaseExists
     */
    public function allNullOrEnumCaseExists($enumClass, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrEnumCaseExists(...$args)
        );
    }

    // endregion [ Base::enumCaseExists ]

    // region [ Base::enumValueExists ]

    /**
     * @param class-string<BackedEnum> $enumClass
     * @param string $message
     *
     * @see Base::enumValueExists
     */
    public function enumValueExists($enumClass, $message = ''): static
    {
        $this->used = true;

        Base::enumValueExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param class-string<BackedEnum> $enumClass
     * @param string $message
     *
     * @see Base::nullOrEnumValueExists
     */
    public function nullOrEnumValueExists($enumClass, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::enumValueExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param class-string<BackedEnum> $enumClass
     * @param string $message
     *
     * @see Base::allEnumValueExists
     */
    public function allEnumValueExists($enumClass, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->enumValueExists(...$args)
        );
    }

    /**
     * @param class-string<BackedEnum> $enumClass
     * @param string $message
     *
     * @see Base::allNullOrEnumValueExists
     */
    public function allNullOrEnumValueExists($enumClass, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrEnumValueExists(...$args)
        );
    }

    // endregion [ Base::enumValueExists ]

    // region [ Base::eq ]

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::eq
     */
    public function eq($expect, $message = ''): static
    {
        $this->used = true;

        Base::eq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::nullOrEq
     */
    public function nullOrEq($expect, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::eq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allEq
     */
    public function allEq($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->eq(...$args)
        );
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allNullOrEq
     */
    public function allNullOrEq($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrEq(...$args)
        );
    }

    // endregion [ Base::eq ]

    // region [ Base::false ]

    /**
     * @param string $message
     *
     * @see Base::false
     */
    public function false($message = ''): static
    {
        $this->used = true;

        Base::false($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrFalse
     */
    public function nullOrFalse($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::false($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allFalse
     */
    public function allFalse($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->false(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrFalse
     */
    public function allNullOrFalse($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrFalse(...$args)
        );
    }

    // endregion [ Base::false ]

    // region [ Base::file ]

    /**
     * @param string $message
     *
     * @see Base::file
     */
    public function file($message = ''): static
    {
        $this->used = true;

        Base::file($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrFile
     */
    public function nullOrFile($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::file($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allFile
     */
    public function allFile($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->file(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrFile
     */
    public function allNullOrFile($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrFile(...$args)
        );
    }

    // endregion [ Base::file ]

    // region [ Base::fileExists ]

    /**
     * @param string $message
     *
     * @see Base::fileExists
     */
    public function fileExists($message = ''): static
    {
        $this->used = true;

        Base::fileExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrFileExists
     */
    public function nullOrFileExists($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::fileExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allFileExists
     */
    public function allFileExists($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->fileExists(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrFileExists
     */
    public function allNullOrFileExists($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrFileExists(...$args)
        );
    }

    // endregion [ Base::fileExists ]

    // region [ Base::float ]

    /**
     * @param string $message
     *
     * @see Base::float
     */
    public function float($message = ''): static
    {
        $this->used = true;

        Base::float($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrFloat
     */
    public function nullOrFloat($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::float($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allFloat
     */
    public function allFloat($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->float(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrFloat
     */
    public function allNullOrFloat($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrFloat(...$args)
        );
    }

    // endregion [ Base::float ]

    // region [ Base::fulfills ]

    /**
     * @param callable $callback
     * @param string $message
     *
     * @see Base::fulfills
     */
    public function fulfills($callback, $message = ''): static
    {
        $this->used = true;

        Base::fulfills($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param callable $callback
     * @param string $message
     *
     * @see Base::nullOrFulfills
     */
    public function nullOrFulfills($callback, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::fulfills($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param callable $callback
     * @param string $message
     *
     * @see Base::allFulfills
     */
    public function allFulfills($callback, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->fulfills(...$args)
        );
    }

    /**
     * @param callable $callback
     * @param string $message
     *
     * @see Base::allNullOrFulfills
     */
    public function allNullOrFulfills($callback, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrFulfills(...$args)
        );
    }

    // endregion [ Base::fulfills ]

    // region [ Base::greaterThan ]

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::greaterThan
     */
    public function greaterThan($limit, $message = ''): static
    {
        $this->used = true;

        Base::greaterThan($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::nullOrGreaterThan
     */
    public function nullOrGreaterThan($limit, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::greaterThan($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allGreaterThan
     */
    public function allGreaterThan($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->greaterThan(...$args)
        );
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allNullOrGreaterThan
     */
    public function allNullOrGreaterThan($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrGreaterThan(...$args)
        );
    }

    // endregion [ Base::greaterThan ]

    // region [ Base::greaterThanEq ]

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::greaterThanEq
     */
    public function greaterThanEq($limit, $message = ''): static
    {
        $this->used = true;

        Base::greaterThanEq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::nullOrGreaterThanEq
     */
    public function nullOrGreaterThanEq($limit, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::greaterThanEq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allGreaterThanEq
     */
    public function allGreaterThanEq($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->greaterThanEq(...$args)
        );
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allNullOrGreaterThanEq
     */
    public function allNullOrGreaterThanEq($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrGreaterThanEq(...$args)
        );
    }

    // endregion [ Base::greaterThanEq ]

    // region [ Base::hasIndices ]

    /**
     * @param string $message
     *
     * @see Base::hasIndices
     */
    public function hasIndices($message = ''): static
    {
        $this->used = true;

        Base::hasIndices($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrHasIndices
     */
    public function nullOrHasIndices($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::hasIndices($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allHasIndices
     */
    public function allHasIndices($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->hasIndices(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrHasIndices
     */
    public function allNullOrHasIndices($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrHasIndices(...$args)
        );
    }

    // endregion [ Base::hasIndices ]

    // region [ Base::implementsInterface ]

    /**
     * @param mixed $interface
     * @param string $message
     *
     * @see Base::implementsInterface
     */
    public function implementsInterface($interface, $message = ''): static
    {
        $this->used = true;

        Base::implementsInterface($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $interface
     * @param string $message
     *
     * @see Base::nullOrImplementsInterface
     */
    public function nullOrImplementsInterface($interface, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::implementsInterface($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $interface
     * @param string $message
     *
     * @see Base::allImplementsInterface
     */
    public function allImplementsInterface($interface, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->implementsInterface(...$args)
        );
    }

    /**
     * @param mixed $interface
     * @param string $message
     *
     * @see Base::allNullOrImplementsInterface
     */
    public function allNullOrImplementsInterface($interface, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrImplementsInterface(...$args)
        );
    }

    // endregion [ Base::implementsInterface ]

    // region [ Base::inArray ]

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::inArray
     */
    public function inArray($values, $message = ''): static
    {
        $this->used = true;

        Base::inArray($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::nullOrInArray
     */
    public function nullOrInArray($values, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::inArray($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::allInArray
     */
    public function allInArray($values, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->inArray(...$args)
        );
    }

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::allNullOrInArray
     */
    public function allNullOrInArray($values, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrInArray(...$args)
        );
    }

    // endregion [ Base::inArray ]

    // region [ Base::instancedPropertyExists ]

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::instancedPropertyExists
     */
    public function instancedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        Base::instancedPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::nullOrInstancedPropertyExists
     */
    public function nullOrInstancedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::instancedPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allInstancedPropertyExists
     */
    public function allInstancedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->instancedPropertyExists(...$args)
        );
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allNullOrInstancedPropertyExists
     */
    public function allNullOrInstancedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrInstancedPropertyExists(...$args)
        );
    }

    // endregion [ Base::instancedPropertyExists ]

    // region [ Base::integer ]

    /**
     * @param string $message
     *
     * @see Base::integer
     */
    public function integer($message = ''): static
    {
        $this->used = true;

        Base::integer($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrInteger
     */
    public function nullOrInteger($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::integer($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allInteger
     */
    public function allInteger($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->integer(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrInteger
     */
    public function allNullOrInteger($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrInteger(...$args)
        );
    }

    // endregion [ Base::integer ]

    // region [ Base::integerish ]

    /**
     * @param string $message
     *
     * @see Base::integerish
     */
    public function integerish($message = ''): static
    {
        $this->used = true;

        Base::integerish($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIntegerish
     */
    public function nullOrIntegerish($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::integerish($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIntegerish
     */
    public function allIntegerish($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->integerish(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIntegerish
     */
    public function allNullOrIntegerish($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIntegerish(...$args)
        );
    }

    // endregion [ Base::integerish ]

    // region [ Base::interfaceExists ]

    /**
     * @param string $message
     *
     * @see Base::interfaceExists
     */
    public function interfaceExists($message = ''): static
    {
        $this->used = true;

        Base::interfaceExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrInterfaceExists
     */
    public function nullOrInterfaceExists($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::interfaceExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allInterfaceExists
     */
    public function allInterfaceExists($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->interfaceExists(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrInterfaceExists
     */
    public function allNullOrInterfaceExists($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrInterfaceExists(...$args)
        );
    }

    // endregion [ Base::interfaceExists ]

    // region [ Base::ip ]

    /**
     * @param string $message
     *
     * @see Base::ip
     */
    public function ip($message = ''): static
    {
        $this->used = true;

        Base::ip($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIp
     */
    public function nullOrIp($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::ip($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIp
     */
    public function allIp($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->ip(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIp
     */
    public function allNullOrIp($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIp(...$args)
        );
    }

    // endregion [ Base::ip ]

    // region [ Base::ipv4 ]

    /**
     * @param string $message
     *
     * @see Base::ipv4
     */
    public function ipv4($message = ''): static
    {
        $this->used = true;

        Base::ipv4($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIpv4
     */
    public function nullOrIpv4($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::ipv4($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIpv4
     */
    public function allIpv4($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->ipv4(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIpv4
     */
    public function allNullOrIpv4($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIpv4(...$args)
        );
    }

    // endregion [ Base::ipv4 ]

    // region [ Base::ipv6 ]

    /**
     * @param string $message
     *
     * @see Base::ipv6
     */
    public function ipv6($message = ''): static
    {
        $this->used = true;

        Base::ipv6($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIpv6
     */
    public function nullOrIpv6($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::ipv6($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIpv6
     */
    public function allIpv6($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->ipv6(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIpv6
     */
    public function allNullOrIpv6($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIpv6(...$args)
        );
    }

    // endregion [ Base::ipv6 ]

    // region [ Base::isAOf ]

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::isAOf
     */
    public function isAOf($class, $message = ''): static
    {
        $this->used = true;

        Base::isAOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::nullOrIsAOf
     */
    public function nullOrIsAOf($class, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isAOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::allIsAOf
     */
    public function allIsAOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isAOf(...$args)
        );
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::allNullOrIsAOf
     */
    public function allNullOrIsAOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsAOf(...$args)
        );
    }

    // endregion [ Base::isAOf ]

    // region [ Base::isAnyOf ]

    /**
     * @param string[] $classes
     * @param string $message
     *
     * @see Base::isAnyOf
     */
    public function isAnyOf($classes, $message = ''): static
    {
        $this->used = true;

        Base::isAnyOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string[] $classes
     * @param string $message
     *
     * @see Base::nullOrIsAnyOf
     */
    public function nullOrIsAnyOf($classes, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isAnyOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string[] $classes
     * @param string $message
     *
     * @see Base::allIsAnyOf
     */
    public function allIsAnyOf($classes, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isAnyOf(...$args)
        );
    }

    /**
     * @param string[] $classes
     * @param string $message
     *
     * @see Base::allNullOrIsAnyOf
     */
    public function allNullOrIsAnyOf($classes, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsAnyOf(...$args)
        );
    }

    // endregion [ Base::isAnyOf ]

    // region [ Base::isArray ]

    /**
     * @param string $message
     *
     * @see Base::isArray
     */
    public function isArray($message = ''): static
    {
        $this->used = true;

        Base::isArray($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsArray
     */
    public function nullOrIsArray($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isArray($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsArray
     */
    public function allIsArray($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isArray(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsArray
     */
    public function allNullOrIsArray($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsArray(...$args)
        );
    }

    // endregion [ Base::isArray ]

    // region [ Base::isArrayAccessible ]

    /**
     * @param string $message
     *
     * @see Base::isArrayAccessible
     */
    public function isArrayAccessible($message = ''): static
    {
        $this->used = true;

        Base::isArrayAccessible($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsArrayAccessible
     */
    public function nullOrIsArrayAccessible($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isArrayAccessible($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsArrayAccessible
     */
    public function allIsArrayAccessible($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isArrayAccessible(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsArrayAccessible
     */
    public function allNullOrIsArrayAccessible($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsArrayAccessible(...$args)
        );
    }

    // endregion [ Base::isArrayAccessible ]

    // region [ Base::isCallable ]

    /**
     * @param string $message
     *
     * @see Base::isCallable
     */
    public function isCallable($message = ''): static
    {
        $this->used = true;

        Base::isCallable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsCallable
     */
    public function nullOrIsCallable($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isCallable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsCallable
     */
    public function allIsCallable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isCallable(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsCallable
     */
    public function allNullOrIsCallable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsCallable(...$args)
        );
    }

    // endregion [ Base::isCallable ]

    // region [ Base::isCountable ]

    /**
     * @param string $message
     *
     * @see Base::isCountable
     */
    public function isCountable($message = ''): static
    {
        $this->used = true;

        Base::isCountable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsCountable
     */
    public function nullOrIsCountable($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isCountable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsCountable
     */
    public function allIsCountable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isCountable(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsCountable
     */
    public function allNullOrIsCountable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsCountable(...$args)
        );
    }

    // endregion [ Base::isCountable ]

    // region [ Base::isEmpty ]

    /**
     * @param string $message
     *
     * @see Base::isEmpty
     */
    public function isEmpty($message = ''): static
    {
        $this->used = true;

        Base::isEmpty($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsEmpty
     */
    public function nullOrIsEmpty($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isEmpty($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsEmpty
     */
    public function allIsEmpty($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isEmpty(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsEmpty
     */
    public function allNullOrIsEmpty($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsEmpty(...$args)
        );
    }

    // endregion [ Base::isEmpty ]

    // region [ Base::isInstanceOf ]

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::isInstanceOf
     */
    public function isInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        Base::isInstanceOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::nullOrIsInstanceOf
     */
    public function nullOrIsInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isInstanceOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::allIsInstanceOf
     */
    public function allIsInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isInstanceOf(...$args)
        );
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::allNullOrIsInstanceOf
     */
    public function allNullOrIsInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsInstanceOf(...$args)
        );
    }

    // endregion [ Base::isInstanceOf ]

    // region [ Base::isInstanceOfAny ]

    /**
     * @param array<object|string> $classes
     * @param string $message
     *
     * @see Base::isInstanceOfAny
     */
    public function isInstanceOfAny($classes, $message = ''): static
    {
        $this->used = true;

        Base::isInstanceOfAny($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array<object|string> $classes
     * @param string $message
     *
     * @see Base::nullOrIsInstanceOfAny
     */
    public function nullOrIsInstanceOfAny($classes, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isInstanceOfAny($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array<object|string> $classes
     * @param string $message
     *
     * @see Base::allIsInstanceOfAny
     */
    public function allIsInstanceOfAny($classes, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isInstanceOfAny(...$args)
        );
    }

    /**
     * @param array<object|string> $classes
     * @param string $message
     *
     * @see Base::allNullOrIsInstanceOfAny
     */
    public function allNullOrIsInstanceOfAny($classes, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsInstanceOfAny(...$args)
        );
    }

    // endregion [ Base::isInstanceOfAny ]

    // region [ Base::isIterable ]

    /**
     * @param string $message
     *
     * @see Base::isIterable
     */
    public function isIterable($message = ''): static
    {
        $this->used = true;

        Base::isIterable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsIterable
     */
    public function nullOrIsIterable($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isIterable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsIterable
     */
    public function allIsIterable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isIterable(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsIterable
     */
    public function allNullOrIsIterable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsIterable(...$args)
        );
    }

    // endregion [ Base::isIterable ]

    // region [ Base::isList ]

    /**
     * @param string $message
     *
     * @see Base::isList
     */
    public function isList($message = ''): static
    {
        $this->used = true;

        Base::isList($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsList
     */
    public function nullOrIsList($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isList($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsList
     */
    public function allIsList($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isList(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsList
     */
    public function allNullOrIsList($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsList(...$args)
        );
    }

    // endregion [ Base::isList ]

    // region [ Base::isMap ]

    /**
     * @param string $message
     *
     * @see Base::isMap
     */
    public function isMap($message = ''): static
    {
        $this->used = true;

        Base::isMap($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsMap
     */
    public function nullOrIsMap($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isMap($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsMap
     */
    public function allIsMap($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isMap(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsMap
     */
    public function allNullOrIsMap($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsMap(...$args)
        );
    }

    // endregion [ Base::isMap ]

    // region [ Base::isNonEmptyList ]

    /**
     * @param string $message
     *
     * @see Base::isNonEmptyList
     */
    public function isNonEmptyList($message = ''): static
    {
        $this->used = true;

        Base::isNonEmptyList($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsNonEmptyList
     */
    public function nullOrIsNonEmptyList($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isNonEmptyList($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsNonEmptyList
     */
    public function allIsNonEmptyList($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isNonEmptyList(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsNonEmptyList
     */
    public function allNullOrIsNonEmptyList($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsNonEmptyList(...$args)
        );
    }

    // endregion [ Base::isNonEmptyList ]

    // region [ Base::isNonEmptyMap ]

    /**
     * @param string $message
     *
     * @see Base::isNonEmptyMap
     */
    public function isNonEmptyMap($message = ''): static
    {
        $this->used = true;

        Base::isNonEmptyMap($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrIsNonEmptyMap
     */
    public function nullOrIsNonEmptyMap($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isNonEmptyMap($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allIsNonEmptyMap
     */
    public function allIsNonEmptyMap($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isNonEmptyMap(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrIsNonEmptyMap
     */
    public function allNullOrIsNonEmptyMap($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsNonEmptyMap(...$args)
        );
    }

    // endregion [ Base::isNonEmptyMap ]

    // region [ Base::isNotA ]

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::isNotA
     */
    public function isNotA($class, $message = ''): static
    {
        $this->used = true;

        Base::isNotA($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::nullOrIsNotA
     */
    public function nullOrIsNotA($class, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::isNotA($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::allIsNotA
     */
    public function allIsNotA($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->isNotA(...$args)
        );
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::allNullOrIsNotA
     */
    public function allNullOrIsNotA($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrIsNotA(...$args)
        );
    }

    // endregion [ Base::isNotA ]

    // region [ Base::keyExists ]

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::keyExists
     */
    public function keyExists($key, $message = ''): static
    {
        $this->used = true;

        Base::keyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::nullOrKeyExists
     */
    public function nullOrKeyExists($key, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::keyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::allKeyExists
     */
    public function allKeyExists($key, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->keyExists(...$args)
        );
    }

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::allNullOrKeyExists
     */
    public function allNullOrKeyExists($key, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrKeyExists(...$args)
        );
    }

    // endregion [ Base::keyExists ]

    // region [ Base::keyNotExists ]

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::keyNotExists
     */
    public function keyNotExists($key, $message = ''): static
    {
        $this->used = true;

        Base::keyNotExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::nullOrKeyNotExists
     */
    public function nullOrKeyNotExists($key, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::keyNotExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::allKeyNotExists
     */
    public function allKeyNotExists($key, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->keyNotExists(...$args)
        );
    }

    /**
     * @param string|int $key
     * @param string $message
     *
     * @see Base::allNullOrKeyNotExists
     */
    public function allNullOrKeyNotExists($key, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrKeyNotExists(...$args)
        );
    }

    // endregion [ Base::keyNotExists ]

    // region [ Base::keysExists ]

    /**
     * @param array $keys
     * @param string $message
     *
     * @see Base::keysExists
     */
    public function keysExists($keys, $message = ''): static
    {
        $this->used = true;

        Base::keysExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array $keys
     * @param string $message
     *
     * @see Base::nullOrKeysExists
     */
    public function nullOrKeysExists($keys, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::keysExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array $keys
     * @param string $message
     *
     * @see Base::allKeysExists
     */
    public function allKeysExists($keys, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->keysExists(...$args)
        );
    }

    /**
     * @param array $keys
     * @param string $message
     *
     * @see Base::allNullOrKeysExists
     */
    public function allNullOrKeysExists($keys, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrKeysExists(...$args)
        );
    }

    // endregion [ Base::keysExists ]

    // region [ Base::length ]

    /**
     * @param int $length
     * @param string $message
     *
     * @see Base::length
     */
    public function length($length, $message = ''): static
    {
        $this->used = true;

        Base::length($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int $length
     * @param string $message
     *
     * @see Base::nullOrLength
     */
    public function nullOrLength($length, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::length($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int $length
     * @param string $message
     *
     * @see Base::allLength
     */
    public function allLength($length, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->length(...$args)
        );
    }

    /**
     * @param int $length
     * @param string $message
     *
     * @see Base::allNullOrLength
     */
    public function allNullOrLength($length, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrLength(...$args)
        );
    }

    // endregion [ Base::length ]

    // region [ Base::lengthBetween ]

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::lengthBetween
     */
    public function lengthBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        Base::lengthBetween($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::nullOrLengthBetween
     */
    public function nullOrLengthBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::lengthBetween($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allLengthBetween
     */
    public function allLengthBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->lengthBetween(...$args)
        );
    }

    /**
     * @param int|float $min
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allNullOrLengthBetween
     */
    public function allNullOrLengthBetween($min, $max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrLengthBetween(...$args)
        );
    }

    // endregion [ Base::lengthBetween ]

    // region [ Base::lessThan ]

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::lessThan
     */
    public function lessThan($limit, $message = ''): static
    {
        $this->used = true;

        Base::lessThan($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::nullOrLessThan
     */
    public function nullOrLessThan($limit, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::lessThan($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allLessThan
     */
    public function allLessThan($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->lessThan(...$args)
        );
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allNullOrLessThan
     */
    public function allNullOrLessThan($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrLessThan(...$args)
        );
    }

    // endregion [ Base::lessThan ]

    // region [ Base::lessThanEq ]

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::lessThanEq
     */
    public function lessThanEq($limit, $message = ''): static
    {
        $this->used = true;

        Base::lessThanEq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::nullOrLessThanEq
     */
    public function nullOrLessThanEq($limit, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::lessThanEq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allLessThanEq
     */
    public function allLessThanEq($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->lessThanEq(...$args)
        );
    }

    /**
     * @param mixed $limit
     * @param string $message
     *
     * @see Base::allNullOrLessThanEq
     */
    public function allNullOrLessThanEq($limit, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrLessThanEq(...$args)
        );
    }

    // endregion [ Base::lessThanEq ]

    // region [ Base::lower ]

    /**
     * @param string $message
     *
     * @see Base::lower
     */
    public function lower($message = ''): static
    {
        $this->used = true;

        Base::lower($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrLower
     */
    public function nullOrLower($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::lower($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allLower
     */
    public function allLower($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->lower(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrLower
     */
    public function allNullOrLower($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrLower(...$args)
        );
    }

    // endregion [ Base::lower ]

    // region [ Base::maxCount ]

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::maxCount
     */
    public function maxCount($max, $message = ''): static
    {
        $this->used = true;

        Base::maxCount($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::nullOrMaxCount
     */
    public function nullOrMaxCount($max, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::maxCount($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allMaxCount
     */
    public function allMaxCount($max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->maxCount(...$args)
        );
    }

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allNullOrMaxCount
     */
    public function allNullOrMaxCount($max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrMaxCount(...$args)
        );
    }

    // endregion [ Base::maxCount ]

    // region [ Base::maxLength ]

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::maxLength
     */
    public function maxLength($max, $message = ''): static
    {
        $this->used = true;

        Base::maxLength($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::nullOrMaxLength
     */
    public function nullOrMaxLength($max, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::maxLength($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allMaxLength
     */
    public function allMaxLength($max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->maxLength(...$args)
        );
    }

    /**
     * @param int|float $max
     * @param string $message
     *
     * @see Base::allNullOrMaxLength
     */
    public function allNullOrMaxLength($max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrMaxLength(...$args)
        );
    }

    // endregion [ Base::maxLength ]

    // region [ Base::methodExists ]

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::methodExists
     */
    public function methodExists($method, $message = ''): static
    {
        $this->used = true;

        Base::methodExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::nullOrMethodExists
     */
    public function nullOrMethodExists($method, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::methodExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::allMethodExists
     */
    public function allMethodExists($method, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->methodExists(...$args)
        );
    }

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::allNullOrMethodExists
     */
    public function allNullOrMethodExists($method, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrMethodExists(...$args)
        );
    }

    // endregion [ Base::methodExists ]

    // region [ Base::methodNotExists ]

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::methodNotExists
     */
    public function methodNotExists($method, $message = ''): static
    {
        $this->used = true;

        Base::methodNotExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::nullOrMethodNotExists
     */
    public function nullOrMethodNotExists($method, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::methodNotExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::allMethodNotExists
     */
    public function allMethodNotExists($method, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->methodNotExists(...$args)
        );
    }

    /**
     * @param mixed $method
     * @param string $message
     *
     * @see Base::allNullOrMethodNotExists
     */
    public function allNullOrMethodNotExists($method, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrMethodNotExists(...$args)
        );
    }

    // endregion [ Base::methodNotExists ]

    // region [ Base::minCount ]

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::minCount
     */
    public function minCount($min, $message = ''): static
    {
        $this->used = true;

        Base::minCount($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::nullOrMinCount
     */
    public function nullOrMinCount($min, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::minCount($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::allMinCount
     */
    public function allMinCount($min, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->minCount(...$args)
        );
    }

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::allNullOrMinCount
     */
    public function allNullOrMinCount($min, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrMinCount(...$args)
        );
    }

    // endregion [ Base::minCount ]

    // region [ Base::minLength ]

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::minLength
     */
    public function minLength($min, $message = ''): static
    {
        $this->used = true;

        Base::minLength($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::nullOrMinLength
     */
    public function nullOrMinLength($min, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::minLength($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::allMinLength
     */
    public function allMinLength($min, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->minLength(...$args)
        );
    }

    /**
     * @param int|float $min
     * @param string $message
     *
     * @see Base::allNullOrMinLength
     */
    public function allNullOrMinLength($min, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrMinLength(...$args)
        );
    }

    // endregion [ Base::minLength ]

    // region [ Base::natural ]

    /**
     * @param string $message
     *
     * @see Base::natural
     */
    public function natural($message = ''): static
    {
        $this->used = true;

        Base::natural($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrNatural
     */
    public function nullOrNatural($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::natural($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNatural
     */
    public function allNatural($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->natural(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrNatural
     */
    public function allNullOrNatural($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNatural(...$args)
        );
    }

    // endregion [ Base::natural ]

    // region [ Base::notContains ]

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::notContains
     */
    public function notContains($subString, $message = ''): static
    {
        $this->used = true;

        Base::notContains($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::nullOrNotContains
     */
    public function nullOrNotContains($subString, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notContains($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::allNotContains
     */
    public function allNotContains($subString, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notContains(...$args)
        );
    }

    /**
     * @param string $subString
     * @param string $message
     *
     * @see Base::allNullOrNotContains
     */
    public function allNullOrNotContains($subString, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotContains(...$args)
        );
    }

    // endregion [ Base::notContains ]

    // region [ Base::notEmpty ]

    /**
     * @param string $message
     *
     * @see Base::notEmpty
     */
    public function notEmpty($message = ''): static
    {
        $this->used = true;

        Base::notEmpty($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrNotEmpty
     */
    public function nullOrNotEmpty($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notEmpty($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNotEmpty
     */
    public function allNotEmpty($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notEmpty(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrNotEmpty
     */
    public function allNullOrNotEmpty($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotEmpty(...$args)
        );
    }

    // endregion [ Base::notEmpty ]

    // region [ Base::notEndsWith ]

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::notEndsWith
     */
    public function notEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        Base::notEndsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::nullOrNotEndsWith
     */
    public function nullOrNotEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notEndsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::allNotEndsWith
     */
    public function allNotEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notEndsWith(...$args)
        );
    }

    /**
     * @param string $suffix
     * @param string $message
     *
     * @see Base::allNullOrNotEndsWith
     */
    public function allNullOrNotEndsWith($suffix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotEndsWith(...$args)
        );
    }

    // endregion [ Base::notEndsWith ]

    // region [ Base::notEq ]

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::notEq
     */
    public function notEq($expect, $message = ''): static
    {
        $this->used = true;

        Base::notEq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::nullOrNotEq
     */
    public function nullOrNotEq($expect, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notEq($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allNotEq
     */
    public function allNotEq($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notEq(...$args)
        );
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allNullOrNotEq
     */
    public function allNullOrNotEq($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotEq(...$args)
        );
    }

    // endregion [ Base::notEq ]

    // region [ Base::notFalse ]

    /**
     * @param string $message
     *
     * @see Base::notFalse
     */
    public function notFalse($message = ''): static
    {
        $this->used = true;

        Base::notFalse($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrNotFalse
     */
    public function nullOrNotFalse($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notFalse($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNotFalse
     */
    public function allNotFalse($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notFalse(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrNotFalse
     */
    public function allNullOrNotFalse($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotFalse(...$args)
        );
    }

    // endregion [ Base::notFalse ]

    // region [ Base::notInstanceOf ]

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::notInstanceOf
     */
    public function notInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        Base::notInstanceOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::nullOrNotInstanceOf
     */
    public function nullOrNotInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notInstanceOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::allNotInstanceOf
     */
    public function allNotInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notInstanceOf(...$args)
        );
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::allNullOrNotInstanceOf
     */
    public function allNullOrNotInstanceOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotInstanceOf(...$args)
        );
    }

    // endregion [ Base::notInstanceOf ]

    // region [ Base::notNull ]

    /**
     * @param string $message
     *
     * @see Base::notNull
     */
    public function notNull($message = ''): static
    {
        $this->used = true;

        Base::notNull($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrNotNull
     */
    public function nullOrNotNull($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notNull($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNotNull
     */
    public function allNotNull($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notNull(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrNotNull
     */
    public function allNullOrNotNull($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotNull(...$args)
        );
    }

    // endregion [ Base::notNull ]

    // region [ Base::notRegex ]

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::notRegex
     */
    public function notRegex($pattern, $message = ''): static
    {
        $this->used = true;

        Base::notRegex($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::nullOrNotRegex
     */
    public function nullOrNotRegex($pattern, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notRegex($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::allNotRegex
     */
    public function allNotRegex($pattern, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notRegex(...$args)
        );
    }

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::allNullOrNotRegex
     */
    public function allNullOrNotRegex($pattern, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotRegex(...$args)
        );
    }

    // endregion [ Base::notRegex ]

    // region [ Base::notSame ]

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::notSame
     */
    public function notSame($expect, $message = ''): static
    {
        $this->used = true;

        Base::notSame($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::nullOrNotSame
     */
    public function nullOrNotSame($expect, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notSame($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allNotSame
     */
    public function allNotSame($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notSame(...$args)
        );
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allNullOrNotSame
     */
    public function allNullOrNotSame($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotSame(...$args)
        );
    }

    // endregion [ Base::notSame ]

    // region [ Base::notStartsWith ]

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::notStartsWith
     */
    public function notStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        Base::notStartsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::nullOrNotStartsWith
     */
    public function nullOrNotStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notStartsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::allNotStartsWith
     */
    public function allNotStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notStartsWith(...$args)
        );
    }

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::allNullOrNotStartsWith
     */
    public function allNullOrNotStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotStartsWith(...$args)
        );
    }

    // endregion [ Base::notStartsWith ]

    // region [ Base::notWhitespaceOnly ]

    /**
     * @param string $message
     *
     * @see Base::notWhitespaceOnly
     */
    public function notWhitespaceOnly($message = ''): static
    {
        $this->used = true;

        Base::notWhitespaceOnly($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrNotWhitespaceOnly
     */
    public function nullOrNotWhitespaceOnly($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::notWhitespaceOnly($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNotWhitespaceOnly
     */
    public function allNotWhitespaceOnly($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->notWhitespaceOnly(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrNotWhitespaceOnly
     */
    public function allNullOrNotWhitespaceOnly($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNotWhitespaceOnly(...$args)
        );
    }

    // endregion [ Base::notWhitespaceOnly ]

    // region [ Base::null ]

    /**
     * @param string $message
     *
     * @see Base::null
     */
    public function null($message = ''): static
    {
        $this->used = true;

        Base::null($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNull
     */
    public function allNull($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->null(...$args)
        );
    }

    // endregion [ Base::null ]

    // region [ Base::numeric ]

    /**
     * @param string $message
     *
     * @see Base::numeric
     */
    public function numeric($message = ''): static
    {
        $this->used = true;

        Base::numeric($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrNumeric
     */
    public function nullOrNumeric($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::numeric($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allNumeric
     */
    public function allNumeric($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->numeric(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrNumeric
     */
    public function allNullOrNumeric($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrNumeric(...$args)
        );
    }

    // endregion [ Base::numeric ]

    // region [ Base::object ]

    /**
     * @param string $message
     *
     * @see Base::object
     */
    public function object($message = ''): static
    {
        $this->used = true;

        Base::object($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrObject
     */
    public function nullOrObject($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::object($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allObject
     */
    public function allObject($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->object(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrObject
     */
    public function allNullOrObject($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrObject(...$args)
        );
    }

    // endregion [ Base::object ]

    // region [ Base::oneOf ]

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::oneOf
     */
    public function oneOf($values, $message = ''): static
    {
        $this->used = true;

        Base::oneOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::nullOrOneOf
     */
    public function nullOrOneOf($values, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::oneOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::allOneOf
     */
    public function allOneOf($values, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->oneOf(...$args)
        );
    }

    /**
     * @param array $values
     * @param string $message
     *
     * @see Base::allNullOrOneOf
     */
    public function allNullOrOneOf($values, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrOneOf(...$args)
        );
    }

    // endregion [ Base::oneOf ]

    // region [ Base::positiveInteger ]

    /**
     * @param string $message
     *
     * @see Base::positiveInteger
     */
    public function positiveInteger($message = ''): static
    {
        $this->used = true;

        Base::positiveInteger($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrPositiveInteger
     */
    public function nullOrPositiveInteger($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::positiveInteger($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allPositiveInteger
     */
    public function allPositiveInteger($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->positiveInteger(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrPositiveInteger
     */
    public function allNullOrPositiveInteger($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrPositiveInteger(...$args)
        );
    }

    // endregion [ Base::positiveInteger ]

    // region [ Base::privatePropertyExists ]

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::privatePropertyExists
     */
    public function privatePropertyExists($name, $message = ''): static
    {
        $this->used = true;

        Base::privatePropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::nullOrPrivatePropertyExists
     */
    public function nullOrPrivatePropertyExists($name, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::privatePropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allPrivatePropertyExists
     */
    public function allPrivatePropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->privatePropertyExists(...$args)
        );
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allNullOrPrivatePropertyExists
     */
    public function allNullOrPrivatePropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrPrivatePropertyExists(...$args)
        );
    }

    // endregion [ Base::privatePropertyExists ]

    // region [ Base::propertyExists ]

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::propertyExists
     */
    public function propertyExists($property, $message = ''): static
    {
        $this->used = true;

        Base::propertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::nullOrPropertyExists
     */
    public function nullOrPropertyExists($property, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::propertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::allPropertyExists
     */
    public function allPropertyExists($property, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->propertyExists(...$args)
        );
    }

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::allNullOrPropertyExists
     */
    public function allNullOrPropertyExists($property, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrPropertyExists(...$args)
        );
    }

    // endregion [ Base::propertyExists ]

    // region [ Base::propertyNotExists ]

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::propertyNotExists
     */
    public function propertyNotExists($property, $message = ''): static
    {
        $this->used = true;

        Base::propertyNotExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::nullOrPropertyNotExists
     */
    public function nullOrPropertyNotExists($property, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::propertyNotExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::allPropertyNotExists
     */
    public function allPropertyNotExists($property, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->propertyNotExists(...$args)
        );
    }

    /**
     * @param mixed $property
     * @param string $message
     *
     * @see Base::allNullOrPropertyNotExists
     */
    public function allNullOrPropertyNotExists($property, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrPropertyNotExists(...$args)
        );
    }

    // endregion [ Base::propertyNotExists ]

    // region [ Base::protectedPropertyExists ]

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::protectedPropertyExists
     */
    public function protectedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        Base::protectedPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::nullOrProtectedPropertyExists
     */
    public function nullOrProtectedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::protectedPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allProtectedPropertyExists
     */
    public function allProtectedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->protectedPropertyExists(...$args)
        );
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allNullOrProtectedPropertyExists
     */
    public function allNullOrProtectedPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrProtectedPropertyExists(...$args)
        );
    }

    // endregion [ Base::protectedPropertyExists ]

    // region [ Base::publicPropertyExists ]

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::publicPropertyExists
     */
    public function publicPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        Base::publicPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::nullOrPublicPropertyExists
     */
    public function nullOrPublicPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::publicPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allPublicPropertyExists
     */
    public function allPublicPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->publicPropertyExists(...$args)
        );
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allNullOrPublicPropertyExists
     */
    public function allNullOrPublicPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrPublicPropertyExists(...$args)
        );
    }

    // endregion [ Base::publicPropertyExists ]

    // region [ Base::range ]

    /**
     * @param mixed $min
     * @param mixed $max
     * @param string $message
     *
     * @see Base::range
     */
    public function range($min, $max, $message = ''): static
    {
        $this->used = true;

        Base::range($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $min
     * @param mixed $max
     * @param string $message
     *
     * @see Base::nullOrRange
     */
    public function nullOrRange($min, $max, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::range($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $min
     * @param mixed $max
     * @param string $message
     *
     * @see Base::allRange
     */
    public function allRange($min, $max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->range(...$args)
        );
    }

    /**
     * @param mixed $min
     * @param mixed $max
     * @param string $message
     *
     * @see Base::allNullOrRange
     */
    public function allNullOrRange($min, $max, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrRange(...$args)
        );
    }

    // endregion [ Base::range ]

    // region [ Base::readable ]

    /**
     * @param string $message
     *
     * @see Base::readable
     */
    public function readable($message = ''): static
    {
        $this->used = true;

        Base::readable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrReadable
     */
    public function nullOrReadable($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::readable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allReadable
     */
    public function allReadable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->readable(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrReadable
     */
    public function allNullOrReadable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrReadable(...$args)
        );
    }

    // endregion [ Base::readable ]

    // region [ Base::regex ]

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::regex
     */
    public function regex($pattern, $message = ''): static
    {
        $this->used = true;

        Base::regex($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::nullOrRegex
     */
    public function nullOrRegex($pattern, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::regex($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::allRegex
     */
    public function allRegex($pattern, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->regex(...$args)
        );
    }

    /**
     * @param string $pattern
     * @param string $message
     *
     * @see Base::allNullOrRegex
     */
    public function allNullOrRegex($pattern, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrRegex(...$args)
        );
    }

    // endregion [ Base::regex ]

    // region [ Base::resource ]

    /**
     * @param string|null $type
     * @param string $message
     *
     * @see Base::resource
     */
    public function resource($type = null, $message = ''): static
    {
        $this->used = true;

        Base::resource($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|null $type
     * @param string $message
     *
     * @see Base::nullOrResource
     */
    public function nullOrResource($type = null, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::resource($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|null $type
     * @param string $message
     *
     * @see Base::allResource
     */
    public function allResource($type = null, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->resource(...$args)
        );
    }

    /**
     * @param string|null $type
     * @param string $message
     *
     * @see Base::allNullOrResource
     */
    public function allNullOrResource($type = null, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrResource(...$args)
        );
    }

    // endregion [ Base::resource ]

    // region [ Base::same ]

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::same
     */
    public function same($expect, $message = ''): static
    {
        $this->used = true;

        Base::same($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::nullOrSame
     */
    public function nullOrSame($expect, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::same($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allSame
     */
    public function allSame($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->same(...$args)
        );
    }

    /**
     * @param mixed $expect
     * @param string $message
     *
     * @see Base::allNullOrSame
     */
    public function allNullOrSame($expect, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrSame(...$args)
        );
    }

    // endregion [ Base::same ]

    // region [ Base::scalar ]

    /**
     * @param string $message
     *
     * @see Base::scalar
     */
    public function scalar($message = ''): static
    {
        $this->used = true;

        Base::scalar($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrScalar
     */
    public function nullOrScalar($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::scalar($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allScalar
     */
    public function allScalar($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->scalar(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrScalar
     */
    public function allNullOrScalar($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrScalar(...$args)
        );
    }

    // endregion [ Base::scalar ]

    // region [ Base::startsWith ]

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::startsWith
     */
    public function startsWith($prefix, $message = ''): static
    {
        $this->used = true;

        Base::startsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::nullOrStartsWith
     */
    public function nullOrStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::startsWith($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::allStartsWith
     */
    public function allStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->startsWith(...$args)
        );
    }

    /**
     * @param string $prefix
     * @param string $message
     *
     * @see Base::allNullOrStartsWith
     */
    public function allNullOrStartsWith($prefix, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrStartsWith(...$args)
        );
    }

    // endregion [ Base::startsWith ]

    // region [ Base::startsWithLetter ]

    /**
     * @param string $message
     *
     * @see Base::startsWithLetter
     */
    public function startsWithLetter($message = ''): static
    {
        $this->used = true;

        Base::startsWithLetter($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrStartsWithLetter
     */
    public function nullOrStartsWithLetter($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::startsWithLetter($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allStartsWithLetter
     */
    public function allStartsWithLetter($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->startsWithLetter(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrStartsWithLetter
     */
    public function allNullOrStartsWithLetter($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrStartsWithLetter(...$args)
        );
    }

    // endregion [ Base::startsWithLetter ]

    // region [ Base::staticPropertyExists ]

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::staticPropertyExists
     */
    public function staticPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        Base::staticPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::nullOrStaticPropertyExists
     */
    public function nullOrStaticPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::staticPropertyExists($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allStaticPropertyExists
     */
    public function allStaticPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->staticPropertyExists(...$args)
        );
    }

    /**
     * @param string $name
     * @param string $message
     *
     * @see Base::allNullOrStaticPropertyExists
     */
    public function allNullOrStaticPropertyExists($name, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrStaticPropertyExists(...$args)
        );
    }

    // endregion [ Base::staticPropertyExists ]

    // region [ Base::string ]

    /**
     * @param string $message
     *
     * @see Base::string
     */
    public function string($message = ''): static
    {
        $this->used = true;

        Base::string($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrString
     */
    public function nullOrString($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::string($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allString
     */
    public function allString($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->string(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrString
     */
    public function allNullOrString($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrString(...$args)
        );
    }

    // endregion [ Base::string ]

    // region [ Base::stringNotEmpty ]

    /**
     * @param string $message
     *
     * @see Base::stringNotEmpty
     */
    public function stringNotEmpty($message = ''): static
    {
        $this->used = true;

        Base::stringNotEmpty($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrStringNotEmpty
     */
    public function nullOrStringNotEmpty($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::stringNotEmpty($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allStringNotEmpty
     */
    public function allStringNotEmpty($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->stringNotEmpty(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrStringNotEmpty
     */
    public function allNullOrStringNotEmpty($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrStringNotEmpty(...$args)
        );
    }

    // endregion [ Base::stringNotEmpty ]

    // region [ Base::subclassOf ]

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::subclassOf
     */
    public function subclassOf($class, $message = ''): static
    {
        $this->used = true;

        Base::subclassOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::nullOrSubclassOf
     */
    public function nullOrSubclassOf($class, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::subclassOf($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::allSubclassOf
     */
    public function allSubclassOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->subclassOf(...$args)
        );
    }

    /**
     * @param string|object $class
     * @param string $message
     *
     * @see Base::allNullOrSubclassOf
     */
    public function allNullOrSubclassOf($class, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrSubclassOf(...$args)
        );
    }

    // endregion [ Base::subclassOf ]

    // region [ Base::throws ]

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::throws
     */
    public function throws($class = 'Exception', $message = ''): static
    {
        $this->used = true;

        Base::throws($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::nullOrThrows
     */
    public function nullOrThrows($class = 'Exception', $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::throws($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::allThrows
     */
    public function allThrows($class = 'Exception', $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->throws(...$args)
        );
    }

    /**
     * @param string $class
     * @param string $message
     *
     * @see Base::allNullOrThrows
     */
    public function allNullOrThrows($class = 'Exception', $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrThrows(...$args)
        );
    }

    // endregion [ Base::throws ]

    // region [ Base::true ]

    /**
     * @param string $message
     *
     * @see Base::true
     */
    public function true($message = ''): static
    {
        $this->used = true;

        Base::true($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrTrue
     */
    public function nullOrTrue($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::true($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allTrue
     */
    public function allTrue($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->true(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrTrue
     */
    public function allNullOrTrue($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrTrue(...$args)
        );
    }

    // endregion [ Base::true ]

    // region [ Base::type ]

    /**
     * @param string $type
     * @param string $message
     *
     * @see Base::type
     */
    public function type($type, $message = ''): static
    {
        $this->used = true;

        Base::type($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @see Base::nullOrType
     */
    public function nullOrType($type, $message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::type($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @see Base::allType
     */
    public function allType($type, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->type(...$args)
        );
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @see Base::allNullOrType
     */
    public function allNullOrType($type, $message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrType(...$args)
        );
    }

    // endregion [ Base::type ]

    // region [ Base::unicodeLetters ]

    /**
     * @param string $message
     *
     * @see Base::unicodeLetters
     */
    public function unicodeLetters($message = ''): static
    {
        $this->used = true;

        Base::unicodeLetters($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrUnicodeLetters
     */
    public function nullOrUnicodeLetters($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::unicodeLetters($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allUnicodeLetters
     */
    public function allUnicodeLetters($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->unicodeLetters(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrUnicodeLetters
     */
    public function allNullOrUnicodeLetters($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrUnicodeLetters(...$args)
        );
    }

    // endregion [ Base::unicodeLetters ]

    // region [ Base::uniqueValues ]

    /**
     * @param string $message
     *
     * @see Base::uniqueValues
     */
    public function uniqueValues($message = ''): static
    {
        $this->used = true;

        Base::uniqueValues($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrUniqueValues
     */
    public function nullOrUniqueValues($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::uniqueValues($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allUniqueValues
     */
    public function allUniqueValues($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->uniqueValues(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrUniqueValues
     */
    public function allNullOrUniqueValues($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrUniqueValues(...$args)
        );
    }

    // endregion [ Base::uniqueValues ]

    // region [ Base::upper ]

    /**
     * @param string $message
     *
     * @see Base::upper
     */
    public function upper($message = ''): static
    {
        $this->used = true;

        Base::upper($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrUpper
     */
    public function nullOrUpper($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::upper($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allUpper
     */
    public function allUpper($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->upper(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrUpper
     */
    public function allNullOrUpper($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrUpper(...$args)
        );
    }

    // endregion [ Base::upper ]

    // region [ Base::uuid ]

    /**
     * @param string $message
     *
     * @see Base::uuid
     */
    public function uuid($message = ''): static
    {
        $this->used = true;

        Base::uuid($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrUuid
     */
    public function nullOrUuid($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::uuid($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allUuid
     */
    public function allUuid($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->uuid(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrUuid
     */
    public function allNullOrUuid($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrUuid(...$args)
        );
    }

    // endregion [ Base::uuid ]

    // region [ Base::validArrayKey ]

    /**
     * @param string $message
     *
     * @see Base::validArrayKey
     */
    public function validArrayKey($message = ''): static
    {
        $this->used = true;

        Base::validArrayKey($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrValidArrayKey
     */
    public function nullOrValidArrayKey($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::validArrayKey($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allValidArrayKey
     */
    public function allValidArrayKey($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->validArrayKey(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrValidArrayKey
     */
    public function allNullOrValidArrayKey($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrValidArrayKey(...$args)
        );
    }

    // endregion [ Base::validArrayKey ]

    // region [ Base::writable ]

    /**
     * @param string $message
     *
     * @see Base::writable
     */
    public function writable($message = ''): static
    {
        $this->used = true;

        Base::writable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::nullOrWritable
     */
    public function nullOrWritable($message = ''): static
    {
        $this->used = true;

        if ($this->value === null) {
            return $this;
        }

        Base::writable($this->value, ...func_get_args());

        return $this;
    }

    /**
     * @param string $message
     *
     * @see Base::allWritable
     */
    public function allWritable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->writable(...$args)
        );
    }

    /**
     * @param string $message
     *
     * @see Base::allNullOrWritable
     */
    public function allNullOrWritable($message = ''): static
    {
        $this->used = true;

        $args = func_get_args();

        return $this->each(
            fn (self $assert) => $assert->nullOrWritable(...$args)
        );
    }

    // endregion [ Base::writable ]


}
