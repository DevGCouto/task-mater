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

<<<<<<< HEAD
use function array_map;
use function array_merge;
use function in_array;
use function spl_object_hash;
use PHPUnit\Framework\TestSuite;
=======
use function array_merge;
use function array_push;
use function in_array;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\PhptTestCase;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use RecursiveFilterIterator;
use RecursiveIterator;

/**
<<<<<<< HEAD
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
abstract class GroupFilterIterator extends RecursiveFilterIterator
{
    /**
<<<<<<< HEAD
     * @var string[]
     */
    protected $groupTests = [];

=======
     * @var list<non-empty-string>
     */
    private readonly array $groupTests;

    /**
     * @param RecursiveIterator<int, Test> $iterator
     * @param list<non-empty-string>       $groups
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct(RecursiveIterator $iterator, array $groups, TestSuite $suite)
    {
        parent::__construct($iterator);

<<<<<<< HEAD
        foreach ($suite->getGroupDetails() as $group => $tests) {
            if (in_array((string) $group, $groups, true)) {
                $testHashes = array_map(
                    'spl_object_hash',
                    $tests,
                );

                $this->groupTests = array_merge($this->groupTests, $testHashes);
            }
        }
=======
        $groupTests = [];

        foreach ($suite->groups() as $group => $tests) {
            if (in_array($group, $groups, true)) {
                $groupTests = array_merge($groupTests, $tests);

                array_push($groupTests, ...$groupTests);
            }
        }

        $this->groupTests = $groupTests;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function accept(): bool
    {
        $test = $this->getInnerIterator()->current();

        if ($test instanceof TestSuite) {
            return true;
        }

<<<<<<< HEAD
        return $this->doAccept(spl_object_hash($test));
    }

    abstract protected function doAccept(string $hash);
=======
        if ($test instanceof TestCase || $test instanceof PhptTestCase) {
            return $this->doAccept($test->valueObjectForEvents()->id(), $this->groupTests);
        }

        return true;
    }

    /**
     * @param non-empty-string       $id
     * @param list<non-empty-string> $groupTests
     */
    abstract protected function doAccept(string $id, array $groupTests): bool;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
