<?php declare(strict_types=1);
/*
 * This file is part of sebastian/code-unit-reverse-lookup.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeUnitReverseLookup;

use function array_merge;
use function assert;
<<<<<<< HEAD
=======
use function class_exists;
use function function_exists;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function get_declared_classes;
use function get_declared_traits;
use function get_defined_functions;
use function is_array;
<<<<<<< HEAD
use function range;
use ReflectionClass;
use ReflectionFunction;
use ReflectionFunctionAbstract;
use ReflectionMethod;

/**
 * @since Class available since Release 1.0.0
 */
class Wizard
{
    /**
     * @var array
     */
    private $lookupTable = [];

    /**
     * @var array
     */
    private $processedClasses = [];

    /**
     * @var array
     */
    private $processedFunctions = [];

    /**
     * @param string $filename
     * @param int    $lineNumber
     *
     * @return string
     */
    public function lookup($filename, $lineNumber)
=======
use function is_int;
use function is_string;
use function range;
use function trait_exists;
use ReflectionClass;
use ReflectionFunction;
use ReflectionMethod;

final class Wizard
{
    /**
     * @var array<string, array<int, string>>
     */
    private array $lookupTable = [];

    /**
     * @var array<class-string, true>
     */
    private array $processedClasses = [];

    /**
     * @var array<string, true>
     */
    private array $processedFunctions = [];

    public function lookup(string $filename, int $lineNumber): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!isset($this->lookupTable[$filename][$lineNumber])) {
            $this->updateLookupTable();
        }

        if (isset($this->lookupTable[$filename][$lineNumber])) {
            return $this->lookupTable[$filename][$lineNumber];
        }

        return $filename . ':' . $lineNumber;
    }

    private function updateLookupTable(): void
    {
        $this->processClassesAndTraits();
        $this->processFunctions();
    }

    private function processClassesAndTraits(): void
    {
        $classes = get_declared_classes();
        $traits  = get_declared_traits();

<<<<<<< HEAD
        assert(is_array($classes));
        assert(is_array($traits));

        foreach (array_merge($classes, $traits) as $classOrTrait) {
=======
        assert(is_array($traits));

        foreach (array_merge($classes, $traits) as $classOrTrait) {
            assert(class_exists($classOrTrait) || trait_exists($classOrTrait));

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            if (isset($this->processedClasses[$classOrTrait])) {
                continue;
            }

<<<<<<< HEAD
            $reflector = new ReflectionClass($classOrTrait);

            foreach ($reflector->getMethods() as $method) {
=======
            foreach ((new ReflectionClass($classOrTrait))->getMethods() as $method) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->processFunctionOrMethod($method);
            }

            $this->processedClasses[$classOrTrait] = true;
        }
    }

    private function processFunctions(): void
    {
        foreach (get_defined_functions()['user'] as $function) {
<<<<<<< HEAD
=======
            assert(function_exists($function));

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            if (isset($this->processedFunctions[$function])) {
                continue;
            }

            $this->processFunctionOrMethod(new ReflectionFunction($function));

            $this->processedFunctions[$function] = true;
        }
    }

<<<<<<< HEAD
    private function processFunctionOrMethod(ReflectionFunctionAbstract $functionOrMethod): void
=======
    private function processFunctionOrMethod(ReflectionFunction|ReflectionMethod $functionOrMethod): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($functionOrMethod->isInternal()) {
            return;
        }

        $name = $functionOrMethod->getName();

        if ($functionOrMethod instanceof ReflectionMethod) {
            $name = $functionOrMethod->getDeclaringClass()->getName() . '::' . $name;
        }

<<<<<<< HEAD
        if (!isset($this->lookupTable[$functionOrMethod->getFileName()])) {
            $this->lookupTable[$functionOrMethod->getFileName()] = [];
        }

        foreach (range($functionOrMethod->getStartLine(), $functionOrMethod->getEndLine()) as $line) {
            $this->lookupTable[$functionOrMethod->getFileName()][$line] = $name;
=======
        $fileName = $functionOrMethod->getFileName();

        assert(is_string($fileName));

        if (!isset($this->lookupTable[$fileName])) {
            $this->lookupTable[$fileName] = [];
        }

        $startLine = $functionOrMethod->getStartLine();
        $endLine   = $functionOrMethod->getEndLine();

        assert(is_int($startLine));
        assert(is_int($endLine));
        assert($endLine >= $startLine);

        foreach (range($startLine, $endLine) as $line) {
            $this->lookupTable[$fileName][$line] = $name;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }
    }
}
