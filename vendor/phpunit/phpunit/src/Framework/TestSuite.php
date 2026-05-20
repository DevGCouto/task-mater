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

use const PHP_EOL;
<<<<<<< HEAD
use function array_keys;
use function array_map;
use function array_merge;
use function array_slice;
use function array_unique;
use function basename;
use function call_user_func;
use function class_exists;
use function count;
use function dirname;
use function get_declared_classes;
use function implode;
use function is_bool;
use function is_callable;
use function is_file;
use function is_object;
use function is_string;
use function method_exists;
use function preg_match;
use function preg_quote;
use function sprintf;
use function strpos;
use function substr;
use Iterator;
use IteratorAggregate;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\Filter\Factory;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Reflection;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
=======
use function array_merge;
use function array_pop;
use function array_reverse;
use function assert;
use function call_user_func;
use function class_exists;
use function count;
use function implode;
use function is_callable;
use function is_file;
use function is_subclass_of;
use function sprintf;
use function str_ends_with;
use function str_starts_with;
use function trim;
use Iterator;
use IteratorAggregate;
use PHPUnit\Event;
use PHPUnit\Event\Code\TestMethod;
use PHPUnit\Event\NoPreviousThrowableException;
use PHPUnit\Metadata\Api\Dependencies;
use PHPUnit\Metadata\Api\Groups;
use PHPUnit\Metadata\Api\HookMethods;
use PHPUnit\Metadata\Api\Requirements;
use PHPUnit\Metadata\MetadataCollection;
use PHPUnit\Runner\Exception as RunnerException;
use PHPUnit\Runner\Filter\Factory;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Runner\TestSuiteLoader;
use PHPUnit\TestRunner\TestResult\Facade as TestResultFacade;
use PHPUnit\Util\Filter;
use PHPUnit\Util\Reflection;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use ReflectionMethod;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
use Throwable;

