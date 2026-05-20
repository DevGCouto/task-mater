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
final class IsEqualIgnoringCase extends Constraint
{
<<<<<<< HEAD
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
=======
    private readonly mixed $value;

    public function __construct(mixed $value)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->value = $value;
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
                0.0,
                false,
                true,
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

        return sprintf(
            'is equal to %s',
<<<<<<< HEAD
            $this->exporter()->export($this->value),
=======
            Exporter::export($this->value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
