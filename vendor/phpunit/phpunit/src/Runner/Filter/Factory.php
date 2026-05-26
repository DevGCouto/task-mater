<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Filter;

use function assert;
<<<<<<< HEAD
use function sprintf;
use FilterIterator;
use Iterator;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\Exception;
use RecursiveFilterIterator;
use ReflectionClass;

/**
=======
use FilterIterator;
use Iterator;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestSuite;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Factory
{
    /**
<<<<<<< HEAD
     * @psalm-var array<int,array{0: ReflectionClass, 1: array|string}>
     */
    private $filters = [];

    /**
     * @param array|string $args
     *
     * @throws Exception
     */
    public function addFilter(ReflectionClass $filter, $args): void
    {
        if (!$filter->isSubclassOf(RecursiveFilterIterator::class)) {
            throw new Exception(
                sprintf(
                    'Class "%s" does not extend RecursiveFilterIterator',
                    $filter->name,
                ),
            );
        }

        $this->filters[] = [$filter, $args];
    }

    public function factory(Iterator $iterator, TestSuite $suite): FilterIterator
    {
        foreach ($this->filters as $filter) {
            [$class, $args] = $filter;
            $iterator       = $class->newInstance($iterator, $args, $suite);
=======
     * @var list<array{className: class-string<FilterIterator<int, Test, Iterator<int, Test>>>, argument: list<non-empty-string>|non-empty-string}>
     */
    private array $filters = [];

    /**
     * @param list<non-empty-string> $testIds
     */
    public function addTestIdFilter(array $testIds): void
    {
        $this->filters[] = [
            'className' => TestIdFilterIterator::class,
            'argument'  => $testIds,
        ];
    }

    /**
     * @param list<non-empty-string> $groups
     */
    public function addIncludeGroupFilter(array $groups): void
    {
        $this->filters[] = [
            'className' => IncludeGroupFilterIterator::class,
            'argument'  => $groups,
        ];
    }

    /**
     * @param list<non-empty-string> $groups
     */
    public function addExcludeGroupFilter(array $groups): void
    {
        $this->filters[] = [
            'className' => ExcludeGroupFilterIterator::class,
            'argument'  => $groups,
        ];
    }

    /**
     * @param non-empty-string $name
     */
    public function addIncludeNameFilter(string $name): void
    {
        $this->filters[] = [
            'className' => IncludeNameFilterIterator::class,
            'argument'  => $name,
        ];
    }

    /**
     * @param non-empty-string $name
     */
    public function addExcludeNameFilter(string $name): void
    {
        $this->filters[] = [
            'className' => ExcludeNameFilterIterator::class,
            'argument'  => $name,
        ];
    }

    /**
     * @param Iterator<int, Test> $iterator
     *
     * @return FilterIterator<int, Test, Iterator<int, Test>>
     */
    public function factory(Iterator $iterator, TestSuite $suite): FilterIterator
    {
        foreach ($this->filters as $filter) {
            $iterator = new $filter['className'](
                $iterator,
                $filter['argument'],
                $suite,
            );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        assert($iterator instanceof FilterIterator);

        return $iterator;
    }
}
