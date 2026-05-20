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
use function assert;
use ReflectionFunctionAbstract;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionType;
use ReflectionUnionType;

final class ReflectionMapper
{
    /**
     * @psalm-return list<Parameter>
     */
    public function fromParameterTypes(ReflectionFunctionAbstract $functionOrMethod): array
    {
        $parameters = [];

        foreach ($functionOrMethod->getParameters() as $parameter) {
            $name = $parameter->getName();

            assert($name !== '');

=======
use function array_filter;
use function assert;
use ReflectionFunction;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionType;
use ReflectionUnionType;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for this library
 */
final class ReflectionMapper
{
    /**
     * @return list<Parameter>
     */
    public function fromParameterTypes(ReflectionFunction|ReflectionMethod $reflector): array
    {
        $parameters = [];

        foreach ($reflector->getParameters() as $parameter) {
            $name = $parameter->getName();

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            if (!$parameter->hasType()) {
                $parameters[] = new Parameter($name, new UnknownType);

                continue;
            }

            $type = $parameter->getType();

            if ($type instanceof ReflectionNamedType) {
                $parameters[] = new Parameter(
                    $name,
<<<<<<< HEAD
                    $this->mapNamedType($type, $functionOrMethod)
=======
                    $this->mapNamedType($type, $reflector),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );

                continue;
            }

            if ($type instanceof ReflectionUnionType) {
                $parameters[] = new Parameter(
                    $name,
<<<<<<< HEAD
                    $this->mapUnionType($type, $functionOrMethod)
=======
                    $this->mapUnionType($type, $reflector),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );

                continue;
            }

            if ($type instanceof ReflectionIntersectionType) {
                $parameters[] = new Parameter(
                    $name,
<<<<<<< HEAD
                    $this->mapIntersectionType($type, $functionOrMethod)
=======
                    $this->mapIntersectionType($type, $reflector),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );
            }
        }

        return $parameters;
    }

<<<<<<< HEAD
    public function fromReturnType(ReflectionFunctionAbstract $functionOrMethod): Type
    {
        if (!$this->hasReturnType($functionOrMethod)) {
            return new UnknownType;
        }

        $returnType = $this->returnType($functionOrMethod);
=======
    public function fromReturnType(ReflectionFunction|ReflectionMethod $reflector): Type
    {
        if (!$this->hasReturnType($reflector)) {
            return new UnknownType;
        }

        $returnType = $this->returnType($reflector);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        assert($returnType instanceof ReflectionNamedType || $returnType instanceof ReflectionUnionType || $returnType instanceof ReflectionIntersectionType);

        if ($returnType instanceof ReflectionNamedType) {
<<<<<<< HEAD
            return $this->mapNamedType($returnType, $functionOrMethod);
        }

        if ($returnType instanceof ReflectionUnionType) {
            return $this->mapUnionType($returnType, $functionOrMethod);
        }

        if ($returnType instanceof ReflectionIntersectionType) {
            return $this->mapIntersectionType($returnType, $functionOrMethod);
        }
    }

    private function mapNamedType(ReflectionNamedType $type, ReflectionFunctionAbstract $functionOrMethod): Type
    {
        if ($functionOrMethod instanceof ReflectionMethod && $type->getName() === 'self') {
            return ObjectType::fromName(
                $functionOrMethod->getDeclaringClass()->getName(),
                $type->allowsNull()
            );
        }

        if ($functionOrMethod instanceof ReflectionMethod && $type->getName() === 'static') {
            return new StaticType(
                TypeName::fromReflection($functionOrMethod->getDeclaringClass()),
                $type->allowsNull()
            );
        }

        if ($type->getName() === 'mixed') {
            return new MixedType;
        }

        if ($functionOrMethod instanceof ReflectionMethod && $type->getName() === 'parent') {
            return ObjectType::fromName(
                $functionOrMethod->getDeclaringClass()->getParentClass()->getName(),
                $type->allowsNull()
=======
            return $this->mapNamedType($returnType, $reflector);
        }

        if ($returnType instanceof ReflectionUnionType) {
            return $this->mapUnionType($returnType, $reflector);
        }

        return $this->mapIntersectionType($returnType, $reflector);
    }

    public function fromPropertyType(ReflectionProperty $reflector): Type
    {
        if (!$reflector->hasType()) {
            return new UnknownType;
        }

        $propertyType = $reflector->getType();

        assert($propertyType instanceof ReflectionNamedType || $propertyType instanceof ReflectionUnionType || $propertyType instanceof ReflectionIntersectionType);

        if ($propertyType instanceof ReflectionNamedType) {
            return $this->mapNamedType($propertyType, $reflector);
        }

        if ($propertyType instanceof ReflectionUnionType) {
            return $this->mapUnionType($propertyType, $reflector);
        }

        return $this->mapIntersectionType($propertyType, $reflector);
    }

    private function mapNamedType(ReflectionNamedType $type, ReflectionFunction|ReflectionMethod|ReflectionProperty $reflector): Type
    {
        $classScope = !$reflector instanceof ReflectionFunction;
        $typeName   = $type->getName();

        assert($typeName !== '');

        if ($classScope && $typeName === 'self') {
            return ObjectType::fromName(
                $reflector->getDeclaringClass()->getName(),
                $type->allowsNull(),
            );
        }

        if ($classScope && $typeName === 'static') {
            return new StaticType(
                TypeName::fromReflection($reflector->getDeclaringClass()),
                $type->allowsNull(),
            );
        }

        if ($typeName === 'mixed') {
            return new MixedType;
        }

        if ($classScope && $typeName === 'parent') {
            $parentClass = $reflector->getDeclaringClass()->getParentClass();

            assert($parentClass !== false);

            return ObjectType::fromName(
                $parentClass->getName(),
                $type->allowsNull(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return Type::fromName(
<<<<<<< HEAD
            $type->getName(),
            $type->allowsNull()
        );
    }

    private function mapUnionType(ReflectionUnionType $type, ReflectionFunctionAbstract $functionOrMethod): Type
    {
        $types = [];

        foreach ($type->getTypes() as $_type) {
            assert($_type instanceof ReflectionNamedType || $_type instanceof ReflectionIntersectionType);

            if ($_type instanceof ReflectionNamedType) {
                $types[] = $this->mapNamedType($_type, $functionOrMethod);
=======
            $typeName,
            $type->allowsNull(),
        );
    }

    private function mapUnionType(ReflectionUnionType $type, ReflectionFunction|ReflectionMethod|ReflectionProperty $reflector): Type
    {
        $types             = [];
        $objectType        = false;
        $genericObjectType = false;

        foreach ($type->getTypes() as $_type) {
            if ($_type instanceof ReflectionNamedType) {
                $namedType = $this->mapNamedType($_type, $reflector);

                if ($namedType instanceof GenericObjectType) {
                    $genericObjectType = true;
                } elseif ($namedType instanceof ObjectType) {
                    $objectType = true;
                }

                $types[] = $namedType;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                continue;
            }

<<<<<<< HEAD
            $types[] = $this->mapIntersectionType($_type, $functionOrMethod);
=======
            $types[] = $this->mapIntersectionType($_type, $reflector);
        }

        if ($objectType && $genericObjectType) {
            $types = array_filter(
                $types,
                static function (Type $type): bool
                {
                    if ($type instanceof ObjectType) {
                        return false;
                    }

                    return true;
                },
            );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return new UnionType(...$types);
    }

<<<<<<< HEAD
    private function mapIntersectionType(ReflectionIntersectionType $type, ReflectionFunctionAbstract $functionOrMethod): Type
=======
    private function mapIntersectionType(ReflectionIntersectionType $type, ReflectionFunction|ReflectionMethod|ReflectionProperty $reflector): Type
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $types = [];

        foreach ($type->getTypes() as $_type) {
            assert($_type instanceof ReflectionNamedType);

<<<<<<< HEAD
            $types[] = $this->mapNamedType($_type, $functionOrMethod);
=======
            $types[] = $this->mapNamedType($_type, $reflector);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return new IntersectionType(...$types);
    }

<<<<<<< HEAD
    private function hasReturnType(ReflectionFunctionAbstract $functionOrMethod): bool
    {
        if ($functionOrMethod->hasReturnType()) {
            return true;
        }

        if (!method_exists($functionOrMethod, 'hasTentativeReturnType')) {
            return false;
        }

        return $functionOrMethod->hasTentativeReturnType();
    }

    private function returnType(ReflectionFunctionAbstract $functionOrMethod): ?ReflectionType
    {
        if ($functionOrMethod->hasReturnType()) {
            return $functionOrMethod->getReturnType();
        }

        if (!method_exists($functionOrMethod, 'getTentativeReturnType')) {
            return null;
        }

        return $functionOrMethod->getTentativeReturnType();
=======
    private function hasReturnType(ReflectionFunction|ReflectionMethod $reflector): bool
    {
        if ($reflector->hasReturnType()) {
            return true;
        }

        return $reflector->hasTentativeReturnType();
    }

    private function returnType(ReflectionFunction|ReflectionMethod $reflector): ?ReflectionType
    {
        if ($reflector->hasReturnType()) {
            return $reflector->getReturnType();
        }

        return $reflector->getTentativeReturnType();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
