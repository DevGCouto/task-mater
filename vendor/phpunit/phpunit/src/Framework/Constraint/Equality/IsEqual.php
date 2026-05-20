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

use function is_string;
use function sprintf;
<<<<<<< HEAD
use function strpos;
use function trim;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Comparator\ComparisonFailure;
use SebastianBergmann\Comparator\Factory as ComparatorFactory;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use function str_contains;
use function trim;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Util\Exporter;
use SebastianBergmann\Comparator\ComparisonFailure;
use SebastianBergmann\Comparator\Factory as ComparatorFactory;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class IsEqual extends Constraint
{
<<<<<<< HEAD
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var float
     */
    private $delta;

    /**
     * @var bool
     */
    private $canonicalize;

    /**
     * @var bool
     */
    private $ignoreCase;

    public function __construct($value, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false)
    {
        $this->value        = $value;
        $this->delta        = $delta;
        $this->canonicalize = $canonicalize;
        $this->ignoreCase   = $ignoreCase;
=======
    private readonly mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Evaluates the constraint for parameter $other.
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
     * @throws ExpectationFailedException
     */
<<<<<<< HEAD
    public function evaluate($other, string $description = '', bool $returnResult = false): ?bool
=======
    public function evaluate(mixed $other, string $description = '', bool $returnResult = false): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        // If $this->value and $other are identical, they are also equal.
        // This is the most common path and will allow us to skip
        // initialization of all the comparators.
        if ($this->value === $other) {
            return true;
        }

        $comparatorFactory = ComparatorFactory::getInstance();

        try {
            $comparator = $comparatorFactory->getComparatorFor(
                $this->value,
                $other,
            );

            $comparator->assertEquals(
                $this->value,
                $other,
<<<<<<< HEAD
                $this->delta,
                $this->canonicalize,
                $this->ignoreCase,
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        } catch (ComparisonFailure $f) {
            if ($returnResult) {
                return false;
            }

            throw new ExpectationFailedException(
                trim($description . "\n" . $f->getMessage()),
                $f,
            );
        }

        return true;
    }

    /**
     * Returns a string representation of the constraint.
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function toString(): string
    {
        $delta = '';

        if (is_string($this->value)) {
<<<<<<< HEAD
            if (strpos($this->value, "\n") !== false) {
=======
            if (str_contains($this->value, "\n")) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                return 'is equal to <text>';
            }

            return sprintf(
                "is equal to '%s'",
                $this->value,
            );
        }

<<<<<<< HEAD
        if ($this->delta != 0) {
            $delta = sprintf(
                ' with delta <%F>',
                $this->delta,
            );
        }

        return sprintf(
            'is equal to %s%s',
            $this->exporter()->export($this->value),
=======
        return sprintf(
            'is equal to %s%s',
            Exporter::export($this->value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $delta,
        );
    }
}
