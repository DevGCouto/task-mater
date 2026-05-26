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
use function strlen;
use function substr;
=======
use function str_ends_with;
use PHPUnit\Framework\EmptyStringException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class StringEndsWith extends Constraint
{
<<<<<<< HEAD
    /**
     * @var string
     */
    private $suffix;

    public function __construct(string $suffix)
    {
=======
    private readonly string $suffix;

    /**
     * @throws EmptyStringException
     */
    public function __construct(string $suffix)
    {
        if ($suffix === '') {
            throw new EmptyStringException;
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->suffix = $suffix;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'ends with "' . $this->suffix . '"';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return substr($other, 0 - strlen($this->suffix)) === $this->suffix;
=======
     */
    protected function matches(mixed $other): bool
    {
        return str_ends_with((string) $other, $this->suffix);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
