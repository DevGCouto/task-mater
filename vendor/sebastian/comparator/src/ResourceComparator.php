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

<<<<<<< HEAD
use function is_resource;

/**
 * Compares resources for equality.
 */
class ResourceComparator extends Comparator
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
use function assert;
use function is_resource;
use SebastianBergmann\Exporter\Exporter;

final class ResourceComparator extends Comparator
{
    public function accepts(mixed $expected, mixed $actual): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return is_resource($expected) && is_resource($actual);
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
=======
     * @throws ComparisonFailure
     */
    public function assertEquals(mixed $expected, mixed $actual, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        assert(is_resource($expected));
        assert(is_resource($actual));

        $exporter = new Exporter;

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($actual != $expected) {
            throw new ComparisonFailure(
                $expected,
                $actual,
<<<<<<< HEAD
                $this->exporter->export($expected),
                $this->exporter->export($actual)
=======
                $exporter->export($expected),
                $exporter->export($actual),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }
}
