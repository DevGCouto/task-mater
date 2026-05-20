<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

<<<<<<< HEAD
use function explode;
use PHPUnit\Util\Test as TestUtil;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
=======
use function assert;
use function class_exists;
use function explode;
use PHPUnit\Framework\TestSize\TestSize;
use PHPUnit\Metadata\Api\Groups;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class DataProviderTestSuite extends TestSuite
{
    /**
     * @var list<ExecutionOrderDependency>
     */
<<<<<<< HEAD
    private $dependencies = [];
=======
    private array $dependencies = [];

    /**
     * @var ?non-empty-list<ExecutionOrderDependency>
     */
    private ?array $providedTests = null;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * @param list<ExecutionOrderDependency> $dependencies
     */
    public function setDependencies(array $dependencies): void
    {
        $this->dependencies = $dependencies;

<<<<<<< HEAD
        foreach ($this->tests as $test) {
            if (!$test instanceof TestCase) {
                // @codeCoverageIgnoreStart
                continue;
                // @codeCoverageIgnoreStart
            }
=======
        foreach ($this->tests() as $test) {
            if (!$test instanceof TestCase) {
                continue;
            }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $test->setDependencies($dependencies);
        }
    }

    /**
<<<<<<< HEAD
     * @return list<ExecutionOrderDependency>
=======
     * @return non-empty-list<ExecutionOrderDependency>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function provides(): array
    {
        if ($this->providedTests === null) {
<<<<<<< HEAD
            $this->providedTests = [new ExecutionOrderDependency($this->getName())];
=======
            $this->providedTests = [new ExecutionOrderDependency($this->name())];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $this->providedTests;
    }

    /**
     * @return list<ExecutionOrderDependency>
     */
    public function requires(): array
    {
        // A DataProviderTestSuite does not have to traverse its child tests
        // as these are inherited and cannot reference dataProvider rows directly
        return $this->dependencies;
    }

    /**
<<<<<<< HEAD
     * Returns the size of the each test created using the data provider(s).
     *
     * @throws InvalidArgumentException
     */
    public function getSize(): int
    {
        [$className, $methodName] = explode('::', $this->getName());

        return TestUtil::getSize($className, $methodName);
=======
     * Returns the size of each test created using the data provider(s).
     */
    public function size(): TestSize
    {
        [$className, $methodName] = explode('::', $this->name());

        assert(class_exists($className));
        assert($methodName !== '');

        return (new Groups)->size($className, $methodName);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
