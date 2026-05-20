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
use SebastianBergmann\Exporter\Exporter;

/**
 * Abstract base class for comparators which compare values for equality.
 */
abstract class Comparator
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @var Exporter
     */
    protected $exporter;

    public function __construct()
    {
        $this->exporter = new Exporter;
    }

    public function setFactory(Factory $factory)/*: void*/
=======
abstract class Comparator
{
    private Factory $factory;

    public function setFactory(Factory $factory): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->factory = $factory;
    }

<<<<<<< HEAD
    /**
     * Returns whether the comparator can compare two values.
     *
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
     * @return bool
     */
    abstract public function accepts($expected, $actual);

    /**
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
    abstract public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false);
=======
    abstract public function accepts(mixed $expected, mixed $actual): bool;

    /**
     * @throws ComparisonFailure
     */
    abstract public function assertEquals(mixed $expected, mixed $actual, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false): void;

    protected function factory(): Factory
    {
        return $this->factory;
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
