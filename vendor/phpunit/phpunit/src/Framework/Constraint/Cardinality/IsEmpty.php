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

use function count;
use function gettype;
use function sprintf;
<<<<<<< HEAD
use function strpos;
=======
use function str_starts_with;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use Countable;
use EmptyIterator;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class IsEmpty extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is empty';
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
        if ($other instanceof EmptyIterator) {
            return true;
        }

        if ($other instanceof Countable) {
            return count($other) === 0;
        }

        return empty($other);
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
<<<<<<< HEAD
     *
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
=======
     */
    protected function failureDescription(mixed $other): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $type = gettype($other);

        return sprintf(
            '%s %s %s',
<<<<<<< HEAD
            strpos($type, 'a') === 0 || strpos($type, 'o') === 0 ? 'an' : 'a',
=======
            str_starts_with($type, 'a') || str_starts_with($type, 'o') ? 'an' : 'a',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $type,
            $this->toString(),
        );
    }
}
