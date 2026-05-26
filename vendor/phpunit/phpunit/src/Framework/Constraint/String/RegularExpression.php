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

use function preg_match;
use function sprintf;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
<<<<<<< HEAD
class RegularExpression extends Constraint
{
    /**
     * @var string
     */
    private $pattern;
=======
final class RegularExpression extends Constraint
{
    private readonly string $pattern;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'matches PCRE pattern "%s"',
            $this->pattern,
        );
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
        return preg_match($this->pattern, $other) > 0;
    }
}
