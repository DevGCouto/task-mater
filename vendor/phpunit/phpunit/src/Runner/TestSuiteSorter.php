<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

use function array_diff;
use function array_merge;
use function array_reverse;
use function array_splice;
<<<<<<< HEAD
=======
use function assert;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function count;
use function in_array;
use function max;
use function shuffle;
use function usort;
use PHPUnit\Framework\DataProviderTestSuite;
use PHPUnit\Framework\Reorderable;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
<<<<<<< HEAD
use PHPUnit\Util\Test as TestUtil;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
=======
use PHPUnit\Runner\ResultCache\NullResultCache;
use PHPUnit\Runner\ResultCache\ResultCache;
use PHPUnit\Runner\ResultCache\ResultCacheId;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestSuiteSorter
{
    /**
     * @var int
     */
    public const ORDER_DEFAULT = 0;

    /**
     * @var int
     */
    public const ORDER_RANDOMIZED = 1;

    /**
     * @var int
     */
    public const ORDER_REVERSED = 2;

    /**
     * @var int
     */
    public const ORDER_DEFECTS_FIRST = 3;

    /**
     * @var int
     */
    public const ORDER_DURATION = 4;

    /**
<<<<<<< HEAD
     * Order tests by @size annotation 'small', 'medium', 'large'.
     *
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @var int
     */
    public const ORDER_SIZE = 5;

<<<<<<< HEAD
    /**
     * List of sorting weights for all test result codes. A higher number gives higher priority.
     */
    private const DEFECT_SORT_WEIGHT = [
        BaseTestRunner::STATUS_ERROR      => 6,
        BaseTestRunner::STATUS_FAILURE    => 5,
        BaseTestRunner::STATUS_WARNING    => 4,
        BaseTestRunner::STATUS_INCOMPLETE => 3,
        BaseTestRunner::STATUS_RISKY      => 2,
        BaseTestRunner::STATUS_SKIPPED    => 1,
        BaseTestRunner::STATUS_UNKNOWN    => 0,
    ];

    private const SIZE_SORT_WEIGHT = [
        TestUtil::SMALL   => 1,
        TestUtil::MEDIUM  => 2,
        TestUtil::LARGE   => 3,
        TestUtil::UNKNOWN => 4,
=======
    private const SIZE_SORT_WEIGHT = [
        'small'   => 1,
        'medium'  => 2,
        'large'   => 3,
        'unknown' => 4,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    ];

    /**
     * @var array<string, int> Associative array of (string => DEFECT_SORT_WEIGHT) elements
     */
<<<<<<< HEAD
    private $defectSortOrder = [];

    /**
     * @var TestResultCache
     */
    private $cache;

    /**
     * @var array<string> A list of normalized names of tests before reordering
     */
    private $originalExecutionOrder = [];

    /**
     * @var array<string> A list of normalized names of tests affected by reordering
     */
    private $executionOrder = [];

    public function __construct(?TestResultCache $cache = null)
    {
        $this->cache = $cache ?? new NullTestResultCache;
=======
    private array $defectSortOrder = [];
    private readonly ResultCache $cache;

    public function __construct(?ResultCache $cache = null)
    {
        $this->cache = $cache ?? new NullResultCache;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @throws Exception
<<<<<<< HEAD
     * @throws InvalidArgumentException
     */
    public function reorderTestsInSuite(Test $suite, int $order, bool $resolveDependencies, int $orderDefects, bool $isRootTestSuite = true): void
=======
     */
    public function reorderTestsInSuite(Test $suite, int $order, bool $resolveDependencies, int $orderDefects): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $allowedOrders = [
            self::ORDER_DEFAULT,
            self::ORDER_REVERSED,
            self::ORDER_RANDOMIZED,
            self::ORDER_DURATION,
            self::ORDER_SIZE,
        ];

        if (!in_array($order, $allowedOrders, true)) {
<<<<<<< HEAD
            throw new Exception(
                '$order must be one of TestSuiteSorter::ORDER_[DEFAULT|REVERSED|RANDOMIZED|DURATION|SIZE]',
            );
=======
            // @codeCoverageIgnoreStart
            throw new InvalidOrderException;
            // @codeCoverageIgnoreEnd
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $allowedOrderDefects = [
            self::ORDER_DEFAULT,
            self::ORDER_DEFECTS_FIRST,
        ];

        if (!in_array($orderDefects, $allowedOrderDefects, true)) {
<<<<<<< HEAD
            throw new Exception(
                '$orderDefects must be one of TestSuiteSorter::ORDER_DEFAULT, TestSuiteSorter::ORDER_DEFECTS_FIRST',
            );
        }

        if ($isRootTestSuite) {
            $this->originalExecutionOrder = $this->calculateTestExecutionOrder($suite);
=======
            // @codeCoverageIgnoreStart
            throw new InvalidOrderException;
            // @codeCoverageIgnoreEnd
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        if ($suite instanceof TestSuite) {
            foreach ($suite as $_suite) {
<<<<<<< HEAD
                $this->reorderTestsInSuite($_suite, $order, $resolveDependencies, $orderDefects, false);
=======
                $this->reorderTestsInSuite($_suite, $order, $resolveDependencies, $orderDefects);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }

            if ($orderDefects === self::ORDER_DEFECTS_FIRST) {
                $this->addSuiteToDefectSortOrder($suite);
            }

            $this->sort($suite, $order, $resolveDependencies, $orderDefects);
        }
<<<<<<< HEAD

        if ($isRootTestSuite) {
            $this->executionOrder = $this->calculateTestExecutionOrder($suite);
        }
    }

    public function getOriginalExecutionOrder(): array
    {
        return $this->originalExecutionOrder;
    }

    public function getExecutionOrder(): array
    {
        return $this->executionOrder;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function sort(TestSuite $suite, int $order, bool $resolveDependencies, int $orderDefects): void
    {
        if (empty($suite->tests())) {
            return;
        }

        if ($order === self::ORDER_REVERSED) {
            $suite->setTests($this->reverse($suite->tests()));
        } elseif ($order === self::ORDER_RANDOMIZED) {
            $suite->setTests($this->randomize($suite->tests()));
<<<<<<< HEAD
        } elseif ($order === self::ORDER_DURATION && $this->cache !== null) {
=======
        } elseif ($order === self::ORDER_DURATION) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $suite->setTests($this->sortByDuration($suite->tests()));
        } elseif ($order === self::ORDER_SIZE) {
            $suite->setTests($this->sortBySize($suite->tests()));
        }

<<<<<<< HEAD
        if ($orderDefects === self::ORDER_DEFECTS_FIRST && $this->cache !== null) {
=======
        if ($orderDefects === self::ORDER_DEFECTS_FIRST) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $suite->setTests($this->sortDefectsFirst($suite->tests()));
        }

        if ($resolveDependencies && !($suite instanceof DataProviderTestSuite)) {
<<<<<<< HEAD
            /** @var TestCase[] $tests */
            $tests = $suite->tests();

=======
            $tests = $suite->tests();

            /** @noinspection PhpParamsInspection */
            /** @phpstan-ignore argument.type */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $suite->setTests($this->resolveDependencies($tests));
        }
    }

<<<<<<< HEAD
    /**
     * @throws InvalidArgumentException
     */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function addSuiteToDefectSortOrder(TestSuite $suite): void
    {
        $max = 0;

        foreach ($suite->tests() as $test) {
            if (!$test instanceof Reorderable) {
                continue;
            }

<<<<<<< HEAD
            if (!isset($this->defectSortOrder[$test->sortId()])) {
                $this->defectSortOrder[$test->sortId()] = self::DEFECT_SORT_WEIGHT[$this->cache->getState($test->sortId())];
                $max                                    = max($max, $this->defectSortOrder[$test->sortId()]);
=======
            $sortId = $test->sortId();

            if (!isset($this->defectSortOrder[$sortId])) {
                $this->defectSortOrder[$sortId] = $this->cache->status(ResultCacheId::fromReorderable($test))->asInt();
                $max                            = max($max, $this->defectSortOrder[$sortId]);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }
        }

        $this->defectSortOrder[$suite->sortId()] = $max;
    }

<<<<<<< HEAD
=======
    /**
     * @param list<Test> $tests
     *
     * @return list<Test>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function reverse(array $tests): array
    {
        return array_reverse($tests);
    }

<<<<<<< HEAD
=======
    /**
     * @param list<Test> $tests
     *
     * @return list<Test>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function randomize(array $tests): array
    {
        shuffle($tests);

        return $tests;
    }

<<<<<<< HEAD
=======
    /**
     * @param list<Test> $tests
     *
     * @return list<Test>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function sortDefectsFirst(array $tests): array
    {
        usort(
            $tests,
<<<<<<< HEAD
            /**
             * @throws InvalidArgumentException
             */
            function ($left, $right)
            {
                return $this->cmpDefectPriorityAndTime($left, $right);
            },
=======
            fn ($left, $right) => $this->cmpDefectPriorityAndTime($left, $right),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        return $tests;
    }

<<<<<<< HEAD
=======
    /**
     * @param list<Test> $tests
     *
     * @return list<Test>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function sortByDuration(array $tests): array
    {
        usort(
            $tests,
<<<<<<< HEAD
            /**
             * @throws InvalidArgumentException
             */
            function ($left, $right)
            {
                return $this->cmpDuration($left, $right);
            },
=======
            fn ($left, $right) => $this->cmpDuration($left, $right),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        return $tests;
    }

<<<<<<< HEAD
=======
    /**
     * @param list<Test> $tests
     *
     * @return list<Test>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function sortBySize(array $tests): array
    {
        usort(
            $tests,
<<<<<<< HEAD
            /**
             * @throws InvalidArgumentException
             */
            function ($left, $right)
            {
                return $this->cmpSize($left, $right);
            },
=======
            fn ($left, $right) => $this->cmpSize($left, $right),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        return $tests;
    }

    /**
     * Comparator callback function to sort tests for "reach failure as fast as possible".
     *
     * 1. sort tests by defect weight defined in self::DEFECT_SORT_WEIGHT
     * 2. when tests are equally defective, sort the fastest to the front
     * 3. do not reorder successful tests
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException
     */
    private function cmpDefectPriorityAndTime(Test $a, Test $b): int
    {
        if (!($a instanceof Reorderable && $b instanceof Reorderable)) {
            return 0;
        }
=======
     */
    private function cmpDefectPriorityAndTime(Test $a, Test $b): int
    {
        assert($a instanceof Reorderable);
        assert($b instanceof Reorderable);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $priorityA = $this->defectSortOrder[$a->sortId()] ?? 0;
        $priorityB = $this->defectSortOrder[$b->sortId()] ?? 0;

        if ($priorityB <=> $priorityA) {
            // Sort defect weight descending
            return $priorityB <=> $priorityA;
        }

        if ($priorityA || $priorityB) {
            return $this->cmpDuration($a, $b);
        }

        // do not change execution order
        return 0;
    }

    /**
     * Compares test duration for sorting tests by duration ascending.
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    private function cmpDuration(Test $a, Test $b): int
    {
        if (!($a instanceof Reorderable && $b instanceof Reorderable)) {
            return 0;
        }

<<<<<<< HEAD
        return $this->cache->getTime($a->sortId()) <=> $this->cache->getTime($b->sortId());
=======
        return $this->cache->time(ResultCacheId::fromReorderable($a)) <=> $this->cache->time(ResultCacheId::fromReorderable($b));
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Compares test size for sorting tests small->medium->large->unknown.
     */
    private function cmpSize(Test $a, Test $b): int
    {
        $sizeA = ($a instanceof TestCase || $a instanceof DataProviderTestSuite)
<<<<<<< HEAD
            ? $a->getSize()
            : TestUtil::UNKNOWN;
        $sizeB = ($b instanceof TestCase || $b instanceof DataProviderTestSuite)
            ? $b->getSize()
            : TestUtil::UNKNOWN;
=======
            ? $a->size()->asString()
            : 'unknown';
        $sizeB = ($b instanceof TestCase || $b instanceof DataProviderTestSuite)
            ? $b->size()->asString()
            : 'unknown';
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        return self::SIZE_SORT_WEIGHT[$sizeA] <=> self::SIZE_SORT_WEIGHT[$sizeB];
    }

    /**
     * Reorder Tests within a TestCase in such a way as to resolve as many dependencies as possible.
     * The algorithm will leave the tests in original running order when it can.
     * For more details see the documentation for test dependencies.
     *
     * Short description of algorithm:
     * 1. Pick the next Test from remaining tests to be checked for dependencies.
     * 2. If the test has no dependencies: mark done, start again from the top
     * 3. If the test has dependencies but none left to do: mark done, start again from the top
     * 4. When we reach the end add any leftover tests to the end. These will be marked 'skipped' during execution.
     *
     * @param array<DataProviderTestSuite|TestCase> $tests
     *
     * @return array<DataProviderTestSuite|TestCase>
     */
    private function resolveDependencies(array $tests): array
    {
        $newTestOrder = [];
        $i            = 0;
        $provided     = [];

        do {
            if ([] === array_diff($tests[$i]->requires(), $provided)) {
                $provided     = array_merge($provided, $tests[$i]->provides());
                $newTestOrder = array_merge($newTestOrder, array_splice($tests, $i, 1));
                $i            = 0;
            } else {
                $i++;
            }
        } while (!empty($tests) && ($i < count($tests)));

        return array_merge($newTestOrder, $tests);
    }
<<<<<<< HEAD

    /**
     * @throws InvalidArgumentException
     */
    private function calculateTestExecutionOrder(Test $suite): array
    {
        $tests = [];

        if ($suite instanceof TestSuite) {
            foreach ($suite->tests() as $test) {
                if (!$test instanceof TestSuite && $test instanceof Reorderable) {
                    $tests[] = $test->sortId();
                } else {
                    $tests = array_merge($tests, $this->calculateTestExecutionOrder($test));
                }
            }
        }

        return $tests;
    }
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
