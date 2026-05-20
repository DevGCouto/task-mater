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
use function get_class;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function is_object;
use PHPUnit\Framework\ActualValueIsNotAnObjectException;
use PHPUnit\Framework\ComparisonMethodDoesNotAcceptParameterTypeException;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareExactlyOneParameterException;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareParameterTypeException;
use PHPUnit\Framework\ComparisonMethodDoesNotExistException;
use ReflectionNamedType;
use ReflectionObject;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class ObjectEquals extends Constraint
{
<<<<<<< HEAD
    /**
     * @var object
     */
    private $expected;

    /**
     * @var string
     */
    private $method;
=======
    private readonly object $expected;
    private readonly string $method;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(object $object, string $method = 'equals')
    {
        $this->expected = $object;
        $this->method   = $method;
    }

    public function toString(): string
    {
        return 'two objects are equal';
    }

    /**
     * @throws ActualValueIsNotAnObjectException
     * @throws ComparisonMethodDoesNotAcceptParameterTypeException
     * @throws ComparisonMethodDoesNotDeclareBoolReturnTypeException
     * @throws ComparisonMethodDoesNotDeclareExactlyOneParameterException
     * @throws ComparisonMethodDoesNotDeclareParameterTypeException
     * @throws ComparisonMethodDoesNotExistException
     */
<<<<<<< HEAD
    protected function matches($other): bool
=======
    protected function matches(mixed $other): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!is_object($other)) {
            throw new ActualValueIsNotAnObjectException;
        }

        $object = new ReflectionObject($other);

        if (!$object->hasMethod($this->method)) {
            throw new ComparisonMethodDoesNotExistException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

<<<<<<< HEAD
        /** @noinspection PhpUnhandledExceptionInspection */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $method = $object->getMethod($this->method);

        if (!$method->hasReturnType()) {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        $returnType = $method->getReturnType();

        if (!$returnType instanceof ReflectionNamedType) {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        if ($returnType->allowsNull()) {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        if ($returnType->getName() !== 'bool') {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        if ($method->getNumberOfParameters() !== 1 || $method->getNumberOfRequiredParameters() !== 1) {
            throw new ComparisonMethodDoesNotDeclareExactlyOneParameterException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        $parameter = $method->getParameters()[0];

        if (!$parameter->hasType()) {
            throw new ComparisonMethodDoesNotDeclareParameterTypeException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        $type = $parameter->getType();

        if (!$type instanceof ReflectionNamedType) {
            throw new ComparisonMethodDoesNotDeclareParameterTypeException(
<<<<<<< HEAD
                get_class($other),
=======
                $other::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->method,
            );
        }

        $typeName = $type->getName();

        if ($typeName === 'self') {
<<<<<<< HEAD
            $typeName = get_class($other);
=======
            $typeName = $other::class;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        if (!$this->expected instanceof $typeName) {
            throw new ComparisonMethodDoesNotAcceptParameterTypeException(
<<<<<<< HEAD
                get_class($other),
                $this->method,
                get_class($this->expected),
=======
                $other::class,
                $this->method,
                $this->expected::class,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $other->{$this->method}($this->expected);
    }

<<<<<<< HEAD
    protected function failureDescription($other): string
=======
    protected function failureDescription(mixed $other): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->toString();
    }
}
