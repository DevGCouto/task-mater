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
/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for this library
 */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
final class MixedType extends Type
{
    public function isAssignable(Type $other): bool
    {
        return !$other instanceof VoidType;
    }

<<<<<<< HEAD
=======
    /**
     * @return 'mixed'
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function asString(): string
    {
        return 'mixed';
    }

<<<<<<< HEAD
=======
    /**
     * @return 'mixed'
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function name(): string
    {
        return 'mixed';
    }

    public function allowsNull(): bool
    {
        return true;
    }

<<<<<<< HEAD
    /**
     * @psalm-assert-if-true MixedType $this
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function isMixed(): bool
    {
        return true;
    }
}
