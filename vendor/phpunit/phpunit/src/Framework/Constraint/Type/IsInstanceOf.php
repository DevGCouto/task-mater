<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

<<<<<<< HEAD
use function sprintf;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use function class_exists;
use function interface_exists;
use function sprintf;
use PHPUnit\Framework\UnknownClassOrInterfaceException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class IsInstanceOf extends Constraint
{
    /**
<<<<<<< HEAD
     * @var string
     */
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
=======
     * @var class-string
     */
    private readonly string $name;

    /**
     * @var 'class'|'interface'
     */
    private readonly string $type;

    /**
     * @throws UnknownClassOrInterfaceException
     */
    public function __construct(string $name)
    {
        if (class_exists($name)) {
            $this->type = 'class';
        } elseif (interface_exists($name)) {
            $this->type = 'interface';
        } else {
            throw new UnknownClassOrInterfaceException($name);
        }

        $this->name = $name;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
<<<<<<< HEAD
            'is instance of %s "%s"',
            $this->getType(),
            $this->className,
=======
            'is an instance of %s %s',
            $this->type,
            $this->name,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return $other instanceof $this->className;
=======
     */
    protected function matches(mixed $other): bool
    {
        return $other instanceof $this->name;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
<<<<<<< HEAD
     *
     * @param mixed $other evaluated value or object
     *
     * @throws InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return sprintf(
            '%s is an instance of %s "%s"',
            $this->exporter()->shortenedExport($other),
            $this->getType(),
            $this->className,
        );
    }

    private function getType(): string
    {
        try {
            $reflection = new ReflectionClass($this->className);

            if ($reflection->isInterface()) {
                return 'interface';
            }
        } catch (ReflectionException $e) {
        }

        return 'class';
=======
     */
    protected function failureDescription(mixed $other): string
    {
        return $this->valueToTypeStringFragment($other) . $this->toString();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
