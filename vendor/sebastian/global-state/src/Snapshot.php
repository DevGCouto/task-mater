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

<<<<<<< HEAD
use const PHP_VERSION_ID;
use function array_keys;
use function array_merge;
use function array_reverse;
use function func_get_args;
=======
use function array_keys;
use function array_merge;
use function array_reverse;
use function assert;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function get_declared_classes;
use function get_declared_interfaces;
use function get_declared_traits;
use function get_defined_constants;
use function get_defined_functions;
use function get_included_files;
use function in_array;
use function ini_get_all;
use function is_array;
use function is_object;
use function is_resource;
use function is_scalar;
use function serialize;
use function unserialize;
use ReflectionClass;
use SebastianBergmann\ObjectReflector\ObjectReflector;
use SebastianBergmann\RecursionContext\Context;
use Throwable;

/**
 * A snapshot of global state.
 */
<<<<<<< HEAD
class Snapshot
{
    /**
     * @var ExcludeList
     */
    private $excludeList;

    /**
     * @var array
     */
    private $globalVariables = [];

    /**
     * @var array
     */
    private $superGlobalArrays = [];

    /**
     * @var array
     */
    private $superGlobalVariables = [];

    /**
     * @var array
     */
    private $staticAttributes = [];

    /**
     * @var array
     */
    private $iniSettings = [];

    /**
     * @var array
     */
    private $includedFiles = [];

    /**
     * @var array
     */
    private $constants = [];

    /**
     * @var array
     */
    private $functions = [];

    /**
     * @var array
     */
    private $interfaces = [];

    /**
     * @var array
     */
    private $classes = [];

    /**
     * @var array
     */
    private $traits = [];

    /**
     * Creates a snapshot of the current global state.
     */
    public function __construct(?ExcludeList $excludeList = null, bool $includeGlobalVariables = true, bool $includeStaticAttributes = true, bool $includeConstants = true, bool $includeFunctions = true, bool $includeClasses = true, bool $includeInterfaces = true, bool $includeTraits = true, bool $includeIniSettings = true, bool $includeIncludedFiles = true)
=======
final class Snapshot
{
    private ExcludeList $excludeList;

    /**
     * @var array<string, mixed>
     */
    private array $globalVariables = [];

    /**
     * @var list<string>
     */
    private array $superGlobalArrays = [];

    /**
     * @var array<string, array<string, mixed>>
     */
    private array $superGlobalVariables = [];

    /**
     * @var array<string, array<string, mixed>>
     */
    private array $staticProperties = [];

    /**
     * @var array<non-empty-string, array{global_value: string, local_value: string, access: int}>
     */
    private array $iniSettings = [];

    /**
     * @var list<string>
     */
    private array $includedFiles = [];

    /**
     * @var array<string, mixed>
     */
    private array $constants = [];

    /**
     * @var list<callable-string>
     */
    private array $functions = [];

    /**
     * @var list<class-string>
     */
    private array $interfaces = [];

    /**
     * @var list<class-string>
     */
    private array $classes = [];

    /**
     * @var list<class-string>
     */
    private array $traits = [];

    public function __construct(?ExcludeList $excludeList = null, bool $includeGlobalVariables = true, bool $includeStaticProperties = true, bool $includeConstants = true, bool $includeFunctions = true, bool $includeClasses = true, bool $includeInterfaces = true, bool $includeTraits = true, bool $includeIniSettings = true, bool $includeIncludedFiles = true)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->excludeList = $excludeList ?: new ExcludeList;

        if ($includeConstants) {
            $this->snapshotConstants();
        }

        if ($includeFunctions) {
            $this->snapshotFunctions();
        }

<<<<<<< HEAD
        if ($includeClasses || $includeStaticAttributes) {
=======
        if ($includeClasses || $includeStaticProperties) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $this->snapshotClasses();
        }

        if ($includeInterfaces) {
            $this->snapshotInterfaces();
        }

        if ($includeGlobalVariables) {
            $this->setupSuperGlobalArrays();
            $this->snapshotGlobals();
        }

<<<<<<< HEAD
        if ($includeStaticAttributes) {
            $this->snapshotStaticAttributes();
        }

