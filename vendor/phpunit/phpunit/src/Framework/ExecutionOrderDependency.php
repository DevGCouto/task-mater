<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use function array_filter;
use function array_map;
use function array_values;
<<<<<<< HEAD
use function count;
use function explode;
use function in_array;
use function strpos;
use function trim;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ExecutionOrderDependency
{
    /**
     * @var string
     */
    private $className = '';

    /**
     * @var string
     */
    private $methodName = '';

    /**
     * @var bool
     */
    private $useShallowClone = false;

    /**
     * @var bool
     */
    private $useDeepClone = false;

    public static function createFromDependsAnnotation(string $className, string $annotation): self
    {
        // Split clone option and target
        $parts = explode(' ', trim($annotation), 2);

        if (count($parts) === 1) {
            $cloneOption = '';
            $target      = $parts[0];
        } else {
            $cloneOption = $parts[0];
            $target      = $parts[1];
        }

        // Prefix provided class for targets assumed to be in scope
        if ($target !== '' && strpos($target, '::') === false) {
            $target = $className . '::' . $target;
        }

        return new self($target, null, $cloneOption);
    }

    /**
     * @psalm-param list<ExecutionOrderDependency> $dependencies
     *
     * @psalm-return list<ExecutionOrderDependency>
=======
use function explode;
use function in_array;
use function str_contains;
use PHPUnit\Metadata\DependsOnClass;
use PHPUnit\Metadata\DependsOnMethod;
use Stringable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ExecutionOrderDependency implements Stringable
{
    private string $className  = '';
    private string $methodName = '';
    private readonly bool $shallowClone;
    private readonly bool $deepClone;

    public static function invalid(): self
    {
        return new self(
            '',
            '',
            false,
            false,
        );
    }

    public static function forClass(DependsOnClass $metadata): self
    {
        return new self(
            $metadata->className(),
            'class',
            $metadata->deepClone(),
            $metadata->shallowClone(),
        );
    }

    public static function forMethod(DependsOnMethod $metadata): self
    {
        return new self(
            $metadata->className(),
            $metadata->methodName(),
            $metadata->deepClone(),
            $metadata->shallowClone(),
        );
    }

    /**
     * @param list<ExecutionOrderDependency> $dependencies
     *
     * @return list<ExecutionOrderDependency>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function filterInvalid(array $dependencies): array
    {
        return array_values(
            array_filter(
                $dependencies,
<<<<<<< HEAD
                static function (self $d)
                {
                    return $d->isValid();
                },
=======
                static fn (self $d) => $d->isValid(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            ),
        );
    }

    /**
<<<<<<< HEAD
     * @psalm-param list<ExecutionOrderDependency> $existing
     * @psalm-param list<ExecutionOrderDependency> $additional
     *
     * @psalm-return list<ExecutionOrderDependency>
=======
     * @param list<ExecutionOrderDependency> $existing
     * @param list<ExecutionOrderDependency> $additional
     *
     * @return list<ExecutionOrderDependency>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function mergeUnique(array $existing, array $additional): array
    {
        $existingTargets = array_map(
<<<<<<< HEAD
            static function ($dependency)
            {
                return $dependency->getTarget();
            },
=======
            static fn ($dependency) => $dependency->getTarget(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $existing,
        );

        foreach ($additional as $dependency) {
<<<<<<< HEAD
            if (in_array($dependency->getTarget(), $existingTargets, true)) {
                continue;
            }

            $existingTargets[] = $dependency->getTarget();
=======
            $additionalTarget = $dependency->getTarget();

            if (in_array($additionalTarget, $existingTargets, true)) {
                continue;
            }

            $existingTargets[] = $additionalTarget;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $existing[]        = $dependency;
        }

        return $existing;
    }

    /**
<<<<<<< HEAD
     * @psalm-param list<ExecutionOrderDependency> $left
     * @psalm-param list<ExecutionOrderDependency> $right
     *
     * @psalm-return list<ExecutionOrderDependency>
=======
     * @param list<ExecutionOrderDependency> $left
     * @param list<ExecutionOrderDependency> $right
     *
     * @return list<ExecutionOrderDependency>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function diff(array $left, array $right): array
    {
        if ($right === []) {
            return $left;
        }

        if ($left === []) {
            return [];
        }

        $diff         = [];
        $rightTargets = array_map(
<<<<<<< HEAD
            static function ($dependency)
            {
                return $dependency->getTarget();
            },
=======
            static fn ($dependency) => $dependency->getTarget(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $right,
        );

        foreach ($left as $dependency) {
            if (in_array($dependency->getTarget(), $rightTargets, true)) {
                continue;
            }

            $diff[] = $dependency;
        }

        return $diff;
    }

<<<<<<< HEAD
    public function __construct(string $classOrCallableName, ?string $methodName = null, ?string $option = null)
    {
=======
    public function __construct(string $classOrCallableName, ?string $methodName = null, bool $deepClone = false, bool $shallowClone = false)
    {
        $this->deepClone    = $deepClone;
        $this->shallowClone = $shallowClone;

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($classOrCallableName === '') {
            return;
        }

<<<<<<< HEAD
        if (strpos($classOrCallableName, '::') !== false) {
=======
        if (str_contains($classOrCallableName, '::')) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            [$this->className, $this->methodName] = explode('::', $classOrCallableName);
        } else {
            $this->className  = $classOrCallableName;
            $this->methodName = !empty($methodName) ? $methodName : 'class';
        }
<<<<<<< HEAD

        if ($option === 'clone') {
            $this->useDeepClone = true;
        } elseif ($option === 'shallowClone') {
            $this->useShallowClone = true;
        }
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function __toString(): string
    {
        return $this->getTarget();
    }

    public function isValid(): bool
    {
        // Invalid dependencies can be declared and are skipped by the runner
        return $this->className !== '' && $this->methodName !== '';
    }

<<<<<<< HEAD
    public function useShallowClone(): bool
    {
        return $this->useShallowClone;
    }

    public function useDeepClone(): bool
    {
        return $this->useDeepClone;
=======
    public function shallowClone(): bool
    {
        return $this->shallowClone;
    }

    public function deepClone(): bool
    {
        return $this->deepClone;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function targetIsClass(): bool
    {
        return $this->methodName === 'class';
    }

    public function getTarget(): string
    {
        return $this->isValid()
            ? $this->className . '::' . $this->methodName
            : '';
    }

    public function getTargetClassName(): string
    {
        return $this->className;
    }
}
