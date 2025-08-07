<?php

declare(strict_types=1);

namespace ExeQue\FluentAssert\Commands;

use ExeQue\FluentAssert\Base;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use stdClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use function ExeQue\Dedent\dedent;

/**
 * @internal
 * @codeCoverageIgnore
 */
class GenerateMixin extends Command
{
    private string $output = '';

    public function __construct()
    {
        parent::__construct('generate:mixin');
    }

    protected function configure(): void
    {
        $this->addOption(
            name: 'output',
            mode: InputOption::VALUE_REQUIRED,
            description: 'The output file to generate',
            default: __DIR__ . '/../../src/Concerns/Mixin.php',
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $outputFile = $input->getOption('output');
        $className = basename($outputFile, '.php');

        $this->appendHeader($className);
        $this->appendMethods();

        $this->output .= "\n}\n";

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

    private function appendHeader(string $className): void
    {
        $this->output = <<<PHP
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
trait {$className}
{
PHP;
        $this->output .= "\n";
    }

    private function appendMethods(): void
    {
        $reflector = new ReflectionClass(Base::class);

        $shortAssertClass = $reflector->getShortName();

        $methods = $reflector->getMethods(ReflectionMethod::IS_STATIC);

        $methods = array_filter($methods, static function (ReflectionMethod $method) {
            $name = $method->getName();

            if (str_starts_with($name, 'all')) {
                return false;
            }

            if (str_starts_with($name, 'nullOr')) {
                return false;
            }

            return $method->isPublic() && str_starts_with($name, '__') === false;
        });

        usort($methods, function (ReflectionMethod $a, ReflectionMethod $b) {
            return $a->getName() <=> $b->getName();
        });

        foreach ($methods as $method) {
            if (str_contains($method->getDocComment(), '@deprecated')) {
                continue;
            }

            $parameters = $this->docblockParameters($method);
            $name = $method->getName();

            array_shift($parameters);

            $signature = '(';
            $signature .= implode(', ', array_map(static function (array $parameter) {
                $param = $parameter['name'];

                if ($parameter['default'] !== null) {
                    $default = $parameter['default'];

                    if ($default === 'NULL') {
                        $default = 'null';
                    }

                    $param .= " = $default";
                }

                return $param;
            }, $parameters));
            $signature .= ')';

            $functions = [
                'regionStart' => "// region [ $shortAssertClass::$name ]",
                'base'        => $this->getBaseFunctionContent($name, $parameters),
                'null'        => $this->getNullOrFunctionContent($name, $parameters),
                'all'         => $this->getAllFunctionContent($name, $parameters),
                'allornull'   => $this->getAllNullOrFunctionContent($name, $parameters),
                'regionEnd'   => "// endregion [ $shortAssertClass::$name ]",
            ];

            if ($name === 'null') {
                unset($functions['null'], $functions['allornull']);
            }

            foreach ($functions as $function) {
                $function = $this->indent(dedent($function), 4);

                $function = str_replace('%SIGNATURE%', $signature, $function);
                $this->output .= "$function\n\n";
            }
        }
    }

    private function docblockParameters(ReflectionMethod $method): array
    {
        $comment = $method->getDocComment();
        $params = $method->getParameters();
        $parameters = [];

        $lines = explode("\n", $comment);

        foreach ($lines as $line) {
            $line = trim($line);

            $line = preg_replace('/^\*\s+/', '', $line);

            if (str_starts_with($line, '@param')) {
                $line = trim(substr($line, strlen('@param')));

                $parts = preg_split('/\s+/', $line, 3);
                $type = array_shift($parts);
                $name = array_shift($parts);

                /** @var ?ReflectionParameter $param */
                $param = null;
                foreach ($params as $parameter) {
                    if ($parameter->getName() === substr($name, 1)) {
                        $param = $parameter;
                        break;
                    }
                }

                $default = new stdClass();
                if ($param?->isDefaultValueAvailable()) {
                    $default = var_export($param->getDefaultValue(), true);
                }

                $parameters[substr($name, 1)] = [
                    'type'    => $type,
                    'name'    => $name,
                    'default' => $default instanceof stdClass ? null : $default,
                ];
            }
        }

        return $parameters;
    }

    private function getBaseFunctionContent(string $name, array $parameters): string
    {
        $docComment = $this->makeDocComment($name, $parameters);

        $code = <<<PHP
            public function $name%SIGNATURE%: static
            {
                \$this->used = true;

                Base::{$name}(\$this->value, ...func_get_args());

                return \$this;
            }
        PHP;

        return "$docComment\n" . dedent($code);
    }

    private function getNullOrFunctionContent(string $name, array $parameters): string
    {
        $fullname = 'nullOr' . ucfirst($name);

        $docComment = $this->makeDocComment($fullname, $parameters);

        $code = <<<PHP
            public function $fullname%SIGNATURE%: static
            {
                \$this->used = true;

                if (\$this->value === null) {
                    return \$this;
                }

                Base::{$name}(\$this->value, ...func_get_args());

                return \$this;
            }
        PHP;

        return "$docComment\n" . dedent($code);
    }

    private function getAllFunctionContent(string $name, array $parameters): string
    {
        $fullname = 'all' . ucfirst($name);
        $docComment = $this->makeDocComment($fullname, $parameters);

        $code = <<<PHP
            public function $fullname%SIGNATURE%: static
            {
                \$this->used = true;

                \$args = func_get_args();

                return \$this->each(
                    fn (self \$assert) => \$assert->$name(...\$args)
                );
            }
        PHP;

        return "$docComment\n" . dedent($code);
    }

    private function getAllNullOrFunctionContent(string $name, array $parameters): string
    {
        $fullname = 'allNullOr' . ucfirst($name);
        $nullname = 'nullOr' . ucfirst($name);
        $docComment = $this->makeDocComment($fullname, $parameters);

        $code = <<<PHP
            public function $fullname%SIGNATURE%: static
            {
                \$this->used = true;

                \$args = func_get_args();

                return \$this->each(
                    fn (self \$assert) => \$assert->$nullname(...\$args)
                );
            }
        PHP;

        return "$docComment\n" . dedent($code);
    }

    private function indent(string $content, int $spaces = 4): string
    {
        $indent = str_repeat(' ', $spaces);

        return implode("\n", array_map(static function (string $line) use ($indent) {
            if ($line === '') {
                return $line;
            }

            return $indent . $line;
        }, explode("\n", $content)));
    }

    private function makeDocComment(string $see, array $parameters): string
    {
        $comment = [
            "/**",
        ];

        foreach ($parameters as $parameter) {
            $comment[] = " * @param {$parameter['type']} {$parameter['name']}";
        }
        $comment[] = ' *';
        $comment[] = " * @see Base::$see";

        $comment[] = " */";

        return implode("\n", $comment);
    }
}
