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

use function gettype;
use function sprintf;
<<<<<<< HEAD

/**
 * Compares values for type equality.
 */
class TypeComparator extends Comparator
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

final class TypeComparator extends Comparator
{
    public function accepts(mixed $expected, mixed $actual): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return true;
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
=======
     * @throws ComparisonFailure
     */
    public function assertEquals(mixed $expected, mixed $actual, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (gettype($expected) != gettype($actual)) {
            throw new ComparisonFailure(
                $expected,
                $actual,
                // we don't need a diff
                '',
                '',
<<<<<<< HEAD
                false,
                sprintf(
                    '%s does not match expected type "%s".',
                    $this->exporter->shortenedExport($actual),
                    gettype($expected)
                )
=======
                sprintf(
                    '%s does not match expected type "%s".',
                    (new Exporter)->shortenedExport($actual),
                    gettype($expected),
                ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }
}
