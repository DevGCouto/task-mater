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

use function array_key_exists;
<<<<<<< HEAD
=======
use function assert;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function is_array;
use function sort;
use function sprintf;
use function str_replace;
use function trim;
<<<<<<< HEAD

/**
 * Compares arrays for equality.
 *
=======
use SebastianBergmann\Exporter\Exporter;

/**
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * Arrays are equal if they contain the same key-value pairs.
 * The order of the keys does not matter.
 * The types of key-value pairs do not matter.
 */
class ArrayComparator extends Comparator
{
<<<<<<< HEAD
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
    public function accepts(mixed $expected, mixed $actual): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return is_array($expected) && is_array($actual);
    }

    /**
<<<<<<< HEAD
     * Asserts that two arrays are equal.
     *
     * @param mixed $expected     First value to compare
     * @param mixed $actual       Second value to compare
     * @param float $delta        Allowed numerical distance between two values to consider them equal
     * @param bool  $canonicalize Arrays are sorted before comparison when set to true
     * @param bool  $ignoreCase   Case is ignored when set to true
     * @param array $processed    List of already processed elements (used to prevent infinite recursion)
     *
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = [])/*: void*/
    {
=======
     * @param array<mixed> $processed
     *
     * @throws ComparisonFailure
     */
    public function assertEquals(mixed $expected, mixed $actual, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false, array &$processed = []): void
    {
        assert(is_array($expected));
        assert(is_array($actual));

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($canonicalize) {
            sort($expected);
            sort($actual);
        }

        $remaining        = $actual;
        $actualAsString   = "Array (\n";
        $expectedAsString = "Array (\n";
        $equal            = true;
<<<<<<< HEAD
=======
        $exporter         = new Exporter;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        foreach ($expected as $key => $value) {
            unset($remaining[$key]);

            if (!array_key_exists($key, $actual)) {
                $expectedAsString .= sprintf(
                    "    %s => %s\n",
<<<<<<< HEAD
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($value)
=======
                    $exporter->export($key),
                    $exporter->shortenedExport($value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );

                $equal = false;

                continue;
            }

            try {
<<<<<<< HEAD
                $comparator = $this->factory->getComparatorFor($value, $actual[$key]);
=======
                $comparator = $this->factory()->getComparatorFor($value, $actual[$key]);

                /** @phpstan-ignore arguments.count */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $comparator->assertEquals($value, $actual[$key], $delta, $canonicalize, $ignoreCase, $processed);

                $expectedAsString .= sprintf(
                    "    %s => %s\n",
<<<<<<< HEAD
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($value)
=======
                    $exporter->export($key),
                    $exporter->shortenedExport($value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );

                $actualAsString .= sprintf(
                    "    %s => %s\n",
<<<<<<< HEAD
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($actual[$key])
=======
                    $exporter->export($key),
                    $exporter->shortenedExport($actual[$key]),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );
            } catch (ComparisonFailure $e) {
                $expectedAsString .= sprintf(
                    "    %s => %s\n",
<<<<<<< HEAD
                    $this->exporter->export($key),
                    $e->getExpectedAsString() ? $this->indent($e->getExpectedAsString()) : $this->exporter->shortenedExport($e->getExpected())
=======
                    $exporter->export($key),
                    $e->getExpectedAsString() ? $this->indent($e->getExpectedAsString()) : $exporter->shortenedExport($e->getExpected()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );

                $actualAsString .= sprintf(
                    "    %s => %s\n",
<<<<<<< HEAD
                    $this->exporter->export($key),
                    $e->getActualAsString() ? $this->indent($e->getActualAsString()) : $this->exporter->shortenedExport($e->getActual())
=======
                    $exporter->export($key),
                    $e->getActualAsString() ? $this->indent($e->getActualAsString()) : $exporter->shortenedExport($e->getActual()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );

                $equal = false;
            }
        }

        foreach ($remaining as $key => $value) {
            $actualAsString .= sprintf(
                "    %s => %s\n",
<<<<<<< HEAD
                $this->exporter->export($key),
                $this->exporter->shortenedExport($value)
=======
                $exporter->export($key),
                $exporter->shortenedExport($value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );

            $equal = false;
        }

        $expectedAsString .= ')';
        $actualAsString .= ')';

        if (!$equal) {
            throw new ComparisonFailure(
                $expected,
                $actual,
                $expectedAsString,
                $actualAsString,
<<<<<<< HEAD
                false,
                'Failed asserting that two arrays are equal.'
=======
                'Failed asserting that two arrays are equal.',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

<<<<<<< HEAD
    protected function indent($lines)
=======
    private function indent(string $lines): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return trim(str_replace("\n", "\n    ", $lines));
    }
}
