<?php declare(strict_types=1);
/*
 * This file is part of sebastian/comparator.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Comparator;

use function abs;
<<<<<<< HEAD
=======
use function assert;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function is_float;
use function is_infinite;
use function is_nan;
use function is_numeric;
use function is_string;
use function sprintf;
<<<<<<< HEAD

/**
 * Compares numerical values for equality.
 */
class NumericComparator extends ScalarComparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
     * @return bool
     */
    public function accepts($expected, $actual)
=======
use SebastianBergmann\Exporter\Exporter;

final class NumericComparator extends ScalarComparator
{
    public function accepts(mixed $expected, mixed $actual): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        // all numerical values, but not if both of them are strings
        return is_numeric($expected) && is_numeric($actual) &&
               !(is_string($expected) && is_string($actual));
    }

    /**
<<<<<<< HEAD
     * Asserts that two values are equal.
     *
     * @param mixed $expected     First value to compare
     * @param mixed $actual       Second value to compare
     * @param float $delta        Allowed numerical distance between two values to consider them equal
     * @param bool  $canonicalize Arrays are sorted before comparison when set to true
     * @param bool  $ignoreCase   Case is ignored when set to true
     *
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false)/*: void*/
    {
        if ($this->isInfinite($actual) && $this->isInfinite($expected)) {
            return;
=======
     * @throws ComparisonFailure
     */
    public function assertEquals(mixed $expected, mixed $actual, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        assert(is_numeric($expected));
        assert(is_numeric($actual));

        if ($this->isInfinite($expected) && $this->isInfinite($actual)) {
            if ($expected < 0 && $actual < 0) {
                return;
            }

            if ($expected > 0 && $actual > 0) {
                return;
            }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        if (($this->isInfinite($actual) xor $this->isInfinite($expected)) ||
            ($this->isNan($actual) || $this->isNan($expected)) ||
            abs($actual - $expected) > $delta) {
<<<<<<< HEAD
=======
            $exporter = new Exporter;

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            throw new ComparisonFailure(
                $expected,
                $actual,
                '',
                '',
<<<<<<< HEAD
                false,
                sprintf(
                    'Failed asserting that %s matches expected %s.',
                    $this->exporter->export($actual),
                    $this->exporter->export($expected)
                )
=======
                sprintf(
                    'Failed asserting that %s matches expected %s.',
                    $exporter->export($actual),
                    $exporter->export($expected),
                ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

<<<<<<< HEAD
    private function isInfinite($value): bool
=======
    private function isInfinite(mixed $value): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return is_float($value) && is_infinite($value);
    }

<<<<<<< HEAD
    private function isNan($value): bool
=======
    private function isNan(mixed $value): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return is_float($value) && is_nan($value);
    }
}
