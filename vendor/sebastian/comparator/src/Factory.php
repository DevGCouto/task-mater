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
use function array_unshift;

/**
 * Factory for comparators which compare values for equality.
 */
class Factory
{
    /**
     * @var Factory
     */
    private static $instance;

    /**
     * @var Comparator[]
     */
    private $customComparators = [];

    /**
     * @var Comparator[]
     */
    private $defaultComparators = [];

    /**
     * @return Factory
     */
    public static function getInstance()
=======
use const PHP_VERSION;
use function array_unshift;
use function extension_loaded;
use function version_compare;

final class Factory
{
    private static ?Factory $instance = null;

    /**
     * @var array<non-negative-int, Comparator>
     */
    private array $customComparators = [];

    /**
     * @var list<Comparator>
     */
    private array $defaultComparators = [];

    public static function getInstance(): self
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (self::$instance === null) {
            self::$instance = new self; // @codeCoverageIgnore
        }

        return self::$instance;
    }

<<<<<<< HEAD
    /**
     * Constructs a new factory.
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct()
    {
        $this->registerDefaultComparators();
    }

<<<<<<< HEAD
    /**
     * Returns the correct comparator for comparing two values.
     *
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
     * @return Comparator
     */
    public function getComparatorFor($expected, $actual)
=======
    public function getComparatorFor(mixed $expected, mixed $actual): Comparator
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        foreach ($this->customComparators as $comparator) {
            if ($comparator->accepts($expected, $actual)) {
                return $comparator;
            }
        }

        foreach ($this->defaultComparators as $comparator) {
            if ($comparator->accepts($expected, $actual)) {
                return $comparator;
            }
        }

        throw new RuntimeException('No suitable Comparator implementation found');
    }

    /**
     * Registers a new comparator.
     *
     * This comparator will be returned by getComparatorFor() if its accept() method
     * returns TRUE for the compared values. It has higher priority than the
     * existing comparators, meaning that its accept() method will be invoked
     * before those of the other comparators.
<<<<<<< HEAD
     *
     * @param Comparator $comparator The comparator to be registered
     */
    public function register(Comparator $comparator)/*: void*/
=======
     */
    public function register(Comparator $comparator): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        array_unshift($this->customComparators, $comparator);

        $comparator->setFactory($this);
    }

    /**
     * Unregisters a comparator.
     *
     * This comparator will no longer be considered by getComparatorFor().
<<<<<<< HEAD
     *
     * @param Comparator $comparator The comparator to be unregistered
     */
    public function unregister(Comparator $comparator)/*: void*/
=======
     */
    public function unregister(Comparator $comparator): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        foreach ($this->customComparators as $key => $_comparator) {
            if ($comparator === $_comparator) {
                unset($this->customComparators[$key]);
            }
        }
    }

<<<<<<< HEAD
    /**
     * Unregisters all non-default comparators.
     */
    public function reset()/*: void*/
=======
    public function reset(): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->customComparators = [];
    }

    private function registerDefaultComparators(): void
    {
        $this->registerDefaultComparator(new MockObjectComparator);
        $this->registerDefaultComparator(new DateTimeComparator);
        $this->registerDefaultComparator(new DOMNodeComparator);
        $this->registerDefaultComparator(new SplObjectStorageComparator);
        $this->registerDefaultComparator(new ExceptionComparator);
<<<<<<< HEAD
=======
        $this->registerDefaultComparator(new EnumerationComparator);

        if (extension_loaded('bcmath') && version_compare(PHP_VERSION, '8.4.0', '>=')) {
            $this->registerDefaultComparator(new NumberComparator);
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->registerDefaultComparator(new ObjectComparator);
        $this->registerDefaultComparator(new ResourceComparator);
        $this->registerDefaultComparator(new ArrayComparator);
        $this->registerDefaultComparator(new NumericComparator);
        $this->registerDefaultComparator(new ScalarComparator);
        $this->registerDefaultComparator(new TypeComparator);
    }

    private function registerDefaultComparator(Comparator $comparator): void
    {
        $this->defaultComparators[] = $comparator;

        $comparator->setFactory($this);
    }
}
