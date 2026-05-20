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

use function array_reduce;
use function array_shift;
<<<<<<< HEAD
=======
use PHPUnit\Framework\ExpectationFailedException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class LogicalXor extends BinaryOperator
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
        return 'xor';
    }

    /**
     * Returns this operator's precedence.
     *
     * @see https://www.php.net/manual/en/language.operators.precedence.php.
     */
    public function precedence(): int
    {
        return 23;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param mixed $other value or object to evaluate
     */
    public function matches($other): bool
=======
     * @throws ExpectationFailedException
     */
    public function matches(mixed $other): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraints = $this->constraints();

        $initial = array_shift($constraints);

        if ($initial === null) {
            return false;
        }

        return array_reduce(
            $constraints,
<<<<<<< HEAD
            static function (bool $matches, Constraint $constraint) use ($other): bool
            {
                return $matches xor $constraint->evaluate($other, '', true);
            },
=======
            static fn (bool $matches, Constraint $constraint): bool => $matches xor $constraint->evaluate($other, '', true),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $initial->evaluate($other, '', true),
        );
    }
}
