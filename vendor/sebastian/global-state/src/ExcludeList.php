<?php declare(strict_types=1);
/*
 * This file is part of sebastian/global-state.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\GlobalState;

use function in_array;
<<<<<<< HEAD
use function strpos;
=======
use function str_starts_with;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use ReflectionClass;

final class ExcludeList
{
    /**
<<<<<<< HEAD
     * @var array
     */
    private $globalVariables = [];

    /**
     * @var string[]
     */
    private $classes = [];

    /**
     * @var string[]
     */
    private $classNamePrefixes = [];

    /**
     * @var string[]
     */
    private $parentClasses = [];

    /**
     * @var string[]
     */
    private $interfaces = [];

    /**
     * @var array
     */
    private $staticAttributes = [];

=======
     * @var array<non-empty-string, true>
     */
    private array $globalVariables = [];

    /**
     * @var list<non-empty-string>
     */
    private array $classes = [];

    /**
     * @var list<non-empty-string>
     */
    private array $classNamePrefixes = [];

    /**
     * @var list<non-empty-string>
     */
    private array $parentClasses = [];

    /**
     * @var list<non-empty-string>
     */
    private array $interfaces = [];

    /**
     * @var array<string, array<non-empty-string, true>>
     */
    private array $staticProperties = [];

    /**
     * @param non-empty-string $variableName
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function addGlobalVariable(string $variableName): void
    {
        $this->globalVariables[$variableName] = true;
    }

<<<<<<< HEAD
=======
    /**
     * @param non-empty-string $className
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function addClass(string $className): void
    {
        $this->classes[] = $className;
    }

<<<<<<< HEAD
=======
    /**
     * @param non-empty-string $className
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function addSubclassesOf(string $className): void
    {
        $this->parentClasses[] = $className;
    }

<<<<<<< HEAD
=======
    /**
     * @param non-empty-string $interfaceName
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function addImplementorsOf(string $interfaceName): void
    {
        $this->interfaces[] = $interfaceName;
    }

<<<<<<< HEAD
=======
    /**
     * @param non-empty-string $classNamePrefix
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function addClassNamePrefix(string $classNamePrefix): void
    {
        $this->classNamePrefixes[] = $classNamePrefix;
    }

<<<<<<< HEAD
    public function addStaticAttribute(string $className, string $attributeName): void
    {
        if (!isset($this->staticAttributes[$className])) {
            $this->staticAttributes[$className] = [];
        }

        $this->staticAttributes[$className][$attributeName] = true;
=======
    /**
     * @param non-empty-string $className
     * @param non-empty-string $propertyName
     */
    public function addStaticProperty(string $className, string $propertyName): void
    {
        if (!isset($this->staticProperties[$className])) {
            $this->staticProperties[$className] = [];
        }

        $this->staticProperties[$className][$propertyName] = true;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function isGlobalVariableExcluded(string $variableName): bool
    {
        return isset($this->globalVariables[$variableName]);
    }

<<<<<<< HEAD
    public function isStaticAttributeExcluded(string $className, string $attributeName): bool
=======
    /**
     * @param class-string     $className
     * @param non-empty-string $propertyName
     */
    public function isStaticPropertyExcluded(string $className, string $propertyName): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (in_array($className, $this->classes, true)) {
            return true;
        }

        foreach ($this->classNamePrefixes as $prefix) {
<<<<<<< HEAD
            if (strpos($className, $prefix) === 0) {
=======
            if (str_starts_with($className, $prefix)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                return true;
            }
        }

        $class = new ReflectionClass($className);

        foreach ($this->parentClasses as $type) {
            if ($class->isSubclassOf($type)) {
                return true;
            }
        }

        foreach ($this->interfaces as $type) {
            if ($class->implementsInterface($type)) {
                return true;
            }
        }

<<<<<<< HEAD
        if (isset($this->staticAttributes[$className][$attributeName])) {
            return true;
        }

        return false;
=======
        return isset($this->staticProperties[$className][$propertyName]);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
