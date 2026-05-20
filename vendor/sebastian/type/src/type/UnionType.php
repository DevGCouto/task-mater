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
=======
use function assert;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function count;
use function implode;
use function sort;

<<<<<<< HEAD
final class UnionType extends Type
{
    /**
     * @psalm-var non-empty-list<Type>
     */
    private $types;
=======
/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for this library
 */
final class UnionType extends Type
{
    /**
     * @var non-empty-list<Type>
     */
    private array $types;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * @throws RuntimeException
     */
    public function __construct(Type ...$types)
    {
        $this->ensureMinimumOfTwoTypes(...$types);
        $this->ensureOnlyValidTypes(...$types);

<<<<<<< HEAD
=======
        assert(!empty($types));

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->types = $types;
    }

    public function isAssignable(Type $other): bool
    {
        foreach ($this->types as $type) {
            if ($type->isAssignable($other)) {
                return true;
            }
        }

        return false;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function asString(): string
    {
        return $this->name();
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function name(): string
    {
        $types = [];

        foreach ($this->types as $type) {
            if ($type->isIntersection()) {
                $types[] = '(' . $type->name() . ')';

                continue;
            }

            $types[] = $type->name();
        }

        sort($types);

        return implode('|', $types);
    }

    public function allowsNull(): bool
    {
        foreach ($this->types as $type) {
            if ($type instanceof NullType) {
                return true;
            }
        }

        return false;
    }

<<<<<<< HEAD
    /**
     * @psalm-assert-if-true UnionType $this
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function isUnion(): bool
    {
        return true;
    }

    public function containsIntersectionTypes(): bool
    {
        foreach ($this->types as $type) {
            if ($type->isIntersection()) {
                return true;
            }
        }

        return false;
    }

    /**
<<<<<<< HEAD
     * @psalm-return non-empty-list<Type>
=======
     * @return non-empty-list<Type>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function types(): array
    {
        return $this->types;
    }

    /**
     * @throws RuntimeException
     */
    private function ensureMinimumOfTwoTypes(Type ...$types): void
    {
        if (count($types) < 2) {
            throw new RuntimeException(
<<<<<<< HEAD
                'A union type must be composed of at least two types'
=======
                'A union type must be composed of at least two types',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

    /**
     * @throws RuntimeException
     */
    private function ensureOnlyValidTypes(Type ...$types): void
    {
        foreach ($types as $type) {
            if ($type instanceof UnknownType) {
                throw new RuntimeException(
<<<<<<< HEAD
                    'A union type must not be composed of an unknown type'
=======
                    'A union type must not be composed of an unknown type',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );
            }

            if ($type instanceof VoidType) {
                throw new RuntimeException(
<<<<<<< HEAD
                    'A union type must not be composed of a void type'
=======
                    'A union type must not be composed of a void type',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );
            }
        }
    }
}
