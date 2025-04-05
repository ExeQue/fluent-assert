<?php

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Base;

it('covers method in base asserter', function (string $method) {
    $assert = Assert::for('foo');

    $nodefault = 'NODEFAULT' . random_bytes(32);

    expect(method_exists($assert, $method))->toBeTrue();

    $parametersBuilder = static function (ReflectionMethod $method) use ($nodefault) {
        $parameters = [];
        foreach ($method->getParameters() as $parameter) {
            $name = $parameter->getName();
            $default = $nodefault;
            if ($parameter->isOptional()) {
                $default = $parameter->getDefaultValue();
            }
            $parameters[$name] = [
                'name'     => $name,
                'optional' => $parameter->isOptional(),
                'default'  => var_export($default, true),
            ];
        }

        return $parameters;
    };

    $baseParameters = $parametersBuilder(new ReflectionMethod(Base::class, $method));
    array_shift($baseParameters); // remove the first parameter which is always the $value parameter
    $assertParameters = $parametersBuilder(new ReflectionMethod(Assert::class, $method));

    expect($assertParameters)->toEqual($baseParameters);
})->with(function () {
    $base = new ReflectionClass(Base::class);
    $baseMethods = array_filter(
        $base->getMethods(),
        static function (ReflectionMethod $method) {
            if (str_starts_with($method->getName(), '__')) {
                return false;
            }

            if (str_contains($method->getDocComment(), '@deprecated')) {
                return false;
            }

            return $method->isStatic() && $method->isPublic();
        },
    );

    $names = array_map(
        static fn (ReflectionMethod $method) => $method->getName(),
        $baseMethods,
    );

    return array_combine(
        array_map(
            static fn (string $name) => $base->getName() . '::' . $name,
            $names,
        ),
        $names,
    );
});