        if ($includeIniSettings) {
            $this->iniSettings = ini_get_all(null, false);
=======
        if ($includeStaticProperties) {
            $this->snapshotStaticProperties();
        }

        if ($includeIniSettings) {
            $iniSettings = ini_get_all(null, false);

            assert($iniSettings !== false);

            $this->iniSettings = $iniSettings;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        if ($includeIncludedFiles) {
            $this->includedFiles = get_included_files();
        }

        if ($includeTraits) {
            $this->traits = get_declared_traits();
        }
    }

    public function excludeList(): ExcludeList
    {
        return $this->excludeList;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function globalVariables(): array
    {
        return $this->globalVariables;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, array<string, mixed>>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function superGlobalVariables(): array
    {
        return $this->superGlobalVariables;
    }

<<<<<<< HEAD
=======
    /**
     * @return list<string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function superGlobalArrays(): array
    {
        return $this->superGlobalArrays;
    }

<<<<<<< HEAD
    public function staticAttributes(): array
    {
        return $this->staticAttributes;
    }

=======
    /**
     * @return array<string, array<string, mixed>>
     */
    public function staticProperties(): array
    {
        return $this->staticProperties;
    }

    /**
     * @return array<non-empty-string, array{global_value: string, local_value: string, access: int}>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function iniSettings(): array
    {
        return $this->iniSettings;
    }

<<<<<<< HEAD
=======
    /**
     * @return list<string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function includedFiles(): array
    {
        return $this->includedFiles;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function constants(): array
    {
        return $this->constants;
    }

<<<<<<< HEAD
=======
    /**
     * @return list<callable-string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function functions(): array
    {
        return $this->functions;
    }

<<<<<<< HEAD
=======
    /**
     * @return list<class-string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function interfaces(): array
    {
        return $this->interfaces;
    }

<<<<<<< HEAD
=======
    /**
     * @return list<class-string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function classes(): array
    {
        return $this->classes;
    }

<<<<<<< HEAD
=======
    /**
     * @return list<class-string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function traits(): array
    {
        return $this->traits;
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot user-defined constants.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function snapshotConstants(): void
    {
        $constants = get_defined_constants(true);

        if (isset($constants['user'])) {
            $this->constants = $constants['user'];
        }
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot user-defined functions.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function snapshotFunctions(): void
    {
        $functions = get_defined_functions();

        $this->functions = $functions['user'];
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot user-defined classes.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function snapshotClasses(): void
    {
        foreach (array_reverse(get_declared_classes()) as $className) {
            $class = new ReflectionClass($className);

            if (!$class->isUserDefined()) {
                break;
            }

            $this->classes[] = $className;
        }

        $this->classes = array_reverse($this->classes);
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot user-defined interfaces.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function snapshotInterfaces(): void
    {
        foreach (array_reverse(get_declared_interfaces()) as $interfaceName) {
            $class = new ReflectionClass($interfaceName);

            if (!$class->isUserDefined()) {
                break;
            }

            $this->interfaces[] = $interfaceName;
        }

        $this->interfaces = array_reverse($this->interfaces);
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot of all global and super-global variables.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function snapshotGlobals(): void
    {
        $superGlobalArrays = $this->superGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            $this->snapshotSuperGlobalArray($superGlobalArray);
        }

        foreach (array_keys($GLOBALS) as $key) {
            if ($key !== 'GLOBALS' &&
                !in_array($key, $superGlobalArrays, true) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->excludeList->isGlobalVariableExcluded($key)) {
                /* @noinspection UnserializeExploitsInspection */
                $this->globalVariables[$key] = unserialize(serialize($GLOBALS[$key]));
            }
        }
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot a super-global variable array.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function snapshotSuperGlobalArray(string $superGlobalArray): void
    {
        $this->superGlobalVariables[$superGlobalArray] = [];

        if (isset($GLOBALS[$superGlobalArray]) && is_array($GLOBALS[$superGlobalArray])) {
            foreach ($GLOBALS[$superGlobalArray] as $key => $value) {
                /* @noinspection UnserializeExploitsInspection */
                $this->superGlobalVariables[$superGlobalArray][$key] = unserialize(serialize($value));
            }
        }
    }

<<<<<<< HEAD
    /**
     * Creates a snapshot of all static attributes in user-defined classes.
     */
    private function snapshotStaticAttributes(): void
=======
    private function snapshotStaticProperties(): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        foreach ($this->classes as $className) {
            $class    = new ReflectionClass($className);
            $snapshot = [];

<<<<<<< HEAD
            foreach ($class->getProperties() as $attribute) {
                if ($attribute->isStatic()) {
                    $name = $attribute->getName();

                    if ($this->excludeList->isStaticAttributeExcluded($className, $name)) {
                        continue;
                    }

                    if (version_compare(PHP_VERSION, '8.1.0', '<')) {
                        $attribute->setAccessible(true);
                    }

                    if (PHP_VERSION_ID >= 70400 && !$attribute->isInitialized()) {
                        continue;
                    }

                    $value = $attribute->getValue();
=======
            foreach ($class->getProperties() as $property) {
                if ($property->isStatic()) {
                    $name = $property->getName();

                    if ($this->excludeList->isStaticPropertyExcluded($className, $name)) {
                        continue;
                    }

                    if (!$property->isInitialized()) {
                        continue;
                    }

                    $value = $property->getValue();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                    if ($this->canBeSerialized($value)) {
                        /* @noinspection UnserializeExploitsInspection */
                        $snapshot[$name] = unserialize(serialize($value));
                    }
                }
            }

            if (!empty($snapshot)) {
<<<<<<< HEAD
                $this->staticAttributes[$className] = $snapshot;
=======
                $this->staticProperties[$className] = $snapshot;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }
        }
    }

<<<<<<< HEAD
    /**
     * Returns a list of all super-global variable arrays.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function setupSuperGlobalArrays(): void
    {
        $this->superGlobalArrays = [
            '_ENV',
            '_POST',
            '_GET',
            '_COOKIE',
            '_SERVER',
            '_FILES',
            '_REQUEST',
        ];
    }

<<<<<<< HEAD
    private function canBeSerialized($variable): bool
=======
    private function canBeSerialized(mixed $variable): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (is_scalar($variable) || $variable === null) {
            return true;
        }

        if (is_resource($variable)) {
            return false;
        }

        foreach ($this->enumerateObjectsAndResources($variable) as $value) {
            if (is_resource($value)) {
                return false;
            }

            if (is_object($value)) {
                $class = new ReflectionClass($value);

                if ($class->isAnonymous()) {
                    return false;
                }

                try {
                    @serialize($value);
                } catch (Throwable $t) {
                    return false;
                }
            }
        }

        return true;
    }

<<<<<<< HEAD
    private function enumerateObjectsAndResources($variable): array
    {
        if (isset(func_get_args()[1])) {
            $processed = func_get_args()[1];
        } else {
            $processed = new Context;
        }

=======
    /**
     * @return array<mixed>
     */
    private function enumerateObjectsAndResources(mixed $variable, Context $processed = new Context): array
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $result = [];

        if ($processed->contains($variable)) {
            return $result;
        }

        $array = $variable;
<<<<<<< HEAD
        $processed->add($variable);

        if (is_array($variable)) {
=======

        /* @noinspection UnusedFunctionResultInspection */
        $processed->add($variable);

        if (is_array($variable)) {
            /** @phpstan-ignore foreach.nonIterable */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            foreach ($array as $element) {
                if (!is_array($element) && !is_object($element) && !is_resource($element)) {
                    continue;
                }

                if (!is_resource($element)) {
                    /** @noinspection SlowArrayOperationsInLoopInspection */
                    $result = array_merge(
                        $result,
<<<<<<< HEAD
                        $this->enumerateObjectsAndResources($element, $processed)
=======
                        $this->enumerateObjectsAndResources($element, $processed),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                    );
                } else {
                    $result[] = $element;
                }
            }
        } else {
            $result[] = $variable;

<<<<<<< HEAD
            foreach ((new ObjectReflector)->getAttributes($variable) as $value) {
=======
            foreach ((new ObjectReflector)->getProperties($variable) as $value) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                if (!is_array($value) && !is_object($value) && !is_resource($value)) {
                    continue;
                }

                if (!is_resource($value)) {
                    /** @noinspection SlowArrayOperationsInLoopInspection */
                    $result = array_merge(
                        $result,
<<<<<<< HEAD
                        $this->enumerateObjectsAndResources($value, $processed)
=======
                        $this->enumerateObjectsAndResources($value, $processed),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                    );
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }
}
