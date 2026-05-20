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

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class LogicalAnd extends BinaryOperator
{
<<<<<<< HEAD
=======
    public static function fromConstraints(mixed ...$constraints): self
    {
        return new self(...$constraints);
    }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    /**
     * Returns the name of this operator.
     */
    public function operator(): string
    {
        return 'and';
    }

    /**
     * Returns this operator's precedence.
     *
     * @see https://www.php.net/manual/en/language.operators.precedence.php
     */
    public function precedence(): int
    {
        return 22;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
=======
     */
    protected function matches(mixed $other): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        foreach ($this->constraints() as $constraint) {
            if (!$constraint->evaluate($other, '', true)) {
                return false;
            }
        }

        return [] !== $this->constraints();
    }
}
