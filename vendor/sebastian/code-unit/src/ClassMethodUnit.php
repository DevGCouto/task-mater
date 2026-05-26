<?php declare(strict_types=1);
/*
 * This file is part of sebastian/code-unit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeUnit;

/**
<<<<<<< HEAD
 * @psalm-immutable
 */
final class ClassMethodUnit extends CodeUnit
{
    /**
     * @psalm-assert-if-true ClassMethodUnit $this
     */
=======
 * @immutable
 */
final readonly class ClassMethodUnit extends CodeUnit
{
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function isClassMethod(): bool
    {
        return true;
    }
}
