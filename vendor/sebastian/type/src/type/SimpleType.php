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

use function strtolower;

<<<<<<< HEAD
final class SimpleType extends Type
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $allowsNull;

    /**
     * @var mixed
     */
    private $value;

    public function __construct(string $name, bool $nullable, $value = null)
=======
/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for this library
 */
final class SimpleType extends Type
{
    /**
     * @var non-empty-string
     */
    private string $name;
    private bool $allowsNull;
    private mixed $value;

    /**
     * @param non-empty-string $name
     */
    public function __construct(string $name, bool $nullable, mixed $value = null)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->name       = $this->normalize($name);
        $this->allowsNull = $nullable;
        $this->value      = $value;
    }

    public function isAssignable(Type $other): bool
    {
        if ($this->allowsNull && $other instanceof NullType) {
            return true;
        }

        if ($this->name === 'bool' && $other->name() === 'true') {
            return true;
        }

        if ($this->name === 'bool' && $other->name() === 'false') {
            return true;
        }

        if ($other instanceof self) {
            return $this->name === $other->name;
        }

        return false;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function name(): string
    {
        return $this->name;
    }

    public function allowsNull(): bool
    {
        return $this->allowsNull;
    }

<<<<<<< HEAD
    public function value()
=======
    public function value(): mixed
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->value;
    }

<<<<<<< HEAD
    /**
     * @psalm-assert-if-true SimpleType $this
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function isSimple(): bool
    {
        return true;
    }

<<<<<<< HEAD
=======
    /**
     * @param non-empty-string $name
     *
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function normalize(string $name): string
    {
        $name = strtolower($name);

<<<<<<< HEAD
        switch ($name) {
            case 'boolean':
                return 'bool';

            case 'real':
            case 'double':
                return 'float';

            case 'integer':
                return 'int';

            case '[]':
                return 'array';

            default:
                return $name;
        }
=======
        return match ($name) {
            'boolean' => 'bool',
            'real', 'double' => 'float',
            'integer' => 'int',
            '[]'      => 'array',
            default   => $name,
        };
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