/**
<<<<<<< HEAD
 * @template-implements IteratorAggregate<int, Test>
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class TestSuite implements IteratorAggregate, Reorderable, SelfDescribing, Test
{
    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     *
     * @var bool
     */
    protected $backupGlobals;

    /**
     * Enable or disable the backup and restoration of static attributes.
     *
     * @var bool
     */
    protected $backupStaticAttributes;

    /**
     * @var bool
     */
    protected $runTestInSeparateProcess = false;

    /**
     * The name of the test suite.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The test groups of the test suite.
     *
     * @psalm-var array<string,list<Test>>
     */
    protected $groups = [];

    /**
     * The tests in the test suite.
     *
     * @var Test[]
     */
    protected $tests = [];

    /**
     * The number of tests in the test suite.
     *
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var bool
     */
    protected $testCase = false;

    /**
     * @var string[]
     */
    protected $foundClasses = [];

    /**
     * @var null|list<ExecutionOrderDependency>
     */
    protected $providedTests;

    /**
     * @var null|list<ExecutionOrderDependency>
     */
    protected $requiredTests;

    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState;

    /**
     * @var Factory
     */
    private $iteratorFilter;

    /**
     * @var int
     */
    private $declaredClassesPointer;

    /**
     * @psalm-var array<int,string>
     */
    private $warnings = [];

    /**
     * Constructs a new TestSuite.
     *
     *   - PHPUnit\Framework\TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit\Framework\TestSuite(String) either constructs a
     *     TestSuite from the given class (if the passed string is the
     *     name of an existing class) or constructs an empty TestSuite
     *     with the given name.
     *
     * @param ReflectionClass|string $theClass
     *
     * @throws Exception
     */
    public function __construct($theClass = '', string $name = '')
    {
        if (!is_string($theClass) && !$theClass instanceof ReflectionClass) {
            throw InvalidArgumentException::create(
                1,
                'ReflectionClass object or string',
            );
        }

        $this->declaredClassesPointer = count(get_declared_classes());

        if (!$theClass instanceof ReflectionClass) {
            if (class_exists($theClass, true)) {
                if ($name === '') {
                    $name = $theClass;
                }

                try {
                    $theClass = new ReflectionClass($theClass);
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e,
                    );
                }
                // @codeCoverageIgnoreEnd
            } else {
                $this->setName($theClass);

                return;
            }
        }

        if (!$theClass->isSubclassOf(TestCase::class)) {
            $this->setName((string) $theClass);

            return;
        }

        if ($name !== '') {
            $this->setName($name);
        } else {
            $this->setName($theClass->getName());
        }

        $constructor = $theClass->getConstructor();

        if ($constructor !== null &&
            !$constructor->isPublic()) {
            $this->addTest(
                new WarningTestCase(
                    sprintf(
                        'Class "%s" has no public constructor.',
                        $theClass->getName(),
                    ),
                ),
            );

            return;
        }

        foreach ((new Reflection)->publicMethodsInTestClass($theClass) as $method) {
=======
 * @template-implements IteratorAggregate<non-negative-int, Test>
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class TestSuite implements IteratorAggregate, Reorderable, Test
{
    /**
     * @var non-empty-string
     */
    private string $name;

    /**
     * @var array<non-empty-string, list<non-empty-string>>
     */
    private array $groups = [];

    /**
     * @var ?list<ExecutionOrderDependency>
     */
    private ?array $requiredTests = null;

    /**
     * @var list<Test>
     */
    private array $tests = [];

    /**
     * @var ?list<ExecutionOrderDependency>
     */
    private ?array $providedTests    = null;
    private ?Factory $iteratorFilter = null;
    private bool $wasRun             = false;

    /**
     * @param non-empty-string $name
     */
    public static function empty(string $name): static
    {
        return new static($name);
    }

    /**
     * @param ReflectionClass<TestCase> $class
     * @param list<non-empty-string>    $groups
     */
    public static function fromClassReflector(ReflectionClass $class, array $groups = []): static
    {
        $testSuite = new static($class->getName());

        foreach (Reflection::publicMethodsDeclaredDirectlyInTestClass($class) as $method) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            if (!TestUtil::isTestMethod($method)) {
                continue;
            }

<<<<<<< HEAD
            $this->addTestMethod($theClass, $method);
        }

        if (empty($this->tests)) {
            $this->addTest(
                new WarningTestCase(
                    sprintf(
                        'No tests found in class "%s".',
                        $theClass->getName(),
                    ),
=======
            $testSuite->addTestMethod($class, $method, $groups);
        }

        if ($testSuite->isEmpty()) {
            Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                sprintf(
                    'No tests found in class "%s".',
                    $class->getName(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                ),
            );
        }

<<<<<<< HEAD
        $this->testCase = true;
    }

    /**
     * Returns a string representation of the test suite.
     */
    public function toString(): string
    {
        return $this->getName();
=======
        return $testSuite;
    }

    /**
     * @param non-empty-string $name
     */
    final private function __construct(string $name)
    {
        $this->name = $name;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Adds a test to the suite.
     *
<<<<<<< HEAD
     * @param array $groups
     */
    public function addTest(Test $test, $groups = []): void
    {
        try {
            $class = new ReflectionClass($test);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e,
            );
        }
        // @codeCoverageIgnoreEnd

        if (!$class->isAbstract()) {
            $this->tests[] = $test;
            $this->clearCaches();

            if ($test instanceof self && empty($groups)) {
                $groups = $test->getGroups();
            }

            if ($this->containsOnlyVirtualGroups($groups)) {
                $groups[] = 'default';
            }

            foreach ($groups as $group) {
                if (!isset($this->groups[$group])) {
                    $this->groups[$group] = [$test];
                } else {
                    $this->groups[$group][] = $test;
                }
            }

            if ($test instanceof TestCase) {
                $test->setGroups($groups);
=======
     * @param list<non-empty-string> $groups
     */
    public function addTest(Test $test, array $groups = []): void
    {
        if ($test instanceof self) {
            $this->tests[] = $test;

            $this->clearCaches();

            return;
        }

        assert($test instanceof TestCase || $test instanceof PhptTestCase);

        $class = new ReflectionClass($test);

        if ($class->isAbstract()) {
            return;
        }

        $this->tests[] = $test;

        $this->clearCaches();

        if ($this->containsOnlyVirtualGroups($groups)) {
            $groups[] = 'default';
        }

        if ($test instanceof TestCase) {
            $id = $test->valueObjectForEvents()->id();

            $test->setGroups($groups);
        } else {
            $id = $test->valueObjectForEvents()->id();
        }

        foreach ($groups as $group) {
            if (!isset($this->groups[$group])) {
                $this->groups[$group] = [$id];
            } else {
                $this->groups[$group][] = $id;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }
        }
    }

    /**
     * Adds the tests from the given class to the suite.
     *
<<<<<<< HEAD
     * @psalm-param object|class-string $testClass
     *
     * @throws Exception
     */
    public function addTestSuite($testClass): void
    {
        if (!(is_object($testClass) || (is_string($testClass) && class_exists($testClass)))) {
            throw InvalidArgumentException::create(
                1,
                'class name or object',
            );
        }

        if (!is_object($testClass)) {
            try {
                $testClass = new ReflectionClass($testClass);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e,
                );
            }
            // @codeCoverageIgnoreEnd
        }

        if ($testClass instanceof self) {
            $this->addTest($testClass);
        } elseif ($testClass instanceof ReflectionClass) {
            $suiteMethod = false;

            if (!$testClass->isAbstract() && $testClass->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                try {
                    $method = $testClass->getMethod(
                        BaseTestRunner::SUITE_METHODNAME,
                    );
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e,
                    );
                }
                // @codeCoverageIgnoreEnd

                if ($method->isStatic()) {
                    $this->addTest(
                        $method->invoke(null, $testClass->getName()),
                    );

                    $suiteMethod = true;
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract() && $testClass->isSubclassOf(TestCase::class)) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new Exception;
        }
    }

    public function addWarning(string $warning): void
    {
        $this->warnings[] = $warning;
=======
     * @param ReflectionClass<TestCase> $testClass
     * @param list<non-empty-string>    $groups
     *
     * @throws Exception
     */
    public function addTestSuite(ReflectionClass $testClass, array $groups = []): void
    {
        if ($testClass->isAbstract()) {
            throw new Exception(
                sprintf(
                    'Class %s is abstract',
                    $testClass->getName(),
                ),
            );
        }

        if (!$testClass->isSubclassOf(TestCase::class)) {
            throw new Exception(
                sprintf(
                    'Class %s is not a subclass of %s',
                    $testClass->getName(),
                    TestCase::class,
                ),
            );
        }

        $this->addTest(self::fromClassReflector($testClass, $groups), $groups);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Wraps both <code>addTest()</code> and <code>addTestSuite</code>
     * as well as the separate import statements for the user's convenience.
     *
     * If the named file cannot be read or there are no new tests that can be
     * added, a <code>PHPUnit\Framework\WarningTestCase</code> will be created instead,
     * leaving the current test run untouched.
     *
<<<<<<< HEAD
     * @throws Exception
     */
    public function addTestFile(string $filename): void
    {
        if (is_file($filename) && substr($filename, -5) === '.phpt') {
            $this->addTest(new PhptTestCase($filename));

            $this->declaredClassesPointer = count(get_declared_classes());

            return;
        }

        $numTests = count($this->tests);

        // The given file may contain further stub classes in addition to the
        // test class itself. Figure out the actual test class.
        $filename   = FileLoader::checkAndLoad($filename);
        $newClasses = array_slice(get_declared_classes(), $this->declaredClassesPointer);

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // accumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if (!empty($newClasses)) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
            $this->foundClasses           = array_merge($newClasses, $this->foundClasses);
            $this->declaredClassesPointer = count(get_declared_classes());
        }

        // The test class's name must match the filename, either in full, or as
        // a PEAR/PSR-0 prefixed short name ('NameSpace_ShortName'), or as a
        // PSR-1 local short name ('NameSpace\ShortName'). The comparison must be
        // anchored to prevent false-positive matches (e.g., 'OtherShortName').
        $shortName      = basename($filename, '.php');
        $shortNameRegEx = '/(?:^|_|\\\\)' . preg_quote($shortName, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (preg_match($shortNameRegEx, $className)) {
                try {
                    $class = new ReflectionClass($className);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e,
                    );
                }
                // @codeCoverageIgnoreEnd

                if ($class->getFileName() == $filename) {
                    $newClasses = [$className];
                    unset($this->foundClasses[$i]);

                    break;
                }
            }
        }

        foreach ($newClasses as $className) {
            try {
                $class = new ReflectionClass($className);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e,
                );
            }
            // @codeCoverageIgnoreEnd

            if (dirname($class->getFileName()) === __DIR__) {
                continue;
            }

            if ($class->isAbstract() && $class->isSubclassOf(TestCase::class)) {
                $this->addWarning(
                    sprintf(
                        'Abstract test case classes with "Test" suffix are deprecated (%s)',
                        $class->getName(),
                    ),
                );
            }

            if (!$class->isAbstract()) {
                if ($class->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                    try {
                        $method = $class->getMethod(
                            BaseTestRunner::SUITE_METHODNAME,
                        );
                        // @codeCoverageIgnoreStart
                    } catch (ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            $e->getCode(),
                            $e,
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    if ($method->isStatic()) {
                        $this->addTest($method->invoke(null, $className));
                    }
                } elseif ($class->implementsInterface(Test::class)) {
                    // Do we have modern namespacing ('Foo\Bar\WhizBangTest') or old-school namespacing ('Foo_Bar_WhizBangTest')?
                    $isPsr0            = (!$class->inNamespace()) && (strpos($class->getName(), '_') !== false);
                    $expectedClassName = $isPsr0 ? $className : $shortName;

                    if (($pos = strpos($expectedClassName, '.')) !== false) {
                        $expectedClassName = substr(
                            $expectedClassName,
                            0,
                            $pos,
                        );
                    }

                    if ($class->getShortName() !== $expectedClassName) {
                        $this->addWarning(
                            sprintf(
                                "Test case class not matching filename is deprecated\n               in %s\n               Class name was '%s', expected '%s'",
                                $filename,
                                $class->getShortName(),
                                $expectedClassName,
                            ),
                        );
                    }

                    $this->addTestSuite($class);
                }
            }
        }

        if (count($this->tests) > ++$numTests) {
            $this->addWarning(
                sprintf(
                    "Multiple test case classes per file is deprecated\n               in %s",
                    $filename,
                ),
            );
        }

        $this->numTests = -1;
=======
     * @param list<non-empty-string> $groups
     *
     * @throws Exception
     */
    public function addTestFile(string $filename, array $groups = []): void
    {
        try {
            if (str_ends_with($filename, '.phpt') && is_file($filename)) {
                $this->addTest(new PhptTestCase($filename));
            } else {
                $this->addTestSuite(
                    (new TestSuiteLoader)->load($filename),
                    $groups,
                );
            }
        } catch (RunnerException $e) {
            Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                $e->getMessage(),
            );
        }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Wrapper for addTestFile() that adds multiple test files.
     *
<<<<<<< HEAD
=======
     * @param iterable<string> $fileNames
     *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @throws Exception
     */
    public function addTestFiles(iterable $fileNames): void
    {
        foreach ($fileNames as $filename) {
            $this->addTestFile((string) $filename);
        }
    }

    /**
     * Counts the number of test cases that will be run by this test.
<<<<<<< HEAD
     *
     * @todo refactor usage of numTests in DefaultResultPrinter
     */
    public function count(): int
    {
        $this->numTests = 0;

        foreach ($this as $test) {
            $this->numTests += count($test);
        }

        return $this->numTests;
    }

    /**
     * Returns the name of the suite.
     */
    public function getName(): string
=======
     */
    public function count(): int
    {
        $numTests = 0;

        foreach ($this as $test) {
            $numTests += count($test);
        }

        return $numTests;
    }

    public function isEmpty(): bool
    {
        foreach ($this as $test) {
            if (count($test) !== 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return non-empty-string
     */
    public function name(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->name;
    }

    /**
<<<<<<< HEAD
     * Returns the test groups of the suite.
     *
     * @psalm-return list<string>
     */
    public function getGroups(): array
    {
        return array_map(
            static function ($key): string
            {
                return (string) $key;
            },
            array_keys($this->groups),
        );
    }

    public function getGroupDetails(): array
=======
     * @return array<non-empty-string, list<non-empty-string>>
     */
    public function groups(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->groups;
    }

    /**
<<<<<<< HEAD
     * Set tests groups of the test case.
     */
    public function setGroupDetails(array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * Runs the tests and collects their result in a TestResult.
     *
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws UnintentionallyCoveredCodeException
     * @throws Warning
     */
    public function run(?TestResult $result = null): TestResult
    {
        if ($result === null) {
            $result = $this->createResult();
        }

        if (count($this) === 0) {
            return $result;
        }

        /** @psalm-var class-string $className */
        $className   = $this->name;
        $hookMethods = TestUtil::getHookMethods($className);

        $result->startTestSuite($this);

        $test = null;

        if ($this->testCase && class_exists($this->name, false)) {
            try {
                foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                    if (method_exists($this->name, $beforeClassMethod)) {
                        if ($missingRequirements = TestUtil::getMissingRequirements($this->name, $beforeClassMethod)) {
                            $this->markTestSuiteSkipped(implode(PHP_EOL, $missingRequirements));
                        }

                        call_user_func([$this->name, $beforeClassMethod]);
                    }
                }
            } catch (SkippedTestError|SkippedTestSuiteError $error) {
                foreach ($this->tests() as $test) {
                    $result->startTest($test);
                    $result->addFailure($test, $error, 0);
                    $result->endTest($test, 0);
                }

                $result->endTestSuite($this);

                return $result;
            } catch (Throwable $t) {
                $errorAdded = false;

                foreach ($this->tests() as $test) {
                    if ($result->shouldStop()) {
                        break;
                    }

                    $result->startTest($test);

                    if (!$errorAdded) {
                        $result->addError($test, $t, 0);

                        $errorAdded = true;
                    } else {
                        $result->addFailure(
                            $test,
                            new SkippedTestError('Test skipped because of an error in hook method'),
                            0,
                        );
                    }

                    $result->endTest($test, 0);
                }

                $result->endTestSuite($this);

                return $result;
            }
        }

        foreach ($this as $test) {
            if ($result->shouldStop()) {
                break;
            }

            if ($test instanceof TestCase || $test instanceof self) {
                $test->setBeStrictAboutChangesToGlobalState($this->beStrictAboutChangesToGlobalState);
                $test->setBackupGlobals($this->backupGlobals);
                $test->setBackupStaticAttributes($this->backupStaticAttributes);
                $test->setRunTestInSeparateProcess($this->runTestInSeparateProcess);
            }

            $test->run($result);
        }

        if ($this->testCase && class_exists($this->name, false)) {
            foreach ($hookMethods['afterClass'] as $afterClassMethod) {
                if (method_exists($this->name, $afterClassMethod)) {
                    try {
                        call_user_func([$this->name, $afterClassMethod]);
                    } catch (Throwable $t) {
                        $message = "Exception in {$this->name}::{$afterClassMethod}" . PHP_EOL . $t->getMessage();
                        $error   = new SyntheticError($message, 0, $t->getFile(), $t->getLine(), $t->getTrace());

                        $placeholderTest = clone $test;
                        $placeholderTest->setName($afterClassMethod);

                        $result->startTest($placeholderTest);
                        $result->addFailure($placeholderTest, $error, 0);
                        $result->endTest($placeholderTest, 0);
                    }
                }
            }
        }

        $result->endTestSuite($this);

        return $result;
    }

    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
    {
        $this->runTestInSeparateProcess = $runTestInSeparateProcess;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
=======
     * @return list<PhptTestCase|TestCase>
     */
    public function collect(): array
    {
        $tests = [];

        foreach ($this as $test) {
            if ($test instanceof self) {
                $tests = array_merge($tests, $test->collect());

                continue;
            }

            assert($test instanceof TestCase || $test instanceof PhptTestCase);

            $tests[] = $test;
        }

        return $tests;
    }

    /**
     * @throws CodeCoverageException
     * @throws Event\RuntimeException
     * @throws Exception
     * @throws InvalidArgumentException
     * @throws NoPreviousThrowableException
     * @throws UnintentionallyCoveredCodeException
     */
    public function run(): void
    {
        if ($this->wasRun) {
            // @codeCoverageIgnoreStart
            throw new Exception('The tests aggregated by this TestSuite were already run');
            // @codeCoverageIgnoreEnd
        }

        $this->wasRun = true;

        if ($this->isEmpty()) {
            return;
        }

        $emitter                       = Event\Facade::emitter();
        $testSuiteValueObjectForEvents = Event\TestSuite\TestSuiteBuilder::from($this);

        $emitter->testSuiteStarted($testSuiteValueObjectForEvents);

        if (!$this->invokeMethodsBeforeFirstTest($emitter, $testSuiteValueObjectForEvents)) {
            return;
        }

        /** @var list<Test> $tests */
        $tests = [];

        foreach ($this as $test) {
            $tests[] = $test;
        }

        $tests = array_reverse($tests);

        $this->tests  = [];
        $this->groups = [];

        while (($test = array_pop($tests)) !== null) {
            if (TestResultFacade::shouldStop()) {
                $emitter->testRunnerExecutionAborted();

                break;
            }

            $test->run();
        }

        $this->invokeMethodsAfterLastTest($emitter);

        $emitter->testSuiteFinished($testSuiteValueObjectForEvents);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns the tests as an enumeration.
     *
<<<<<<< HEAD
     * @return Test[]
=======
     * @return list<Test>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function tests(): array
    {
        return $this->tests;
    }

    /**
     * Set tests of the test suite.
     *
<<<<<<< HEAD
     * @param Test[] $tests
=======
     * @param list<Test> $tests
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function setTests(array $tests): void
    {
        $this->tests = $tests;
    }

    /**
     * Mark the test suite as skipped.
     *
<<<<<<< HEAD
     * @param string $message
     *
     * @throws SkippedTestSuiteError
     *
     * @psalm-return never-return
     */
    public function markTestSuiteSkipped($message = ''): void
=======
     * @throws SkippedTestSuiteError
     */
    public function markTestSuiteSkipped(string $message = ''): never
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        throw new SkippedTestSuiteError($message);
    }

    /**
<<<<<<< HEAD
     * @param bool $beStrictAboutChangesToGlobalState
     */
    public function setBeStrictAboutChangesToGlobalState($beStrictAboutChangesToGlobalState): void
    {
        if (null === $this->beStrictAboutChangesToGlobalState && is_bool($beStrictAboutChangesToGlobalState)) {
            $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
        }
    }

    /**
     * @param bool $backupGlobals
     */
    public function setBackupGlobals($backupGlobals): void
    {
        if (null === $this->backupGlobals && is_bool($backupGlobals)) {
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * @param bool $backupStaticAttributes
     */
    public function setBackupStaticAttributes($backupStaticAttributes): void
    {
        if (null === $this->backupStaticAttributes && is_bool($backupStaticAttributes)) {
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * Returns an iterator for this test suite.
=======
     * @return Iterator<non-negative-int, Test>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function getIterator(): Iterator
    {
        $iterator = new TestSuiteIterator($this);

        if ($this->iteratorFilter !== null) {
            $iterator = $this->iteratorFilter->factory($iterator, $this);
        }

        return $iterator;
    }

    public function injectFilter(Factory $filter): void
    {
        $this->iteratorFilter = $filter;

        foreach ($this as $test) {
            if ($test instanceof self) {
                $test->injectFilter($filter);
            }
        }
    }

    /**
<<<<<<< HEAD
     * @psalm-return array<int,string>
     */
    public function warnings(): array
    {
        return array_unique($this->warnings);
    }

    /**
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @return list<ExecutionOrderDependency>
     */
    public function provides(): array
    {
        if ($this->providedTests === null) {
            $this->providedTests = [];

            if (is_callable($this->sortId(), true)) {
                $this->providedTests[] = new ExecutionOrderDependency($this->sortId());
            }

            foreach ($this->tests as $test) {
                if (!($test instanceof Reorderable)) {
<<<<<<< HEAD
                    // @codeCoverageIgnoreStart
                    continue;
                    // @codeCoverageIgnoreEnd
                }
=======
                    continue;
                }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->providedTests = ExecutionOrderDependency::mergeUnique($this->providedTests, $test->provides());
            }
        }

        return $this->providedTests;
    }

    /**
     * @return list<ExecutionOrderDependency>
     */
    public function requires(): array
    {
        if ($this->requiredTests === null) {
            $this->requiredTests = [];

            foreach ($this->tests as $test) {
                if (!($test instanceof Reorderable)) {
<<<<<<< HEAD
                    // @codeCoverageIgnoreStart
                    continue;
                    // @codeCoverageIgnoreEnd
                }
=======
                    continue;
                }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->requiredTests = ExecutionOrderDependency::mergeUnique(
                    ExecutionOrderDependency::filterInvalid($this->requiredTests),
                    $test->requires(),
                );
            }

            $this->requiredTests = ExecutionOrderDependency::diff($this->requiredTests, $this->provides());
        }

        return $this->requiredTests;
    }

    public function sortId(): string
    {
<<<<<<< HEAD
        return $this->getName() . '::class';
    }

    /**
     * Creates a default TestResult object.
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
    }

    /**
     * @throws Exception
     */
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method): void
    {
        $methodName = $method->getName();

        $test = (new TestBuilder)->build($class, $methodName);

        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                TestUtil::getDependencies($class->getName(), $methodName),
=======
        return $this->name() . '::class';
    }

    /**
     * @phpstan-assert-if-true class-string<TestCase> $this->name
     */
    public function isForTestClass(): bool
    {
        return class_exists($this->name, false) && is_subclass_of($this->name, TestCase::class);
    }

    /**
     * @param ReflectionClass<TestCase> $class
     * @param list<non-empty-string>    $groups
     *
     * @throws Exception
     */
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method, array $groups): void
    {
        $className  = $class->getName();
        $methodName = $method->getName();

        assert(!empty($methodName));

        try {
            $test = (new TestBuilder)->build($class, $methodName, $groups);
        } catch (InvalidDataProviderException $e) {
            Event\Facade::emitter()->testTriggeredPhpunitError(
                new TestMethod(
                    $className,
                    $methodName,
                    $method->getFileName(),
                    $method->getStartLine(),
                    Event\Code\TestDoxBuilder::fromClassNameAndMethodName(
                        $className,
                        $methodName,
                    ),
                    MetadataCollection::fromArray([]),
                    Event\TestData\TestDataCollection::fromArray([]),
                ),
                sprintf(
                    "The data provider specified for %s::%s is invalid\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($e),
                ),
            );

            return;
        }

        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                Dependencies::dependencies($class->getName(), $methodName),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        $this->addTest(
            $test,
<<<<<<< HEAD
            TestUtil::getGroups($class->getName(), $methodName),
=======
            array_merge(
                $groups,
                (new Groups)->groups($class->getName(), $methodName),
            ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    private function clearCaches(): void
    {
<<<<<<< HEAD
        $this->numTests      = -1;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->providedTests = null;
        $this->requiredTests = null;
    }

<<<<<<< HEAD
    private function containsOnlyVirtualGroups(array $groups): bool
    {
        foreach ($groups as $group) {
            if (strpos($group, '__phpunit_') !== 0) {
=======
    /**
     * @param list<non-empty-string> $groups
     */
    private function containsOnlyVirtualGroups(array $groups): bool
    {
        foreach ($groups as $group) {
            if (!str_starts_with($group, '__phpunit_')) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                return false;
            }
        }

        return true;
    }
<<<<<<< HEAD
=======

    private function methodDoesNotExistOrIsDeclaredInTestCase(string $methodName): bool
    {
        $reflector = new ReflectionClass($this->name);

        return !$reflector->hasMethod($methodName) ||
               $reflector->getMethod($methodName)->getDeclaringClass()->getName() === TestCase::class;
    }

    /**
     * @throws Exception
     */
    private function throwableToString(Throwable $t): string
    {
        $message = $t->getMessage();

        if (empty(trim($message))) {
            $message = '<no message>';
        }

        if ($t instanceof InvalidDataProviderException) {
            return sprintf(
                "%s\n%s",
                $message,
                Filter::stackTraceFromThrowableAsString($t),
            );
        }

        return sprintf(
            "%s: %s\n%s",
            $t::class,
            $message,
            Filter::stackTraceFromThrowableAsString($t),
        );
    }

    /**
     * @throws Exception
     * @throws NoPreviousThrowableException
     */
    private function invokeMethodsBeforeFirstTest(Event\Emitter $emitter, Event\TestSuite\TestSuite $testSuiteValueObjectForEvents): bool
    {
        if (!$this->isForTestClass()) {
            return true;
        }

        $methods         = (new HookMethods)->hookMethods($this->name)['beforeClass']->methodNamesSortedByPriority();
        $calledMethods   = [];
        $emitCalledEvent = true;
        $result          = true;

        foreach ($methods as $method) {
            if ($this->methodDoesNotExistOrIsDeclaredInTestCase($method)) {
                continue;
            }

            $calledMethod = new Event\Code\ClassMethod(
                $this->name,
                $method,
            );

            try {
                $missingRequirements = (new Requirements)->requirementsNotSatisfiedFor($this->name, $method);

                if ($missingRequirements !== []) {
                    $emitCalledEvent = false;

                    $this->markTestSuiteSkipped(implode(PHP_EOL, $missingRequirements));
                }

                call_user_func([$this->name, $method]);
            } catch (Throwable $t) {
            }

            if ($emitCalledEvent) {
                $emitter->beforeFirstTestMethodCalled(
                    $this->name,
                    $calledMethod,
                );

                $calledMethods[] = $calledMethod;
            }

            if (isset($t) && $t instanceof SkippedTest) {
                $emitter->testSuiteSkipped(
                    $testSuiteValueObjectForEvents,
                    $t->getMessage(),
                );

                return false;
            }

            if (isset($t)) {
                $emitter->beforeFirstTestMethodErrored(
                    $this->name,
                    $calledMethod,
                    Event\Code\ThrowableBuilder::from($t),
                );

                $result = false;
            }
        }

        if (!empty($calledMethods)) {
            $emitter->beforeFirstTestMethodFinished(
                $this->name,
                ...$calledMethods,
            );
        }

        if (!$result) {
            $emitter->testSuiteFinished($testSuiteValueObjectForEvents);
        }

        return $result;
    }

    private function invokeMethodsAfterLastTest(Event\Emitter $emitter): void
    {
        if (!$this->isForTestClass()) {
            return;
        }

        $methods       = (new HookMethods)->hookMethods($this->name)['afterClass']->methodNamesSortedByPriority();
        $calledMethods = [];

        foreach ($methods as $method) {
            if ($this->methodDoesNotExistOrIsDeclaredInTestCase($method)) {
                continue;
            }

            $calledMethod = new Event\Code\ClassMethod(
                $this->name,
                $method,
            );

            try {
                call_user_func([$this->name, $method]);
            } catch (Throwable $t) {
            }

            $emitter->afterLastTestMethodCalled(
                $this->name,
                $calledMethod,
            );

            $calledMethods[] = $calledMethod;

            if (isset($t)) {
                $emitter->afterLastTestMethodErrored(
                    $this->name,
                    $calledMethod,
                    Event\Code\ThrowableBuilder::from($t),
                );
            }
        }

        if (!empty($calledMethods)) {
            $emitter->afterLastTestMethodFinished(
                $this->name,
                ...$calledMethods,
            );
        }
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
