<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Commands;

use ExeQue\FluentAssert\Assert;
use ExeQue\FluentAssert\Proxies\Proxy;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionType;
use ReflectionNamedType;
use ReflectionUnionType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @internal
 * @codeCoverageIgnore
 */
class GenerateDocblockMixin extends Command
{
    private string $output = '';

    public function __construct()
    {
        parent::__construct('generate:docblock-mixin');
    }

    protected function configure(): void
    {
        $this->addOption(
            name: 'output',
            mode: InputOption::VALUE_REQUIRED,
            description: 'The output file to generate',
            default: __DIR__ . '/../../src/Concerns/DocblockMixin.php',
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $outputFile = $input->getOption('output');

        $this->buildDocblock();

        file_put_contents($outputFile, $this->output);
        $path = realpath($outputFile);

        $root = dirname(__DIR__, 2) . '/';

        $table = new Table($output);
        $table->setStyle('box');
        $table->setHeaders(
            ['<fg=green>Mixin generated successfully!</>: <fg=bright-white>' . str_replace($root, '', $path) . '</>'],
        );
        $table->render();

        return 0;
    }

    private function buildDocblock(): void
    {
        $reflector = new ReflectionClass(Assert::class);

        $methods = $reflector->getMethods(ReflectionMethod::IS_STATIC | ReflectionMethod::IS_PUBLIC);

        $methods = array_filter($methods, static function (ReflectionMethod $method) {
            $name = $method->getName();

            if ($method->isPrivate() || $method->isProtected()) {
                return false;
            }

            if ($method->isStatic()) {
                return false;
            }

            // Skip magic methods
            if (str_starts_with($name, '__')) {
                return false;
            }

            // Skip deprecated methods via docblock
            $doc = $method->getDocComment() ?: '';
            if (str_contains($doc, '@deprecated')) {
                return false;
            }

            if ($method->name === 'value') {
                return false;
            }

            // Skip methods that return Proxy types
            if ($return = $method->getReturnType()) {
                if ($return instanceof ReflectionNamedType) {
                    $types = [$return];
                } else {
                    $types = $return->getTypes();
                }

                $valid = true;
                foreach ($types as $type) {
                    if ($type->getName() !== 'static') {
                        $valid = false;
                        break;
                    }
                }

                if ($valid === false) {
                    return false;
                }
            }

            return true;
        });

        usort($methods, function (ReflectionMethod $a, ReflectionMethod $b) {
            return $a->getName() <=> $b->getName();
        });

        $methodsBlock = '';
        foreach ($methods as $method) {
            $return = $this->formatType($method->getReturnType());
            $params = $this->formatParameters($method->getParameters());

            $methodsBlock .= " * @method {$return} {$method->getName()}({$params})\n";
        }

        $methodNames = json_encode(array_map(fn (ReflectionMethod $m) => $m->getName(), $methods));

        $this->output = <<<PHP
<?php

declare(strict_types=1);

namespace ExeQue\\FluentAssert\\Concerns;

use BadMethodCallException;

/**
 * This file is auto-generated. Do not edit it manually.
 *
{$methodsBlock} *
 * @internal
 */
trait DocblockMixin
{
    protected array \$coveredMethods = {$methodNames};

    protected function assertMethodIsCovered(string \$name): bool
    {
        return in_array(\$name, \$this->coveredMethods, true);
    }

    protected function ensureAssertMethodIsCovered(string \$name): void
    {
        \$class = static::class;

        if (!\$this->assertMethodIsCovered(\$name)) {
            throw new BadMethodCallException("Call to undefined method \$class::\$name()");
        }
    }
}

PHP;
    }

    private function formatParameters(array $parameters): string
    {
        $parts = [];

        /** @var ReflectionParameter $parameter */
        foreach ($parameters as $parameter) {
            $part = '';

            $type = $parameter->getType();
            if ($type !== null) {
                $part .= $this->formatType($type) . ' ';
            }

            if ($parameter->isPassedByReference()) {
                $part .= '&';
            }

            if ($parameter->isVariadic()) {
                $part .= '...';
            }

            $part .= '$' . $parameter->getName();

            if ($parameter->isDefaultValueAvailable() && !$parameter->isVariadic()) {
                $default = $parameter->getDefaultValue();
                $part .= ' = ' . $this->exportDefaultValue($default);
            }

            $parts[] = $part;
        }

        return implode(', ', $parts);
    }

    private function formatType(?ReflectionType $type): string
    {
        if ($type === null) {
            return 'mixed';
        }

        if ($type instanceof ReflectionUnionType) {
            $names = array_map(function (ReflectionNamedType $t) {
                return $this->namedTypeToString($t);
            }, $type->getTypes());

            return implode('|', $names);
        }

        if ($type instanceof ReflectionNamedType) {
            return $this->namedTypeToString($type);
        }

        return 'mixed';
    }

    private function namedTypeToString(ReflectionNamedType $t): string
    {
        $name = $t->getName();

        // Normalize nullability for single named types
        if (!$t->isBuiltin() && $name[0] !== '\\') {
            $name = '\\' . $name;
        }

        if ($t->allowsNull() && $name !== 'mixed') {
            return $name . '|null';
        }

        return $name;
    }

    private function exportDefaultValue(mixed $value): string
    {
        if (is_string($value)) {
            return var_export($value, true);
        }

        if (is_array($value)) {
            return var_export($value, true);
        }

        if (is_null($value)) {
            return 'null';
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_int($value) || is_float($value)) {
            return (string)$value;
        }

        // Fallback to var_export for objects/constants, etc.
        return var_export($value, true);
    }
}
