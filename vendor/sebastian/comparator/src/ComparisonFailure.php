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

use RuntimeException;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;

<<<<<<< HEAD
/**
 * Thrown when an assertion for string equality failed.
 */
class ComparisonFailure extends RuntimeException
{
    /**
     * Expected value of the retrieval which does not match $actual.
     *
     * @var mixed
     */
    protected $expected;

    /**
     * Actually retrieved value which does not match $expected.
     *
     * @var mixed
     */
    protected $actual;

    /**
     * The string representation of the expected value.
     *
     * @var string
     */
    protected $expectedAsString;

    /**
     * The string representation of the actual value.
     *
     * @var string
     */
    protected $actualAsString;

    /**
     * @var bool
     */
    protected $identical;

    /**
     * Optional message which is placed in front of the first line
     * returned by toString().
     *
     * @var string
     */
    protected $message;

    /**
     * Initialises with the expected value and the actual value.
     *
     * @param mixed  $expected         expected value retrieved
     * @param mixed  $actual           actual value retrieved
     * @param string $expectedAsString
     * @param string $actualAsString
     * @param bool   $identical
     * @param string $message          a string which is prefixed on all returned lines
     *                                 in the difference output
     */
    public function __construct($expected, $actual, $expectedAsString, $actualAsString, $identical = false, $message = '')
    {
=======
final class ComparisonFailure extends RuntimeException
{
    private mixed $expected;
    private mixed $actual;
    private string $expectedAsString;
    private string $actualAsString;

    public function __construct(mixed $expected, mixed $actual, string $expectedAsString, string $actualAsString, string $message = '')
    {
        parent::__construct($message);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->expected         = $expected;
        $this->actual           = $actual;
        $this->expectedAsString = $expectedAsString;
        $this->actualAsString   = $actualAsString;
<<<<<<< HEAD
        $this->message          = $message;
    }

    public function getActual()
=======
    }

    public function getActual(): mixed
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->actual;
    }

<<<<<<< HEAD
    public function getExpected()
=======
    public function getExpected(): mixed
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->expected;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getActualAsString()
=======
    public function getActualAsString(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->actualAsString;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getExpectedAsString()
=======
    public function getExpectedAsString(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->expectedAsString;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getDiff()
=======
    public function getDiff(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!$this->actualAsString && !$this->expectedAsString) {
            return '';
        }

        $differ = new Differ(new UnifiedDiffOutputBuilder("\n--- Expected\n+++ Actual\n"));

        return $differ->diff($this->expectedAsString, $this->actualAsString);
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function toString()
    {
        return $this->message . $this->getDiff();
=======
    public function toString(): string
    {
        return $this->getMessage() . $this->getDiff();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
