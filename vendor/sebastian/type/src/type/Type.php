<?php declare(strict_types=1);
/*
 * This file is part of sebastian/type.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Type;

<<<<<<< HEAD
use const PHP_VERSION;
use function get_class;
use function gettype;
use function strtolower;
use function version_compare;

abstract class Type
{
    public static function fromValue($value, bool $allowsNull): self
=======
use function gettype;
use function is_object;
use function strtolower;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for this library
 */
abstract class Type
{
    public static function fromValue(mixed $value, bool $allowsNull): self
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($allowsNull === false) {
            if ($value === true) {
                return new TrueType;
            }

            if ($value === false) {
                return new FalseType;
            }
        }

        $typeName = gettype($value);

<<<<<<< HEAD
        if ($typeName === 'object') {
            return new ObjectType(TypeName::fromQualifiedName(get_class($value)), $allowsNull);
=======
        if (is_object($value)) {
            return new ObjectType(TypeName::fromQualifiedName($value::class), $allowsNull);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $type = self::fromName($typeName, $allowsNull);

        if ($type instanceof SimpleType) {
            $type = new SimpleType($typeName, $allowsNull, $value);
        }

        return $type;
    }

<<<<<<< HEAD
    public static function fromName(string $typeName, bool $allowsNull): self
    {
        if (version_compare(PHP_VERSION, '8.1.0-dev', '>=') && strtolower($typeName) === 'never') {
            return new NeverType;
        }

        switch (strtolower($typeName)) {
            case 'callable':
                return new CallableType($allowsNull);

            case 'true':
                return new TrueType;

            case 'false':
                return new FalseType;

            case 'iterable':
                return new IterableType($allowsNull);

            case 'null':
                return new NullType;

            case 'object':
                return new GenericObjectType($allowsNull);

            case 'unknown type':
                return new UnknownType;

            case 'void':
                return new VoidType;

            case 'array':
            case 'bool':
            case 'boolean':
            case 'double':
            case 'float':
            case 'int':
            case 'integer':
            case 'real':
            case 'resource':
            case 'resource (closed)':
            case 'string':
                return new SimpleType($typeName, $allowsNull);

            default:
                return new ObjectType(TypeName::fromQualifiedName($typeName), $allowsNull);
        }
=======
    /**
     * @param non-empty-string $typeName
     */
    public static function fromName(string $typeName, bool $allowsNull): self
    {
        return match (strtolower($typeName)) {
            'callable'     => new CallableType($allowsNull),
            'true'         => new TrueType,
            'false'        => new FalseType,
            'iterable'     => new IterableType($allowsNull),
            'never'        => new NeverType,
            'null'         => new NullType,
            'object'       => new GenericObjectType($allowsNull),
            'unknown type' => new UnknownType,
            'void'         => new VoidType,
            'array', 'bool', 'boolean', 'double', 'float', 'int', 'integer', 'real', 'resource', 'resource (closed)', 'string' => new SimpleType($typeName, $allowsNull),
            'mixed' => new MixedType,
            /** @phpstan-ignore argument.type */
            default => new ObjectType(TypeName::fromQualifiedName($typeName), $allowsNull),
        };
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function asString(): string
    {
        return ($this->allowsNull() ? '?' : '') . $this->name();
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true CallableType $this
=======
     * @phpstan-assert-if-true CallableType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isCallable(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true TrueType $this
=======
     * @phpstan-assert-if-true TrueType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isTrue(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true FalseType $this
=======
     * @phpstan-assert-if-true FalseType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isFalse(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true GenericObjectType $this
=======
     * @phpstan-assert-if-true GenericObjectType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isGenericObject(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true IntersectionType $this
=======
     * @phpstan-assert-if-true IntersectionType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isIntersection(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true IterableType $this
=======
     * @phpstan-assert-if-true IterableType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isIterable(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true MixedType $this
=======
     * @phpstan-assert-if-true MixedType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isMixed(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true NeverType $this
=======
     * @phpstan-assert-if-true NeverType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isNever(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true NullType $this
=======
     * @phpstan-assert-if-true NullType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isNull(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true ObjectType $this
=======
     * @phpstan-assert-if-true ObjectType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isObject(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true SimpleType $this
=======
     * @phpstan-assert-if-true SimpleType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isSimple(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true StaticType $this
=======
     * @phpstan-assert-if-true StaticType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isStatic(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true UnionType $this
=======
     * @phpstan-assert-if-true UnionType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isUnion(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true UnknownType $this
=======
     * @phpstan-assert-if-true UnknownType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isUnknown(): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true VoidType $this
=======
     * @phpstan-assert-if-true VoidType $this
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function isVoid(): bool
    {
        return false;
    }

    abstract public function isAssignable(self $other): bool;

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    abstract public function name(): string;

    abstract public function allowsNull(): bool;
}
