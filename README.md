# Fluent Assert

This library is built upon [`webmozart/assert`](https://github.com/webmozarts/assert) and provides a fluent interface
for assertions, which allows for a more compact
set of assertions on the same value.

It is a useful tool for those who want to use `webmozart/assert` but prefer a more fluent interface.

Built with love ❤️

## Installation

Use [Composer](https://getcomposer.org/) to install the library.

```bash
composer require exeque/fluent-assert
```

## Differences

There are a few differences between this library and `webmozart/assert`:

- The `all*` methods don't use the source methods in `webmozart/assert`.
    - They work as you would expect, but they use `each()` internally to
      apply the assertions to each value. See [Iterative Assertions](#iterative-assertions).
- The exception throw on failures are different.
    - `\ExeQue\FluentAssert\Exceptions\InvalidArgumentException` is thrown on failures.
        - It extends `\Webmozart\Assert\InvalidArgumentException`.
    - `\ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException` is thrown on grouped assertions
        - It extends `\ExeQue\FluentAssert\Exceptions\InvalidArgumentException`.
        - It provides multiple exceptions in the `getExceptions()` method.
        - See [Grouped Assertions](#grouped-assertions).
    - `\ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException` is thrown on positional or iterative assertions
        - It extends `\ExeQue\FluentAssert\Exceptions\InvalidArgumentException`.
        - It provides the index of the failing assertion in the `getIndex()` method.
        - It provides the original message in the `getOriginalMessage()` method.
        - See [Positional Assertions](#positional-assertions) or [Iterative Assertions](#iterative-assertions).

## Example

```php
use ExeQue\FluentAssert\Assert;

$assert = Assert::for('foo bar');

// All methods from webmozart/assert are available
// The arguments are the same except for the first one (the value to assert).
$assert
    ->string()          // Webmozart/Assert::string(..., $message = '')
    ->startsWith('foo') // Webmozart/Assert::startsWith(..., $prefix, $message = '')
    ->endsWith('bar');  // Webmozart/Assert::endsWith(..., $suffix, $message = '')

// You can retrieve via the `value()` method.
$value = $assert->value(); // 'foo bar'
```

The [example](https://github.com/webmozarts/assert#example) from `webmozart/assert` can be rewritten as:

```php
use ExeQue\FluentAssert\Assert;

class Employee
{
    public function __construct($id)
    {
        Assert::for($id)
            ->integer('The employee ID must be an integer. Got: %s')
            ->greaterThan(0, 'The employee ID must be a positive integer. Got: %s');
    }
}

new Employee('foo bar');
// -> ExeQue\FluentAssert\Exceptions\InvalidArgumentException:
//    The employee ID must be an integer. Got: string

new Employee(-10);
// -> ExeQue\FluentAssert\Exceptions\InvalidArgumentException:
//    The employee ID must be a positive integer. Got: -10
```

### Grouped Assertions

The fluent interface provides a `and()` and `or()` method to group assertions.

This is useful when you want to make multiple assertions at once and a singular combined error.

```php
use ExeQue\FluentAssert\Assert;

$assert = Assert::for('fizz buzz');

// Using `and()` will throw an exception if any of the assertions fail.
// The errors will be combined into a single exception.
$assert->and(
    fn (Assert $assert) => $assert->startsWith('foo'),
    fn (Assert $assert) => $assert->endsWith('bar'),
);
// -> ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException:
//    Expected a value to start with "foo" (Got: "fizz buzz"), or expected a value to end with "bar" (Got: "fizz buzz").

// Using `or()` will only throw an exception if all the assertions fail.
// The errors will be combined into a single exception.
$assert->or(
    fn (Assert $assert) => $assert->startsWith('foo'),
    fn (Assert $assert) => $assert->startsWith('fizz'),
):
// -> Does not fail

$assert->or(
    fn (Assert $assert) => $assert->startsWith('foo'),
    fn (Assert $assert) => $assert->startsWith('bar'),
):
// -> ExeQue\FluentAssert\Exceptions\BulkInvalidArgumentException:
//    Expected a value to start with "foo" (Got: "fizz buzz"), or expected a value to start with "bar" (Got: "fizz buzz").
```

### Iterative Assertions

The `each()` method allows you to iterate over an array or an `ArrayAccess` object and apply assertions to each value.

The errors thrown will have a prefix of failing index applied.

```php
use ExeQue\FluentAssert\Assert;

$assert = Assert::for(['foo', 'bar', 'baz']);

$assert->each(
    fn (Assert $assert) => $assert->string()->length(3)
);

$assert->each(
    fn (Assert $assert) => $assert->inArray(['foo', 'bar'])
);
// -> ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException:
//    [2]: Expected one of: "foo", "bar". Got: "baz"
```

The `IndexedInvalidArgumentException` can provide the index that failed use `getIndex()` and the original message using
`getOriginalMessage()`.

An alternative version `eachKey` is available to apply assertions to the keys of an iterable.

### Positional Assertions

The `at()` method allows you to assert a value at a specific index in an array or an `ArrayAccess` object.

It automatically calls `keyExists()` on the index before applying the assertion.

The errors thrown will have a prefix of failing index applied.

```php
use ExeQue\FluentAssert\Assert;

// Works with integer indices
$assert = Assert::for(['foo', 'bar', 'baz']);
$assert->at(0, fn (Assert $assert) => $assert->eq('foo'));

// Works with string indices
$assert = Assert::for(['foo' => 'bar', 'baz' => 'qux']);
$assert->at('baz', fn (Assert $assert) => $assert->eq('qux'));

$assert = Assert::for(['foo' => 'bar']);
$assert->at('foo', fn (Assert $assert) => $assert->eq('fizz'));
// -> ExeQue\FluentAssert\Exceptions\IndexedInvalidArgumentException:
//    [foo]: Expected a value equal to "fizz". Got: "bar"
```

### Conditional Assertions

Sometimes you only want to apply certain assertions if a condition is met or not. The `when()` method allows you to do
this.

```php
use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\ConditionAssert;

$assert = Assert::for(['foo', 'bar', 'baz']);

// The `when()` method takes a callable that may return a boolean value
// or a `ConditionAssert` object.
$assert->when(
    // Any truthy value will be considered true
    condition: fn (Assert $assert) => true,
    // [Required] Assertions to apply if the condition is true 
    then: fn (Assert $assert) => null,
    // [Optional] Assertions to apply if the condition is false
    otherwise: fn (Assert $assert) => null,
);

// If the condition uses the `Assert` provided as an argument and
// returns null (or nothing) and the inner assertion did not fail,
// then that is considered true.

$assert = Assert::for('foo bar');

$assert->when(
    function (Assert $assert) {
        $assert->string(); // Returns nothing
    },
    fn(Assert $assert) => null, // Is called
);

$assert->when(
    function (Assert $assert) {
        $assert->string();
        
        return null;
    },
    fn(Assert $assert) => null, // Is called
);

$assert->when(
    function (Assert $assert) {
        $assert->isArray();
    },
    fn(Assert $assert) => null, // Is not called
    fn(Assert $assert) => null, // Is called
);



```

### Inverted Assertions

The `not()` method allows you to invert the assertion. This is useful when the assertions MUST fail.

```php
use ExeQue\FluentAssert\Assert;

$assert = Assert::for([1, 2, 3, 4]);

$assert->not(
    fn (Assert $assert) => $assert->arrayContains(3),
    'Input cannot contain the number 3'
);
```

## Assertions

All assertions from `webmozart/assert` are available. See [here](https://github.com/webmozarts/assert#assertions)

An extended implementation of `webmozart/assert` is available in the `ExeQue\FluentAssert\Base` class.

The following additional assertions are available:

| Method                                                                | Description                                                          |
|-----------------------------------------------------------------------|----------------------------------------------------------------------|
| `hasIndices($value, string $message = '')`                            | Check that a value has indices (array or ArrayAccess)                |
| `arrayContains($array, mixed $value, string $message = '')`           | Check that a value contains another value                            |
| `type($value, string $type, string $message = '')`                    | Check that a value is of a certain type (using `get_debug_type()`)   |
| `publicPropertyExists($value, string $name, string $message = '')`    | Check that a value has a public property                             | 
| `protectedPropertyExists($value, string $name, string $message = '')` | Check that a value has a protected property                          |
| `privatePropertyExists($value, string $name, string $message = '')`   | Check that a value has a private property                            |
| `staticPropertyExists($value, string $name, string $message = '')`    | Check that a value has a static property                             |
| `instancedPropertyExists($value, string $name, string $message = '')` | Check that a value has an instanced property                         |
| `enumCaseExists($value, string $enumClass, string $message = '')`     | Check that a value is a case in an enum                              |
| `enumValueExists($value, string $enumClass, string $message = '')`    | Check that a value is a value in an enum                             |
| `keysExists($value, array $keys, string $message = '')`               | Check that a value has all the specified keys (array or ArrayAccess) |
| `nullOr($value, callable $callback)`                                  | Execute the callback if the value is not null                        |
| `fulfills($value, callable $callback, string $message = '')`          | Check that a value fulfills a custom condition                       |

## Development

The library uses code generation to create definitions for all methods present in `webmozart/assert`.

To trigger the generation run:

```bash
composer build
```

## Testing

You can run the tests using the following command:

```bash
composer test
```

## License

This library is open-sourced software licensed under the [MIT license](LICENSE.md).

## Appreciation

Big thanks to Bernard Schussek (and community) for the `webmozart/assert`.

It is one of the first dependencies I include in any project and I use it extensively.
