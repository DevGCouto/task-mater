<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

use SebastianBergmann\Type\Type;

/**
<<<<<<< HEAD
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ConfigurableMethod
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Type
     */
    private $returnType;

    public function __construct(string $name, Type $returnType)
    {
        $this->name       = $name;
        $this->returnType = $returnType;
    }

    public function getName(): string
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class ConfigurableMethod
{
    /**
     * @var non-empty-string
     */
    private string $name;

    /**
     * @var array<int, mixed>
     */
    private array $defaultParameterValues;

    /**
     * @var non-negative-int
     */
    private int $numberOfParameters;
    private Type $returnType;

    /**
     * @param non-empty-string  $name
     * @param array<int, mixed> $defaultParameterValues
     * @param non-negative-int  $numberOfParameters
     */
    public function __construct(string $name, array $defaultParameterValues, int $numberOfParameters, Type $returnType)
    {
        $this->name                   = $name;
        $this->defaultParameterValues = $defaultParameterValues;
        $this->numberOfParameters     = $numberOfParameters;
        $this->returnType             = $returnType;
    }

    /**
     * @return non-empty-string
     */
    public function name(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->name;
    }

<<<<<<< HEAD
    public function mayReturn($value): bool
    {
        if ($value === null && $this->returnType->allowsNull()) {
            return true;
        }

        return $this->returnType->isAssignable(Type::fromValue($value, false));
    }

    public function getReturnTypeDeclaration(): string
=======
    /**
     * @return array<int, mixed>
     */
    public function defaultParameterValues(): array
    {
        return $this->defaultParameterValues;
    }

    /**
     * @return non-negative-int
     */
    public function numberOfParameters(): int
    {
        return $this->numberOfParameters;
    }

    public function mayReturn(mixed $value): bool
    {
        return $this->returnType->isAssignable(Type::fromValue($value, false));
    }

    public function returnTypeDeclaration(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->returnType->asString();
    }
}
