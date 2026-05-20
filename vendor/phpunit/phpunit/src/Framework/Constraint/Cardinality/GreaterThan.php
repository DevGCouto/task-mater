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
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use PHPUnit\Util\Exporter;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class GreaterThan extends Constraint
{
<<<<<<< HEAD
    /**
     * @var float|int
     */
    private $value;

    /**
     * @param float|int $value
     */
    public function __construct($value)
=======
    private readonly mixed $value;

    public function __construct(mixed $value)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->value = $value;
    }

    /**
     * Returns a string representation of the constraint.
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException
     */
    public function toString(): string
    {
        return 'is greater than ' . $this->exporter()->export($this->value);
=======
     */
    public function toString(): string
    {
        return 'is greater than ' . Exporter::export($this->value);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
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
        return $this->value < $other;
    }
}
