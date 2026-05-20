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
use function strpos;
use PHPUnit\Framework\InvalidArgumentException;
=======
use function str_starts_with;
use PHPUnit\Framework\EmptyStringException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class StringStartsWith extends Constraint
{
<<<<<<< HEAD
    /**
     * @var string
     */
    private $prefix;

    public function __construct(string $prefix)
    {
        if ($prefix === '') {
            throw InvalidArgumentException::create(1, 'non-empty string');
=======
    private readonly string $prefix;

    /**
     * @throws EmptyStringException
     */
    public function __construct(string $prefix)
    {
        if ($prefix === '') {
            throw new EmptyStringException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $this->prefix = $prefix;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'starts with "' . $this->prefix . '"';
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
        return strpos((string) $other, $this->prefix) === 0;
=======
     */
    protected function matches(mixed $other): bool
    {
        return str_starts_with((string) $other, $this->prefix);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
