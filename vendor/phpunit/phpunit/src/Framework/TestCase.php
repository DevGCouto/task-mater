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

use const LC_ALL;
use const LC_COLLATE;
use const LC_CTYPE;
use const LC_MONETARY;
use const LC_NUMERIC;
use const LC_TIME;
use const PATHINFO_FILENAME;
use const PHP_EOL;
use const PHP_URL_PATH;
<<<<<<< HEAD
use function array_filter;
use function array_flip;
use function array_keys;
use function array_merge;
use function array_pop;
use function array_search;
use function array_unique;
use function array_values;
use function basename;
use function call_user_func;
=======
use function array_keys;
use function array_merge;
use function array_reverse;
use function array_values;
use function assert;
use function basename;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function chdir;
use function class_exists;
use function clearstatcache;
use function count;
<<<<<<< HEAD
use function debug_backtrace;
use function defined;
use function explode;
use function get_class;
use function get_include_path;
=======
use function defined;
use function error_clear_last;
use function explode;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function getcwd;
use function implode;
use function in_array;
use function ini_set;
use function is_array;
use function is_callable;
use function is_int;
use function is_object;
use function is_string;
use function libxml_clear_errors;
use function method_exists;
use function ob_end_clean;
<<<<<<< HEAD
=======
use function ob_get_clean;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function ob_get_contents;
use function ob_get_level;
use function ob_start;
use function parse_url;
use function pathinfo;
<<<<<<< HEAD
use function preg_replace;
use function serialize;
use function setlocale;
use function sprintf;
use function strpos;
use function substr;
use function sys_get_temp_dir;
use function tempnam;
use function trim;
use function var_export;
use DeepCopy\DeepCopy;
use PHPUnit\Framework\Constraint\Exception as ExceptionConstraint;
use PHPUnit\Framework\Constraint\ExceptionCode;
use PHPUnit\Framework\Constraint\ExceptionMessage;
use PHPUnit\Framework\Constraint\ExceptionMessageRegularExpression;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Error\Deprecated;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning as WarningError;
use PHPUnit\Framework\MockObject\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtMostCount as InvokedAtMostCountMatcher;
=======
use function preg_match;
use function preg_replace;
use function restore_error_handler;
use function restore_exception_handler;
use function set_error_handler;
use function set_exception_handler;
use function setlocale;
use function sprintf;
use function str_contains;
use function trim;
use AssertionError;
use DeepCopy\DeepCopy;
use PHPUnit\Event;
use PHPUnit\Event\NoPreviousThrowableException;
use PHPUnit\Framework\Constraint\Exception as ExceptionConstraint;
use PHPUnit\Framework\Constraint\ExceptionCode;
use PHPUnit\Framework\Constraint\ExceptionMessageIsOrContains;
use PHPUnit\Framework\Constraint\ExceptionMessageMatchesRegularExpression;
use PHPUnit\Framework\MockObject\Exception as MockObjectException;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\MockObjectInternal;
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PHPUnit\Framework\MockObject\Rule\InvokedCount as InvokedCountMatcher;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls as ConsecutiveCallsStub;
use PHPUnit\Framework\MockObject\Stub\Exception as ExceptionStub;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument as ReturnArgumentStub;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback as ReturnCallbackStub;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf as ReturnSelfStub;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap as ReturnValueMapStub;
<<<<<<< HEAD
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Cloner;
use PHPUnit\Util\Exception as UtilException;
use PHPUnit\Util\GlobalState;
use PHPUnit\Util\PHP\AbstractPhpProcess;
use PHPUnit\Util\Test as TestUtil;
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Prophecy\Exception\Doubler\DoubleException;
use Prophecy\Exception\Doubler\InterfaceNotFoundException;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;
use ReflectionClass;
use ReflectionException;
=======
use PHPUnit\Framework\TestSize\TestSize;
use PHPUnit\Framework\TestStatus\TestStatus;
use PHPUnit\Metadata\Api\Groups;
use PHPUnit\Metadata\Api\HookMethods;
use PHPUnit\Metadata\Api\Requirements;
use PHPUnit\Metadata\Parser\Registry as MetadataRegistry;
use PHPUnit\Runner\DeprecationCollector\Facade as DeprecationCollector;
use PHPUnit\Runner\HookMethodCollection;
use PHPUnit\TestRunner\TestResult\PassedTests;
use PHPUnit\TextUI\Configuration\Registry as ConfigurationRegistry;
use PHPUnit\Util\Exporter;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\Factory as ComparatorFactory;
use SebastianBergmann\Diff\Differ;
<<<<<<< HEAD
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\GlobalState\ExcludeList;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\ObjectEnumerator\Enumerator;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use SebastianBergmann\Template\Template;
use SoapClient;
=======
use SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;
use SebastianBergmann\GlobalState\ExcludeList as GlobalStateExcludeList;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\Invoker\TimeoutException;
use SebastianBergmann\ObjectEnumerator\Enumerator;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use Throwable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
abstract class TestCase extends Assert implements Reorderable, SelfDescribing, Test
{
    private const LOCALE_CATEGORIES = [LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME];
<<<<<<< HEAD

    /**
     * @var ?bool
     */
    protected $backupGlobals;

    /**
     * @var string[]
     */
    protected $backupGlobalsExcludeList = [];

    /**
     * @var string[]
     *
     * @deprecated Use $backupGlobalsExcludeList instead
     */
    protected $backupGlobalsBlacklist = [];

    /**
     * @var ?bool
     */
    protected $backupStaticAttributes;

    /**
     * @var array<string,array<int,string>>
     */
    protected $backupStaticAttributesExcludeList = [];

    /**
     * @var array<string,array<int,string>>
     *
     * @deprecated Use $backupStaticAttributesExcludeList instead
     */
    protected $backupStaticAttributesBlacklist = [];

    /**
     * @var ?bool
     */
    protected $runTestInSeparateProcess;

    /**
     * @var bool
     */
    protected $preserveGlobalState = true;
=======
    private ?bool $backupGlobals    = null;

    /**
     * @var list<string>
     */
    private array $backupGlobalsExcludeList = [];
    private ?bool $backupStaticProperties   = null;

    /**
     * @var array<string,list<class-string>>
     */
    private array $backupStaticPropertiesExcludeList = [];
    private ?Snapshot $snapshot                      = null;

    /**
     * @var list<callable>
     */
    private ?array $backupGlobalErrorHandlers = null;

    /**
     * @var list<callable>
     */
    private ?array $backupGlobalExceptionHandlers   = null;
    private ?bool $runClassInSeparateProcess        = null;
    private ?bool $runTestInSeparateProcess         = null;
    private bool $preserveGlobalState               = false;
    private bool $inIsolation                       = false;
    private ?string $expectedException              = null;
    private ?string $expectedExceptionMessage       = null;
    private ?string $expectedExceptionMessageRegExp = null;
    private null|int|string $expectedExceptionCode  = null;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * @var list<ExecutionOrderDependency>
     */
<<<<<<< HEAD
    protected $providedTests = [];

    /**
     * @var ?bool
     */
    private $runClassInSeparateProcess;

    /**
     * @var bool
     */
    private $inIsolation = false;

    /**
     * @var array
     */
    private $data;

    /**
     * @var int|string
     */
    private $dataName;

    /**
     * @var null|string
     */
    private $expectedException;

    /**
     * @var null|string
     */
    private $expectedExceptionMessage;

    /**
     * @var null|string
     */
    private $expectedExceptionMessageRegExp;

    /**
     * @var null|int|string
     */
    private $expectedExceptionCode;

    /**
     * @var string
     */
    private $name = '';
=======
    private array $providedTests = [];

    /**
     * @var array<mixed>
     */
    private array $data          = [];
    private int|string $dataName = '';

    /**
     * @var non-empty-string
     */
    private string $methodName;

    /**
     * @var list<string>
     */
    private array $groups = [];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * @var list<ExecutionOrderDependency>
     */
<<<<<<< HEAD
    private $dependencies = [];

    /**
     * @var array
     */
    private $dependencyInput = [];
=======
    private array $dependencies = [];

    /**
     * @var array<non-empty-string, array<mixed>>
     */
    private array $dependencyInput = [];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * @var array<string,string>
     */
<<<<<<< HEAD
    private $iniSettings = [];

    /**
     * @var array
     */
    private $locale = [];

    /**
     * @var MockObject[]
     */
    private $mockObjects = [];

    /**
     * @var MockGenerator
     */
    private $mockObjectGenerator;

    /**
     * @var int
     */
    private $status = BaseTestRunner::STATUS_UNKNOWN;

    /**
     * @var string
     */
    private $statusMessage = '';

    /**
     * @var int
     */
    private $numAssertions = 0;

    /**
     * @var TestResult
     */
    private $result;

    /**
     * @var mixed
     */
    private $testResult;

    /**
     * @var string
     */
    private $output = '';

    /**
     * @var ?string
     */
    private $outputExpectedRegex;

    /**
     * @var ?string
     */
    private $outputExpectedString;

    /**
     * @var mixed
     */
    private $outputCallback = false;

    /**
     * @var bool
     */
    private $outputBufferingActive = false;

    /**
     * @var int
     */
    private $outputBufferingLevel;

    /**
     * @var bool
     */
    private $outputRetrievedForAssertion = false;

    /**
     * @var ?Snapshot
     */
    private $snapshot;

    /**
     * @var Prophet
     */
    private $prophet;

    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState = false;

    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;

    /**
     * @var string[]
     */
    private $warnings = [];

    /**
     * @var string[]
     */
    private $groups = [];

    /**
     * @var bool
     */
    private $doesNotPerformAssertions = false;

    /**
     * @var Comparator[]
     */
    private $customComparators = [];

    /**
     * @var string[]
     */
    private $doubledTypes = [];

    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     */
    public static function any(): AnyInvokedCountMatcher
    {
        return new AnyInvokedCountMatcher;
    }

    /**
     * Returns a matcher that matches when the method is never executed.
     */
    public static function never(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(0);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     */
    public static function atLeast(int $requiredInvocations): InvokedAtLeastCountMatcher
    {
        return new InvokedAtLeastCountMatcher(
            $requiredInvocations,
        );
    }

    /**
     * Returns a matcher that matches when the method is executed at least once.
     */
    public static function atLeastOnce(): InvokedAtLeastOnceMatcher
    {
        return new InvokedAtLeastOnceMatcher;
    }

    /**
     * Returns a matcher that matches when the method is executed exactly once.
     */
    public static function once(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(1);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     */
    public static function exactly(int $count): InvokedCountMatcher
    {
        return new InvokedCountMatcher($count);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     */
    public static function atMost(int $allowedInvocations): InvokedAtMostCountMatcher
    {
        return new InvokedAtMostCountMatcher($allowedInvocations);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4297
     *
     * @codeCoverageIgnore
     */
    public static function at(int $index): InvokedAtIndexMatcher
    {
        $stack = debug_backtrace();

        while (!empty($stack)) {
            $frame = array_pop($stack);

            if (isset($frame['object']) && $frame['object'] instanceof self) {
                $frame['object']->addWarning(
                    'The at() matcher has been deprecated. It will be removed in PHPUnit 10. Please refactor your test to not rely on the order in which methods are invoked.',
                );

                break;
            }
        }

        return new InvokedAtIndexMatcher($index);
    }

    public static function returnValue($value): ReturnStub
    {
        return new ReturnStub($value);
    }

    public static function returnValueMap(array $valueMap): ReturnValueMapStub
    {
        return new ReturnValueMapStub($valueMap);
    }

    public static function returnArgument(int $argumentIndex): ReturnArgumentStub
    {
        return new ReturnArgumentStub($argumentIndex);
    }

    public static function returnCallback($callback): ReturnCallbackStub
    {
        return new ReturnCallbackStub($callback);
    }

    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     */
    public static function returnSelf(): ReturnSelfStub
    {
        return new ReturnSelfStub;
    }

    public static function throwException(Throwable $exception): ExceptionStub
    {
        return new ExceptionStub($exception);
    }

    public static function onConsecutiveCalls(...$args): ConsecutiveCallsStub
    {
        return new ConsecutiveCallsStub($args);
    }

    /**
     * @param int|string $dataName
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        if ($name !== null) {
            $this->setName($name);
        }

        $this->data     = $data;
        $this->dataName = $dataName;
=======
    private array $iniSettings = [];

    /**
     * @var array<int, non-empty-string>
     */
    private array $locale = [];

    /**
     * @var list<MockObjectInternal>
     */
    private array $mockObjects = [];
    private TestStatus $status;

    /**
     * @var non-negative-int
     */
    private int $numberOfAssertionsPerformed = 0;
    private mixed $testResult                = null;
    private string $output                   = '';
    private ?string $outputExpectedRegex     = null;
    private ?string $outputExpectedString    = null;
    private bool $outputBufferingActive      = false;
    private int $outputBufferingLevel;
    private bool $outputRetrievedForAssertion = false;
    private bool $doesNotPerformAssertions    = false;

    /**
     * @var list<Comparator>
     */
    private array $customComparators                         = [];
    private ?Event\Code\TestMethod $testValueObjectForEvents = null;
    private bool $wasPrepared                                = false;

    /**
     * @var array<class-string, true>
     */
    private array $failureTypes = [];

    /**
     * @var list<non-empty-string>
     */
    private array $expectedUserDeprecationMessage = [];

    /**
     * @var list<non-empty-string>
     */
    private array $expectedUserDeprecationMessageRegularExpression = [];

    /**
     * @param non-empty-string $name
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     *
     * @final
     */
    public function __construct(string $name)
    {
        $this->methodName = $name;
        $this->status     = TestStatus::unknown();

        if (is_callable($this->sortId(), true)) {
            $this->providedTests = [new ExecutionOrderDependency($this->sortId())];
        }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * This method is called before the first test of this test class is run.
<<<<<<< HEAD
=======
     *
     * @codeCoverageIgnore
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * This method is called after the last test of this test class is run.
<<<<<<< HEAD
=======
     *
     * @codeCoverageIgnore
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * This method is called before each test.
<<<<<<< HEAD
=======
     *
     * @codeCoverageIgnore
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    protected function setUp(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
<<<<<<< HEAD
=======
     *
     * @codeCoverageIgnore
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    protected function assertPreConditions(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between test and tearDown().
<<<<<<< HEAD
=======
     *
     * @codeCoverageIgnore
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    protected function assertPostConditions(): void
    {
    }

    /**
     * This method is called after each test.
<<<<<<< HEAD
=======
     *
     * @codeCoverageIgnore
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    protected function tearDown(): void
    {
    }

    /**
     * Returns a string representation of the test case.
     *
     * @throws Exception
<<<<<<< HEAD
     * @throws InvalidArgumentException
     */
    public function toString(): string
    {
        try {
            $class = new ReflectionClass($this);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e,
            );
        }
        // @codeCoverageIgnoreEnd

        $buffer = sprintf(
            '%s::%s',
            $class->name,
            $this->getName(false),
        );

        return $buffer . $this->getDataSetAsString();
    }

    public function count(): int
=======
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function toString(): string
    {
        $buffer = sprintf(
            '%s::%s',
            (new ReflectionClass($this))->getName(),
            $this->methodName,
        );

        return $buffer . $this->dataSetAsStringWithData();
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function count(): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return 1;
    }

<<<<<<< HEAD
    public function getActualOutputForAssertion(): string
    {
        $this->outputRetrievedForAssertion = true;

        return $this->getActualOutput();
    }

    public function expectOutputRegex(string $expectedRegex): void
    {
        $this->outputExpectedRegex = $expectedRegex;
    }

    public function expectOutputString(string $expectedString): void
    {
        $this->outputExpectedString = $expectedString;
    }

    /**
     * @psalm-param class-string<Throwable> $exception
     */
    public function expectException(string $exception): void
    {
        // @codeCoverageIgnoreStart
        switch ($exception) {
            case Deprecated::class:
                $this->addWarning('Expecting E_DEPRECATED and E_USER_DEPRECATED is deprecated and will no longer be possible in PHPUnit 10.');

                break;

            case Error::class:
                $this->addWarning('Expecting E_ERROR and E_USER_ERROR is deprecated and will no longer be possible in PHPUnit 10.');

                break;

            case Notice::class:
                $this->addWarning('Expecting E_STRICT, E_NOTICE, and E_USER_NOTICE is deprecated and will no longer be possible in PHPUnit 10.');

                break;

            case WarningError::class:
                $this->addWarning('Expecting E_WARNING and E_USER_WARNING is deprecated and will no longer be possible in PHPUnit 10.');

                break;
        }
        // @codeCoverageIgnoreEnd

        $this->expectedException = $exception;
    }

    /**
     * @param int|string $code
     */
    public function expectExceptionCode($code): void
    {
        $this->expectedExceptionCode = $code;
    }

    public function expectExceptionMessage(string $message): void
    {
        $this->expectedExceptionMessage = $message;
    }

    public function expectExceptionMessageMatches(string $regularExpression): void
    {
        $this->expectedExceptionMessageRegExp = $regularExpression;
    }

    /**
     * Sets up an expectation for an exception to be raised by the code under test.
     * Information for expected exception class, expected exception message, and
     * expected exception code are retrieved from a given Exception object.
     */
    public function expectExceptionObject(\Exception $exception): void
    {
        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());
    }

    public function expectNotToPerformAssertions(): void
    {
        $this->doesNotPerformAssertions = true;
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectDeprecation(): void
    {
        $this->addWarning('Expecting E_DEPRECATED and E_USER_DEPRECATED is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectedException = Deprecated::class;
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectDeprecationMessage(string $message): void
    {
        $this->addWarning('Expecting E_DEPRECATED and E_USER_DEPRECATED is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessage($message);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectDeprecationMessageMatches(string $regularExpression): void
    {
        $this->addWarning('Expecting E_DEPRECATED and E_USER_DEPRECATED is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessageMatches($regularExpression);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectNotice(): void
    {
        $this->addWarning('Expecting E_STRICT, E_NOTICE, and E_USER_NOTICE is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectedException = Notice::class;
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectNoticeMessage(string $message): void
    {
        $this->addWarning('Expecting E_STRICT, E_NOTICE, and E_USER_NOTICE is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessage($message);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectNoticeMessageMatches(string $regularExpression): void
    {
        $this->addWarning('Expecting E_STRICT, E_NOTICE, and E_USER_NOTICE is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessageMatches($regularExpression);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectWarning(): void
    {
        $this->addWarning('Expecting E_WARNING and E_USER_WARNING is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectedException = WarningError::class;
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectWarningMessage(string $message): void
    {
        $this->addWarning('Expecting E_WARNING and E_USER_WARNING is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessage($message);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectWarningMessageMatches(string $regularExpression): void
    {
        $this->addWarning('Expecting E_WARNING and E_USER_WARNING is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessageMatches($regularExpression);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectError(): void
    {
        $this->addWarning('Expecting E_ERROR and E_USER_ERROR is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectedException = Error::class;
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectErrorMessage(string $message): void
    {
        $this->addWarning('Expecting E_ERROR and E_USER_ERROR is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessage($message);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5062
     */
    public function expectErrorMessageMatches(string $regularExpression): void
    {
        $this->addWarning('Expecting E_ERROR and E_USER_ERROR is deprecated and will no longer be possible in PHPUnit 10.');

        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function getStatus(): int
=======
    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function status(): TestStatus
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->status;
    }

<<<<<<< HEAD
    public function markAsRisky(): void
    {
        $this->status = BaseTestRunner::STATUS_RISKY;
    }

    public function getStatusMessage(): string
    {
        return $this->statusMessage;
    }

    public function hasFailed(): bool
    {
        $status = $this->getStatus();

        return $status === BaseTestRunner::STATUS_FAILURE || $status === BaseTestRunner::STATUS_ERROR;
    }

    /**
     * Runs the test case and collects the results in a TestResult object.
     * If no TestResult object is passed a new one will be created.
     *
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws InvalidArgumentException
     * @throws UnintentionallyCoveredCodeException
     * @throws UtilException
     */
    public function run(?TestResult $result = null): TestResult
    {
        if ($result === null) {
            $result = $this->createResult();
        }

        if (!$this instanceof ErrorTestCase && !$this instanceof WarningTestCase) {
            $this->setTestResultObject($result);
        }

        if (!$this instanceof ErrorTestCase &&
            !$this instanceof WarningTestCase &&
            !$this instanceof SkippedTestCase &&
            !$this->handleDependencies()) {
            return $result;
        }

        if ($this->runInSeparateProcess()) {
            $runEntireClass = $this->runClassInSeparateProcess && !$this->runTestInSeparateProcess;

            try {
                $class = new ReflectionClass($this);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e,
                );
            }
            // @codeCoverageIgnoreEnd

            if ($runEntireClass) {
                $template = new Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseClass.tpl',
                );
            } else {
                $template = new Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl',
                );
            }

            if ($this->preserveGlobalState) {
                $constants     = GlobalState::getConstantsAsString();
                $globals       = GlobalState::getGlobalsAsString();
                $includedFiles = GlobalState::getIncludedFilesAsString();
                $iniSettings   = GlobalState::getIniSettingsAsString();
            } else {
                $constants = '';

                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
                    $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
                } else {
                    $globals = '';
                }

                $includedFiles = '';
                $iniSettings   = '';
            }

            $coverage                                   = $result->getCollectCodeCoverageInformation() ? 'true' : 'false';
            $isStrictAboutTestsThatDoNotTestAnything    = $result->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $isStrictAboutOutputDuringTests             = $result->isStrictAboutOutputDuringTests() ? 'true' : 'false';
            $enforcesTimeLimit                          = $result->enforcesTimeLimit() ? 'true' : 'false';
            $isStrictAboutTodoAnnotatedTests            = $result->isStrictAboutTodoAnnotatedTests() ? 'true' : 'false';
            $isStrictAboutResourceUsageDuringSmallTests = $result->isStrictAboutResourceUsageDuringSmallTests() ? 'true' : 'false';

            if (defined('PHPUNIT_COMPOSER_INSTALL')) {
                $composerAutoload = var_export(PHPUNIT_COMPOSER_INSTALL, true);
            } else {
                $composerAutoload = '\'\'';
            }

            if (defined('__PHPUNIT_PHAR__')) {
                $phar = var_export(__PHPUNIT_PHAR__, true);
            } else {
                $phar = '\'\'';
            }

            $codeCoverage               = $result->getCodeCoverage();
            $codeCoverageFilter         = null;
            $cachesStaticAnalysis       = 'false';
            $codeCoverageCacheDirectory = null;
            $driverMethod               = 'forLineCoverage';

            if ($codeCoverage) {
                $codeCoverageFilter = $codeCoverage->filter();

                if ($codeCoverage->collectsBranchAndPathCoverage()) {
                    $driverMethod = 'forLineAndPathCoverage';
                }

                if ($codeCoverage->cachesStaticAnalysis()) {
                    $cachesStaticAnalysis       = 'true';
                    $codeCoverageCacheDirectory = $codeCoverage->cacheDirectory();
                }
            }

            $data                       = var_export(serialize($this->data), true);
            $dataName                   = var_export($this->dataName, true);
            $dependencyInput            = var_export(serialize($this->dependencyInput), true);
            $includePath                = var_export(get_include_path(), true);
            $codeCoverageFilter         = var_export(serialize($codeCoverageFilter), true);
            $codeCoverageCacheDirectory = var_export(serialize($codeCoverageCacheDirectory), true);
            // must do these fixes because TestCaseMethod.tpl has unserialize('{data}') in it, and we can't break BC
            // the lines above used to use addcslashes() rather than var_export(), which breaks null byte escape sequences
            $data                       = "'." . $data . ".'";
            $dataName                   = "'.(" . $dataName . ").'";
            $dependencyInput            = "'." . $dependencyInput . ".'";
            $includePath                = "'." . $includePath . ".'";
            $codeCoverageFilter         = "'." . $codeCoverageFilter . ".'";
            $codeCoverageCacheDirectory = "'." . $codeCoverageCacheDirectory . ".'";

            $configurationFilePath = $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] ?? '';
            $processResultFile     = tempnam(sys_get_temp_dir(), 'phpunit_');

            $var = [
                'composerAutoload'                           => $composerAutoload,
                'phar'                                       => $phar,
                'filename'                                   => $class->getFileName(),
                'className'                                  => $class->getName(),
                'collectCodeCoverageInformation'             => $coverage,
                'cachesStaticAnalysis'                       => $cachesStaticAnalysis,
                'codeCoverageCacheDirectory'                 => $codeCoverageCacheDirectory,
                'driverMethod'                               => $driverMethod,
                'data'                                       => $data,
                'dataName'                                   => $dataName,
                'dependencyInput'                            => $dependencyInput,
                'constants'                                  => $constants,
                'globals'                                    => $globals,
                'include_path'                               => $includePath,
                'included_files'                             => $includedFiles,
                'iniSettings'                                => $iniSettings,
                'isStrictAboutTestsThatDoNotTestAnything'    => $isStrictAboutTestsThatDoNotTestAnything,
                'isStrictAboutOutputDuringTests'             => $isStrictAboutOutputDuringTests,
                'enforcesTimeLimit'                          => $enforcesTimeLimit,
                'isStrictAboutTodoAnnotatedTests'            => $isStrictAboutTodoAnnotatedTests,
                'isStrictAboutResourceUsageDuringSmallTests' => $isStrictAboutResourceUsageDuringSmallTests,
                'codeCoverageFilter'                         => $codeCoverageFilter,
                'configurationFilePath'                      => $configurationFilePath,
                'name'                                       => $this->getName(false),
                'processResultFile'                          => $processResultFile,
            ];

            if (!$runEntireClass) {
                $var['methodName'] = $this->name;
            }

            $template->setVar($var);

            $php = AbstractPhpProcess::factory();
            $php->runTestJob($template->render(), $this, $result, $processResultFile);
        } else {
            $result->run($this);
        }

        $this->result = null;

        return $result;
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $className
     *
     * @psalm-return MockBuilder<RealInstanceType>
     */
    public function getMockBuilder(string $className): MockBuilder
    {
        $this->recordDoubledType($className);

        return new MockBuilder($this, $className);
    }

    public function registerComparator(Comparator $comparator): void
    {
        ComparatorFactory::getInstance()->register($comparator);

        $this->customComparators[] = $comparator;
    }

    /**
     * @return string[]
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function doubledTypes(): array
    {
        return array_unique($this->doubledTypes);
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getGroups(): array
=======
    /**
     * @throws \PHPUnit\Runner\Exception
     * @throws \PHPUnit\Util\Exception
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\Template\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws Exception
     * @throws NoPreviousThrowableException
     * @throws ProcessIsolationException
     * @throws UnintentionallyCoveredCodeException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function run(): void
    {
        if (!$this->handleDependencies()) {
            return;
        }

        if (!$this->shouldRunInSeparateProcess() || $this->requirementsNotSatisfied()) {
            (new TestRunner)->run($this);

            return;
        }

        IsolatedTestRunnerRegistry::run(
            $this,
            $this->runClassInSeparateProcess && !$this->runTestInSeparateProcess,
            $this->preserveGlobalState,
            $this->requiresXdebug(),
        );
    }

    /**
     * @return list<string>
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function groups(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->groups;
    }

    /**
<<<<<<< HEAD
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setGroups(array $groups): void
=======
     * @param list<string> $groups
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function setGroups(array $groups): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->groups = $groups;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getName(bool $withDataSet = true): string
    {
        if ($withDataSet) {
            return $this->name . $this->getDataSetAsString(false);
        }

        return $this->name;
    }

    /**
     * Returns the size of the test.
     *
     * @throws InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getSize(): int
    {
        return TestUtil::getSize(
            static::class,
            $this->getName(false),
=======
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function nameWithDataSet(): string
    {
        return $this->methodName . $this->dataSetAsString();
    }

    /**
     * @return non-empty-string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function name(): string
    {
        return $this->methodName;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function size(): TestSize
    {
        return (new Groups)->size(
            static::class,
            $this->methodName,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasSize(): bool
    {
        return $this->getSize() !== TestUtil::UNKNOWN;
    }

    /**
     * @throws InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isSmall(): bool
    {
        return $this->getSize() === TestUtil::SMALL;
    }

    /**
     * @throws InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isMedium(): bool
    {
        return $this->getSize() === TestUtil::MEDIUM;
    }

    /**
     * @throws InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isLarge(): bool
    {
        return $this->getSize() === TestUtil::LARGE;
=======
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function hasUnexpectedOutput(): bool
    {
        if ($this->output === '') {
            return false;
        }

        if ($this->expectsOutput()) {
            return false;
        }

        return true;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function getActualOutput(): string
=======
    final public function output(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!$this->outputBufferingActive) {
            return $this->output;
        }

        return (string) ob_get_contents();
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function hasOutput(): bool
    {
        if ($this->output === '') {
            return false;
        }

        if ($this->hasExpectationOnOutput()) {
            return false;
        }

        return true;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function doesNotPerformAssertions(): bool
=======
    final public function doesNotPerformAssertions(): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->doesNotPerformAssertions;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function hasExpectationOnOutput(): bool
    {
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex) || $this->outputRetrievedForAssertion;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedException(): ?string
    {
        return $this->expectedException;
    }

    /**
     * @return null|int|string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionCode()
    {
        return $this->expectedExceptionCode;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionMessage(): ?string
    {
        return $this->expectedExceptionMessage;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionMessageRegExp(): ?string
    {
        return $this->expectedExceptionMessageRegExp;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRegisterMockObjectsFromTestArgumentsRecursively(bool $flag): void
    {
        $this->registerMockObjectsFromTestArgumentsRecursively = $flag;
=======
    final public function expectsOutput(): bool
    {
        return $this->hasExpectationOnOutput() || $this->outputRetrievedForAssertion;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @throws Throwable
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function runBare(): void
    {
        $this->numAssertions = 0;

        $this->snapshotGlobalState();
        $this->startOutputBuffering();
        clearstatcache();
        $currentWorkingDirectory = getcwd();

        $hookMethods = TestUtil::getHookMethods(static::class);

        $hasMetRequirements = false;
=======
    final public function runBare(): void
    {
        $emitter = Event\Facade::emitter();

        error_clear_last();
        clearstatcache();

        $emitter->testPreparationStarted(
            $this->valueObjectForEvents(),
        );

        $this->snapshotGlobalState();
        $this->snapshotGlobalErrorExceptionHandlers();
        $this->startOutputBuffering();

        $hookMethods                       = (new HookMethods)->hookMethods(static::class);
        $hasMetRequirements                = false;
        $this->numberOfAssertionsPerformed = 0;
        $currentWorkingDirectory           = getcwd();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        try {
            $this->checkRequirements();
            $hasMetRequirements = true;

            if ($this->inIsolation) {
<<<<<<< HEAD
                foreach ($hookMethods['beforeClass'] as $method) {
                    $this->{$method}();
                }
            }

            $this->setDoesNotPerformAssertionsFromAnnotation();

            foreach ($hookMethods['before'] as $method) {
                $this->{$method}();
            }

            foreach ($hookMethods['preCondition'] as $method) {
                $this->{$method}();
            }

            $this->testResult = $this->runTest();
            $this->verifyMockObjects();

            foreach ($hookMethods['postCondition'] as $method) {
                $this->{$method}();
            }

            if (!empty($this->warnings)) {
                throw new Warning(
                    implode(
                        "\n",
                        array_unique($this->warnings),
                    ),
                );
            }

            $this->status = BaseTestRunner::STATUS_PASSED;
        } catch (IncompleteTest $e) {
            $this->status        = BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $e->getMessage();
        } catch (SkippedTest $e) {
            $this->status        = BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $e->getMessage();
        } catch (Warning $e) {
            $this->status        = BaseTestRunner::STATUS_WARNING;
            $this->statusMessage = $e->getMessage();
        } catch (AssertionFailedError $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (PredictionException $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (Throwable $_e) {
            $e                   = $_e;
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

        $this->mockObjects = [];
        $this->prophet     = null;
=======
                // @codeCoverageIgnoreStart
                $this->invokeBeforeClassHookMethods($hookMethods, $emitter);
                // @codeCoverageIgnoreEnd
            }

            if (method_exists(static::class, $this->methodName) &&
                MetadataRegistry::parser()->forClassAndMethod(static::class, $this->methodName)->isDoesNotPerformAssertions()->isNotEmpty()) {
                $this->doesNotPerformAssertions = true;
            }

            $this->invokeBeforeTestHookMethods($hookMethods, $emitter);
            $this->invokePreConditionHookMethods($hookMethods, $emitter);

            $emitter->testPrepared(
                $this->valueObjectForEvents(),
            );

            $this->wasPrepared = true;
            $this->testResult  = $this->runTest();

            $this->verifyDeprecationExpectations();
            $this->verifyMockObjects();
            $this->invokePostConditionHookMethods($hookMethods, $emitter);

            $this->status = TestStatus::success();
        } catch (IncompleteTest $e) {
            $this->status = TestStatus::incomplete($e->getMessage());

            $emitter->testMarkedAsIncomplete(
                $this->valueObjectForEvents(),
                Event\Code\ThrowableBuilder::from($e),
            );
        } catch (SkippedTest $e) {
            $this->status = TestStatus::skipped($e->getMessage());

            $emitter->testSkipped(
                $this->valueObjectForEvents(),
                $e->getMessage(),
            );
        } catch (AssertionError|AssertionFailedError $e) {
            $this->handleExceptionFromInvokedCountMockObjectRule($e);

            if (!$this->wasPrepared) {
                $this->wasPrepared = true;

                $emitter->testPreparationFailed(
                    $this->valueObjectForEvents(),
                );
            }

            $this->status = TestStatus::failure($e->getMessage());

            $emitter->testFailed(
                $this->valueObjectForEvents(),
                Event\Code\ThrowableBuilder::from($e),
                Event\Code\ComparisonFailureBuilder::from($e),
            );
        } catch (TimeoutException $e) {
        } catch (Throwable $_e) {
            if ($this->isRegisteredFailure($_e)) {
                $this->status = TestStatus::failure($_e->getMessage());

                $emitter->testFailed(
                    $this->valueObjectForEvents(),
                    Event\Code\ThrowableBuilder::from($_e),
                    null,
                );
            } else {
                $e = $this->transformException($_e);

                $this->status = TestStatus::error($e->getMessage());

                if (!$this->wasPrepared) {
                    $emitter->testPreparationFailed(
                        $this->valueObjectForEvents(),
                    );
                }

                $emitter->testErrored(
                    $this->valueObjectForEvents(),
                    Event\Code\ThrowableBuilder::from($e),
                );
            }
        }

        $outputBufferingStopped = false;

        if (!isset($e) &&
            $this->hasExpectationOnOutput() &&
            $this->stopOutputBuffering()) {
            $outputBufferingStopped = true;

            $this->performAssertionsOnOutput();
        }

        try {
            $this->mockObjects = [];

            /** @phpstan-ignore catch.neverThrown */
        } catch (Throwable $e) {
            Event\Facade::emitter()->testErrored(
                $this->valueObjectForEvents(),
                Event\Code\ThrowableBuilder::from($e),
            );
        }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        // Tear down the fixture. An exception raised in tearDown() will be
        // caught and passed on when no exception was raised before.
        try {
            if ($hasMetRequirements) {
<<<<<<< HEAD
                foreach ($hookMethods['after'] as $method) {
                    $this->{$method}();
                }

                if ($this->inIsolation) {
                    foreach ($hookMethods['afterClass'] as $method) {
                        $this->{$method}();
                    }
                }
            }
        } catch (Throwable $_e) {
            $e = $e ?? $_e;
        }

        try {
            $this->stopOutputBuffering();
        } catch (RiskyTestError $_e) {
            $e = $e ?? $_e;
        }

        if (isset($_e)) {
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
=======
                $this->invokeAfterTestHookMethods($hookMethods, $emitter);

                if ($this->inIsolation) {
                    // @codeCoverageIgnoreStart
                    $this->invokeAfterClassHookMethods($hookMethods, $emitter);
                    // @codeCoverageIgnoreEnd
                }
            }
        } catch (AssertionError|AssertionFailedError $e) {
            $this->status = TestStatus::failure($e->getMessage());

            $emitter->testFailed(
                $this->valueObjectForEvents(),
                Event\Code\ThrowableBuilder::from($e),
                Event\Code\ComparisonFailureBuilder::from($e),
            );
        } catch (Throwable $exceptionRaisedDuringTearDown) {
            if (!isset($e) || $e instanceof SkippedWithMessageException) {
                $this->status = TestStatus::error($exceptionRaisedDuringTearDown->getMessage());
                $e            = $exceptionRaisedDuringTearDown;

                $emitter->testErrored(
                    $this->valueObjectForEvents(),
                    Event\Code\ThrowableBuilder::from($exceptionRaisedDuringTearDown),
                );
            }
        }

        if (!isset($e) && !isset($_e)) {
            $emitter->testPassed(
                $this->valueObjectForEvents(),
            );

            if (!$this->usesDataProvider()) {
                PassedTests::instance()->testMethodPassed(
                    $this->valueObjectForEvents(),
                    $this->testResult,
                );
            }
        }

        if (!$outputBufferingStopped) {
            $this->stopOutputBuffering();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        clearstatcache();

        if ($currentWorkingDirectory !== getcwd()) {
            chdir($currentWorkingDirectory);
        }

<<<<<<< HEAD
=======
        $this->restoreGlobalErrorExceptionHandlers();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->restoreGlobalState();
        $this->unregisterCustomComparators();
        $this->cleanupIniSettings();
        $this->cleanupLocaleSettings();
        libxml_clear_errors();

<<<<<<< HEAD
        // Perform assertion on output.
        if (!isset($e)) {
            try {
                if ($this->outputExpectedRegex !== null) {
                    $this->assertMatchesRegularExpression($this->outputExpectedRegex, $this->output);
                } elseif ($this->outputExpectedString !== null) {
                    $this->assertEquals($this->outputExpectedString, $this->output);
                }
            } catch (Throwable $_e) {
                $e = $_e;
            }
        }

        // Workaround for missing "finally".
        if (isset($e)) {
            if ($e instanceof PredictionException) {
                $e = new AssertionFailedError($e->getMessage());
            }

=======
        $this->testValueObjectForEvents = null;

        if (isset($e)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $this->onNotSuccessfulTest($e);
        }
    }

    /**
<<<<<<< HEAD
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setName(string $name): void
    {
        $this->name = $name;

        if (is_callable($this->sortId(), true)) {
            $this->providedTests = [new ExecutionOrderDependency($this->sortId())];
        }
    }

    /**
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @param list<ExecutionOrderDependency> $dependencies
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setDependencies(array $dependencies): void
=======
    final public function setDependencies(array $dependencies): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->dependencies = $dependencies;
    }

    /**
<<<<<<< HEAD
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setDependencyInput(array $dependencyInput): void
=======
     * @param array<non-empty-string, array<mixed>> $dependencyInput
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     *
     * @codeCoverageIgnore
     */
    final public function setDependencyInput(array $dependencyInput): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->dependencyInput = $dependencyInput;
    }

    /**
<<<<<<< HEAD
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBeStrictAboutChangesToGlobalState(?bool $beStrictAboutChangesToGlobalState): void
    {
        $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
=======
     * @return array<non-empty-string, array<mixed>>
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function dependencyInput(): array
    {
        return $this->dependencyInput;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setBackupGlobals(?bool $backupGlobals): void
    {
        if ($this->backupGlobals === null && $backupGlobals !== null) {
            $this->backupGlobals = $backupGlobals;
        }
=======
    final public function hasDependencyInput(): bool
    {
        return !empty($this->dependencyInput);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setBackupStaticAttributes(?bool $backupStaticAttributes): void
    {
        if ($this->backupStaticAttributes === null && $backupStaticAttributes !== null) {
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
=======
    final public function setBackupGlobals(bool $backupGlobals): void
    {
        $this->backupGlobals = $backupGlobals;
    }

    /**
     * @param list<string> $backupGlobalsExcludeList
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function setBackupGlobalsExcludeList(array $backupGlobalsExcludeList): void
    {
        $this->backupGlobalsExcludeList = $backupGlobalsExcludeList;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
=======
    final public function setBackupStaticProperties(bool $backupStaticProperties): void
    {
        $this->backupStaticProperties = $backupStaticProperties;
    }

    /**
     * @param array<string,list<class-string>> $backupStaticPropertiesExcludeList
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function setBackupStaticPropertiesExcludeList(array $backupStaticPropertiesExcludeList): void
    {
        $this->backupStaticPropertiesExcludeList = $backupStaticPropertiesExcludeList;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($this->runTestInSeparateProcess === null) {
            $this->runTestInSeparateProcess = $runTestInSeparateProcess;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setRunClassInSeparateProcess(bool $runClassInSeparateProcess): void
    {
        if ($this->runClassInSeparateProcess === null) {
            $this->runClassInSeparateProcess = $runClassInSeparateProcess;
        }
=======
    final public function setRunClassInSeparateProcess(bool $runClassInSeparateProcess): void
    {
        $this->runClassInSeparateProcess = $runClassInSeparateProcess;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setPreserveGlobalState(bool $preserveGlobalState): void
=======
    final public function setPreserveGlobalState(bool $preserveGlobalState): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->preserveGlobalState = $preserveGlobalState;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
<<<<<<< HEAD
     */
    public function setInIsolation(bool $inIsolation): void
=======
     *
     * @codeCoverageIgnore
     */
    final public function setInIsolation(bool $inIsolation): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->inIsolation = $inIsolation;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
<<<<<<< HEAD
     */
    public function isInIsolation(): bool
    {
        return $this->inIsolation;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getResult()
=======
     *
     * @codeCoverageIgnore
     */
    final public function result(): mixed
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->testResult;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setResult($result): void
=======
    final public function setResult(mixed $result): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->testResult = $result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function setOutputCallback(callable $callback): void
    {
        $this->outputCallback = $callback;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getTestResultObject(): ?TestResult
    {
        return $this->result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setTestResultObject(TestResult $result): void
    {
        $this->result = $result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function registerMockObject(MockObject $mockObject): void
    {
=======
    final public function registerMockObject(MockObject $mockObject): void
    {
        assert($mockObject instanceof MockObjectInternal);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->mockObjects[] = $mockObject;
    }

    /**
<<<<<<< HEAD
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function addToAssertionCount(int $count): void
    {
        $this->numAssertions += $count;
    }

    /**
     * Returns the number of assertions performed by this test.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getNumAssertions(): int
    {
        return $this->numAssertions;
=======
     * @param non-negative-int $count
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function addToAssertionCount(int $count): void
    {
        assert($count >= 0);

        $this->numberOfAssertionsPerformed += $count;
    }

    /**
     * @return non-negative-int
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function numberOfAssertionsPerformed(): int
    {
        return $this->numberOfAssertionsPerformed;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function usesDataProvider(): bool
=======
    final public function usesDataProvider(): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return !empty($this->data);
    }

    /**
<<<<<<< HEAD
     * @return int|string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function dataName()
=======
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function dataName(): int|string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->dataName;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function getDataSetAsString(bool $includeData = true): string
=======
    final public function dataSetAsString(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $buffer = '';

        if (!empty($this->data)) {
            if (is_int($this->dataName)) {
                $buffer .= sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= sprintf(' with data set "%s"', $this->dataName);
            }
<<<<<<< HEAD

            if ($includeData) {
                $exporter = new Exporter;

                $buffer .= sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
            }
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $buffer;
    }

    /**
<<<<<<< HEAD
     * Gets the data set of a TestCase.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getProvidedData(): array
=======
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function dataSetAsStringWithData(): string
    {
        if (empty($this->data)) {
            return '';
        }

        return $this->dataSetAsString() . sprintf(
            ' (%s)',
            Exporter::shortenedRecursiveExport($this->data),
        );
    }

    /**
     * @return array<mixed>
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function providedData(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->data;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
<<<<<<< HEAD
    public function addWarning(string $warning): void
    {
        $this->warnings[] = $warning;
    }

    public function sortId(): string
    {
        $id = $this->name;

        if (strpos($id, '::') === false) {
=======
    final public function sortId(): string
    {
        $id = $this->methodName;

        if (!str_contains($id, '::')) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $id = static::class . '::' . $id;
        }

        if ($this->usesDataProvider()) {
<<<<<<< HEAD
            $id .= $this->getDataSetAsString(false);
=======
            $id .= $this->dataSetAsString();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $id;
    }

    /**
<<<<<<< HEAD
     * Returns the normalized test name as class::method.
     *
     * @return list<ExecutionOrderDependency>
     */
    public function provides(): array
=======
     * @return list<ExecutionOrderDependency>
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function provides(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->providedTests;
    }

    /**
<<<<<<< HEAD
     * Returns a list of normalized dependency names, class::method.
     *
     * This list can differ from the raw dependencies as the resolver has
     * no need for the [!][shallow]clone prefix that is filtered out
     * during normalization.
     *
     * @return list<ExecutionOrderDependency>
     */
    public function requires(): array
=======
     * @return list<ExecutionOrderDependency>
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function requires(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->dependencies;
    }

    /**
<<<<<<< HEAD
     * Override to run the test and assert its state.
     *
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws Throwable
     */
    protected function runTest()
    {
        if (trim($this->name) === '') {
            throw new Exception(
                'PHPUnit\Framework\TestCase::$name must be a non-blank string.',
            );
        }

        $testArguments = array_merge($this->data, $this->dependencyInput);

        $this->registerMockObjectsFromTestArguments($testArguments);

        try {
            $testResult = $this->{$this->name}(...array_values($testArguments));
        } catch (Throwable $exception) {
            if (!$this->checkExceptionExpectations($exception)) {
                throw $exception;
            }

            if ($this->expectedException !== null) {
                if ($this->expectedException === Error::class) {
                    $this->assertThat(
                        $exception,
                        LogicalOr::fromConstraints(
                            new ExceptionConstraint(Error::class),
                            new ExceptionConstraint(\Error::class),
                        ),
                    );
                } else {
                    $this->assertThat(
                        $exception,
                        new ExceptionConstraint(
                            $this->expectedException,
                        ),
                    );
                }
            }

            if ($this->expectedExceptionMessage !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionMessage(
                        $this->expectedExceptionMessage,
                    ),
                );
            }

            if ($this->expectedExceptionMessageRegExp !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionMessageRegularExpression(
                        $this->expectedExceptionMessageRegExp,
                    ),
                );
            }

            if ($this->expectedExceptionCode !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionCode(
                        $this->expectedExceptionCode,
                    ),
                );
            }

            return;
        }

        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
                new ExceptionConstraint(
                    $this->expectedException,
                ),
            );
        } elseif ($this->expectedExceptionMessage !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with message "%s" is thrown',
                    $this->expectedExceptionMessage,
                ),
            );
        } elseif ($this->expectedExceptionMessageRegExp !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with message matching "%s" is thrown',
                    $this->expectedExceptionMessageRegExp,
                ),
            );
        } elseif ($this->expectedExceptionCode !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with code "%s" is thrown',
                    $this->expectedExceptionCode,
                ),
            );
        }

        return $testResult;
=======
     * @param array<mixed> $data
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function setData(int|string $dataName, array $data): void
    {
        $this->dataName = $dataName;
        $this->data     = $data;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function valueObjectForEvents(): Event\Code\TestMethod
    {
        if ($this->testValueObjectForEvents !== null) {
            return $this->testValueObjectForEvents;
        }

        $this->testValueObjectForEvents = Event\Code\TestMethodBuilder::fromTestCase($this);

        return $this->testValueObjectForEvents;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    final public function wasPrepared(): bool
    {
        return $this->wasPrepared;
    }

    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     */
    final protected function any(): AnyInvokedCountMatcher
    {
        return new AnyInvokedCountMatcher;
    }

    /**
     * Returns a matcher that matches when the method is never executed.
     */
    final protected function never(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(0);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     */
    final protected function atLeast(int $requiredInvocations): InvokedAtLeastCountMatcher
    {
        return new InvokedAtLeastCountMatcher(
            $requiredInvocations,
        );
    }

    /**
     * Returns a matcher that matches when the method is executed at least once.
     */
    final protected function atLeastOnce(): InvokedAtLeastOnceMatcher
    {
        return new InvokedAtLeastOnceMatcher;
    }

    /**
     * Returns a matcher that matches when the method is executed exactly once.
     */
    final protected function once(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(1);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     */
    final protected function exactly(int $count): InvokedCountMatcher
    {
        return new InvokedCountMatcher($count);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     */
    final protected function atMost(int $allowedInvocations): InvokedAtMostCountMatcher
    {
        return new InvokedAtMostCountMatcher($allowedInvocations);
    }

    /**
     * @deprecated Use <code>$double->willReturn()</code> instead of <code>$double->will($this->returnValue())</code>
     * @see https://github.com/sebastianbergmann/phpunit/issues/5423
     *
     * @codeCoverageIgnore
     */
    final protected function returnValue(mixed $value): ReturnStub
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'returnValue() is deprecated and will be removed in PHPUnit 12. Use $double->willReturn() instead of $double->will($this->returnValue())',
        );

        return new ReturnStub($value);
    }

    /**
     * @param array<mixed> $valueMap
     *
     * @deprecated Use <code>$double->willReturnMap()</code> instead of <code>$double->will($this->returnValueMap())</code>
     * @see https://github.com/sebastianbergmann/phpunit/issues/5423
     *
     * @codeCoverageIgnore
     */
    final protected function returnValueMap(array $valueMap): ReturnValueMapStub
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'returnValueMap() is deprecated and will be removed in PHPUnit 12. Use $double->willReturnMap() instead of $double->will($this->returnValueMap())',
        );

        return new ReturnValueMapStub($valueMap);
    }

    /**
     * @deprecated Use <code>$double->willReturnArgument()</code> instead of <code>$double->will($this->returnArgument())</code>
     * @see https://github.com/sebastianbergmann/phpunit/issues/5423
     *
     * @codeCoverageIgnore
     */
    final protected function returnArgument(int $argumentIndex): ReturnArgumentStub
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'returnArgument() is deprecated and will be removed in PHPUnit 12. Use $double->willReturnArgument() instead of $double->will($this->returnArgument())',
        );

        return new ReturnArgumentStub($argumentIndex);
    }

    /**
     * @deprecated Use <code>$double->willReturnCallback()</code> instead of <code>$double->will($this->returnCallback())</code>
     * @see https://github.com/sebastianbergmann/phpunit/issues/5423
     *
     * @codeCoverageIgnore
     */
    final protected function returnCallback(callable $callback): ReturnCallbackStub
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'returnCallback() is deprecated and will be removed in PHPUnit 12. Use $double->willReturnCallback() instead of $double->will($this->returnCallback())',
        );

        return new ReturnCallbackStub($callback);
    }

    /**
     * @deprecated Use <code>$double->willReturnSelf()</code> instead of <code>$double->will($this->returnSelf())</code>
     * @see https://github.com/sebastianbergmann/phpunit/issues/5423
     *
     * @codeCoverageIgnore
     */
    final protected function returnSelf(): ReturnSelfStub
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'returnSelf() is deprecated and will be removed in PHPUnit 12. Use $double->willReturnSelf() instead of $double->will($this->returnSelf())',
        );

        return new ReturnSelfStub;
    }

    final protected function throwException(Throwable $exception): ExceptionStub
    {
        return new ExceptionStub($exception);
    }

    /**
     * @deprecated Use <code>$double->willReturn()</code> instead of <code>$double->will($this->onConsecutiveCalls())</code>
     * @see https://github.com/sebastianbergmann/phpunit/issues/5423
     * @see https://github.com/sebastianbergmann/phpunit/issues/5425
     *
     * @codeCoverageIgnore
     */
    final protected function onConsecutiveCalls(mixed ...$arguments): ConsecutiveCallsStub
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'onConsecutiveCalls() is deprecated and will be removed in PHPUnit 12. Use $double->willReturn() instead of $double->will($this->onConsecutiveCalls())',
        );

        return new ConsecutiveCallsStub($arguments);
    }

    final protected function getActualOutputForAssertion(): string
    {
        $this->outputRetrievedForAssertion = true;

        return $this->output();
    }

    final protected function expectOutputRegex(string $expectedRegex): void
    {
        $this->outputExpectedRegex = $expectedRegex;
    }

    final protected function expectOutputString(string $expectedString): void
    {
        $this->outputExpectedString = $expectedString;
    }

    /**
     * @param class-string<Throwable> $exception
     */
    final protected function expectException(string $exception): void
    {
        $this->expectedException = $exception;
    }

    final protected function expectExceptionCode(int|string $code): void
    {
        $this->expectedExceptionCode = $code;
    }

    final protected function expectExceptionMessage(string $message): void
    {
        $this->expectedExceptionMessage = $message;
    }

    final protected function expectExceptionMessageMatches(string $regularExpression): void
    {
        $this->expectedExceptionMessageRegExp = $regularExpression;
    }

    /**
     * Sets up an expectation for an exception to be raised by the code under test.
     * Information for expected exception class, expected exception message, and
     * expected exception code are retrieved from a given Exception object.
     */
    final protected function expectExceptionObject(\Exception $exception): void
    {
        $this->expectException($exception::class);
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());
    }

    final protected function expectNotToPerformAssertions(): void
    {
        $this->doesNotPerformAssertions = true;
    }

    /**
     * @param non-empty-string $expectedUserDeprecationMessage
     */
    final protected function expectUserDeprecationMessage(string $expectedUserDeprecationMessage): void
    {
        $this->expectedUserDeprecationMessage[] = $expectedUserDeprecationMessage;
    }

    /**
     * @param non-empty-string $expectedUserDeprecationMessageRegularExpression
     */
    final protected function expectUserDeprecationMessageMatches(string $expectedUserDeprecationMessageRegularExpression): void
    {
        $this->expectedUserDeprecationMessageRegularExpression[] = $expectedUserDeprecationMessageRegularExpression;
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $className
     *
     * @return MockBuilder<RealInstanceType>
     */
    final protected function getMockBuilder(string $className): MockBuilder
    {
        return new MockBuilder($this, $className);
    }

    final protected function registerComparator(Comparator $comparator): void
    {
        ComparatorFactory::getInstance()->register($comparator);

        Event\Facade::emitter()->testRegisteredComparator($comparator::class);

        $this->customComparators[] = $comparator;
    }

    /**
     * @param class-string $classOrInterface
     */
    final protected function registerFailureType(string $classOrInterface): void
    {
        $this->failureTypes[$classOrInterface] = true;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * This method is a wrapper for the ini_set() function that automatically
     * resets the modified php.ini setting to its original value after the
     * test is run.
     *
     * @throws Exception
<<<<<<< HEAD
     */
    protected function iniSet(string $varName, string $newValue): void
    {
=======
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5214
     *
     * @codeCoverageIgnore
     */
    final protected function iniSet(string $varName, string $newValue): void
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'iniSet() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $currentValue = ini_set($varName, $newValue);

        if ($currentValue !== false) {
            $this->iniSettings[$varName] = $currentValue;
        } else {
            throw new Exception(
                sprintf(
                    'INI setting "%s" could not be set to "%s".',
                    $varName,
                    $newValue,
                ),
            );
        }
    }

    /**
     * This method is a wrapper for the setlocale() function that automatically
     * resets the locale to its original value after the test is run.
     *
     * @throws Exception
<<<<<<< HEAD
     */
    protected function setLocale(...$args): void
    {
        if (count($args) < 2) {
            throw new Exception;
        }

        [$category, $locale] = $args;
=======
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5216
     *
     * @codeCoverageIgnore
     */
    final protected function setLocale(mixed ...$arguments): void
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'setLocale() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        if (count($arguments) < 2) {
            throw new Exception;
        }

        [$category, $locale] = $arguments;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        if (!in_array($category, self::LOCALE_CATEGORIES, true)) {
            throw new Exception;
        }

        if (!is_array($locale) && !is_string($locale)) {
            throw new Exception;
        }

<<<<<<< HEAD
        $this->locale[$category] = setlocale($category, 0);

        $result = setlocale(...$args);
=======
        $this->locale[$category] = setlocale($category, '0');

        $result = setlocale(...$arguments);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        if ($result === false) {
            throw new Exception(
                'The locale functionality is not implemented on your platform, ' .
                'the specified locale does not exist or the category name is ' .
                'invalid.',
            );
        }
    }

    /**
<<<<<<< HEAD
     * Makes configurable stub for the specified class.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param    class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return   Stub&RealInstanceType
     */
    protected function createStub(string $originalClassName): Stub
    {
        return $this->createMockObject($originalClassName);
    }

    /**
     * Returns a mock object for the specified class.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createMock(string $originalClassName): MockObject
    {
        return $this->createMockObject($originalClassName);
    }

    /**
     * Returns a configured mock object for the specified class.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createConfiguredMock(string $originalClassName, array $configuration): MockObject
    {
        $o = $this->createMockObject($originalClassName);
=======
     * Creates a mock object for the specified interface or class.
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $originalClassName
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     * @throws NoPreviousThrowableException
     *
     * @return MockObject&RealInstanceType
     */
    final protected function createMock(string $originalClassName): MockObject
    {
        $mock = (new MockGenerator)->testDouble(
            $originalClassName,
            true,
            true,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
            returnValueGeneration: self::generateReturnValuesForTestDoubles(),
        );

        assert($mock instanceof $originalClassName);
        assert($mock instanceof MockObject);

        $this->registerMockObject($mock);

        Event\Facade::emitter()->testCreatedMockObject($originalClassName);

        return $mock;
    }

    /**
     * @param list<class-string> $interfaces
     *
     * @throws MockObjectException
     */
    final protected function createMockForIntersectionOfInterfaces(array $interfaces): MockObject
    {
        $mock = (new MockGenerator)->testDoubleForInterfaceIntersection(
            $interfaces,
            true,
            returnValueGeneration: self::generateReturnValuesForTestDoubles(),
        );

        assert($mock instanceof MockObject);

        $this->registerMockObject($mock);

        Event\Facade::emitter()->testCreatedMockObjectForIntersectionOfInterfaces($interfaces);

        return $mock;
    }

    /**
     * Creates (and configures) a mock object for the specified interface or class.
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $originalClassName
     * @param array<non-empty-string, mixed> $configuration
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     * @throws NoPreviousThrowableException
     *
     * @return MockObject&RealInstanceType
     */
    final protected function createConfiguredMock(string $originalClassName, array $configuration): MockObject
    {
        $o = $this->createMock($originalClassName);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        foreach ($configuration as $method => $return) {
            $o->method($method)->willReturn($return);
        }

        return $o;
    }

    /**
<<<<<<< HEAD
     * Returns a partial mock object for the specified class.
     *
     * @param string[] $methods
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createPartialMock(string $originalClassName, array $methods): MockObject
    {
        try {
            $reflector = new ReflectionClass($originalClassName);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e,
            );
        }
        // @codeCoverageIgnoreEnd

        $mockedMethodsThatDontExist = array_filter(
            $methods,
            static function (string $method) use ($reflector)
            {
                return !$reflector->hasMethod($method);
            },
        );

        if ($mockedMethodsThatDontExist) {
            $this->addWarning(
                sprintf(
                    'createPartialMock() called with method(s) %s that do not exist in %s. This will not be allowed in future versions of PHPUnit.',
                    implode(', ', $mockedMethodsThatDontExist),
                    $originalClassName,
                ),
            );
        }

        return $this->getMockBuilder($originalClassName)
=======
     * Creates a partial mock object for the specified interface or class.
     *
     * @param class-string<RealInstanceType> $originalClassName
     * @param list<non-empty-string>         $methods
     *
     * @template RealInstanceType of object
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     *
     * @return MockObject&RealInstanceType
     */
    final protected function createPartialMock(string $originalClassName, array $methods): MockObject
    {
        $mockBuilder = $this->getMockBuilder($originalClassName)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
<<<<<<< HEAD
            ->setMethods(empty($methods) ? null : $methods)
            ->getMock();
    }

    /**
     * Returns a test proxy for the specified class.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createTestProxy(string $originalClassName, array $constructorArguments = []): MockObject
    {
        return $this->getMockBuilder($originalClassName)
            ->setConstructorArgs($constructorArguments)
            ->enableProxyingToOriginalMethods()
            ->getMock();
    }

    /**
     * Mocks the specified class and returns the name of the mocked class.
     *
     * @param null|array $methods $methods
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
     *
     * @psalm-return class-string<MockObject&RealInstanceType>
     *
     * @deprecated
     */
    protected function getMockClass(string $originalClassName, $methods = [], array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = false, bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = false): string
    {
        $this->addWarning('PHPUnit\Framework\TestCase::getMockClass() is deprecated and will be removed in PHPUnit 10.');

        $this->recordDoubledType($originalClassName);

        $mock = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments,
        );

        return get_class($mock);
    }

    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods are not mocked by default.
     * To mock concrete methods, use the 7th parameter ($mockedMethods).
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function getMockForAbstractClass(string $originalClassName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = [], bool $cloneArguments = false): MockObject
    {
        $this->recordDoubledType($originalClassName);

        $mockObject = $this->getMockObjectGenerator()->getMockForAbstractClass(
=======
            ->onlyMethods($methods);

        if (!self::generateReturnValuesForTestDoubles()) {
            $mockBuilder->disableAutoReturnValueGeneration();
        }

        $partialMock = $mockBuilder->getMock();

        Event\Facade::emitter()->testCreatedPartialMockObject(
            $originalClassName,
            ...$methods,
        );

        return $partialMock;
    }

    /**
     * Creates a test proxy for the specified class.
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $originalClassName
     * @param array<mixed>                   $constructorArguments
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     *
     * @return MockObject&RealInstanceType
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5240
     */
    final protected function createTestProxy(string $originalClassName, array $constructorArguments = []): MockObject
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'createTestProxy() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        $testProxy = $this->getMockBuilder($originalClassName)
            ->setConstructorArgs($constructorArguments)
            ->enableProxyingToOriginalMethods()
            ->getMock();

        Event\Facade::emitter()->testCreatedTestProxy(
            $originalClassName,
            $constructorArguments,
        );

        return $testProxy;
    }

    /**
     * Creates a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods are not mocked by default.
     * To mock concrete methods, use the 7th parameter ($mockedMethods).
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $originalClassName
     * @param array<mixed>                   $arguments
     * @param list<non-empty-string>         $mockedMethods
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     *
     * @return MockObject&RealInstanceType
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5241
     */
    final protected function getMockForAbstractClass(string $originalClassName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = [], bool $cloneArguments = false): MockObject
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'getMockForAbstractClass() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        $mockObject = (new MockGenerator)->mockObjectForAbstractClass(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $originalClassName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments,
        );

        $this->registerMockObject($mockObject);

<<<<<<< HEAD
=======
        Event\Facade::emitter()->testCreatedMockObjectForAbstractClass($originalClassName);

        assert($mockObject instanceof $originalClassName);
        assert($mockObject instanceof MockObject);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $mockObject;
    }

    /**
<<<<<<< HEAD
     * Returns a mock object based on the given WSDL file.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function getMockFromWsdl(string $wsdlFile, string $originalClassName = '', string $mockClassName = '', array $methods = [], bool $callOriginalConstructor = true, array $options = []): MockObject
    {
        $this->recordDoubledType(SoapClient::class);
=======
     * Creates a mock object based on the given WSDL file.
     *
     * @param list<string> $methods
     * @param list<mixed>  $options
     *
     * @throws MockObjectException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5242
     */
    final protected function getMockFromWsdl(string $wsdlFile, string $originalClassName = '', string $mockClassName = '', array $methods = [], bool $callOriginalConstructor = true, array $options = []): MockObject
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'getMockFromWsdl() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        if ($originalClassName === '') {
            $fileName          = pathinfo(basename(parse_url($wsdlFile, PHP_URL_PATH)), PATHINFO_FILENAME);
            $originalClassName = preg_replace('/\W/', '', $fileName);
        }

        if (!class_exists($originalClassName)) {
            eval(
<<<<<<< HEAD
                $this->getMockObjectGenerator()->generateClassFromWsdl(
=======
                (new MockGenerator)->generateClassFromWsdl(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                    $wsdlFile,
                    $originalClassName,
                    $methods,
                    $options,
                )
            );
        }

<<<<<<< HEAD
        $mockObject = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
=======
        $mockObject = (new MockGenerator)->testDouble(
            $originalClassName,
            true,
            true,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $methods,
            ['', $options],
            $mockClassName,
            $callOriginalConstructor,
            false,
            false,
        );

<<<<<<< HEAD
=======
        Event\Facade::emitter()->testCreatedMockObjectFromWsdl(
            $wsdlFile,
            $originalClassName,
            $mockClassName,
            $methods,
            $callOriginalConstructor,
            $options,
        );

        assert($mockObject instanceof MockObject);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->registerMockObject($mockObject);

        return $mockObject;
    }

    /**
<<<<<<< HEAD
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @psalm-param trait-string $traitName
     */
    protected function getMockForTrait(string $traitName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = [], bool $cloneArguments = false): MockObject
    {
        $this->recordDoubledType($traitName);

        $mockObject = $this->getMockObjectGenerator()->getMockForTrait(
=======
     * Creates a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @param trait-string           $traitName
     * @param array<mixed>           $arguments
     * @param list<non-empty-string> $mockedMethods
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5243
     */
    final protected function getMockForTrait(string $traitName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = [], bool $cloneArguments = false): MockObject
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'getMockForTrait() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        $mockObject = (new MockGenerator)->mockObjectForTrait(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $traitName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments,
        );

        $this->registerMockObject($mockObject);

<<<<<<< HEAD
=======
        Event\Facade::emitter()->testCreatedMockObjectForTrait($traitName);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $mockObject;
    }

    /**
<<<<<<< HEAD
     * Returns an object for the specified trait.
     *
     * @psalm-param trait-string $traitName
     */
    protected function getObjectForTrait(string $traitName, array $arguments = [], string $traitClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true): object
    {
        $this->recordDoubledType($traitName);

        return $this->getMockObjectGenerator()->getObjectForTrait(
=======
     * Creates an object that uses the specified trait.
     *
     * @param trait-string $traitName
     * @param array<mixed> $arguments
     *
     * @throws MockObjectException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5244
     */
    final protected function getObjectForTrait(string $traitName, array $arguments = [], string $traitClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true): object
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            $this->valueObjectForEvents(),
            'getObjectForTrait() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        return (new MockGenerator)->objectForTrait(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $traitName,
            $traitClassName,
            $callAutoload,
            $callOriginalConstructor,
            $arguments,
        );
    }

<<<<<<< HEAD
    /**
     * @psalm-param class-string|null $classOrInterface
     *
     * @throws ClassNotFoundException
     * @throws DoubleException
     * @throws InterfaceNotFoundException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4141
     */
    protected function prophesize(?string $classOrInterface = null): ObjectProphecy
    {
        if (!class_exists(Prophet::class)) {
            throw new Exception('This test uses TestCase::prophesize(), but phpspec/prophecy is not installed. Please run "composer require --dev phpspec/prophecy".');
        }

        $this->addWarning('PHPUnit\Framework\TestCase::prophesize() is deprecated and will be removed in PHPUnit 10. Please use the trait provided by phpspec/prophecy-phpunit.');

        if (is_string($classOrInterface)) {
            $this->recordDoubledType($classOrInterface);
        }

        return $this->getProphet()->prophesize($classOrInterface);
    }

    /**
     * Creates a default TestResult object.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
=======
    protected function transformException(Throwable $t): Throwable
    {
        return $t;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * This method is called when a test method did not execute successfully.
     *
     * @throws Throwable
     */
<<<<<<< HEAD
    protected function onNotSuccessfulTest(Throwable $t): void
=======
    protected function onNotSuccessfulTest(Throwable $t): never
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        throw $t;
    }

<<<<<<< HEAD
    protected function recordDoubledType(string $originalClassName): void
    {
        $this->doubledTypes[] = $originalClassName;
=======
    /**
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws Throwable
     */
    private function runTest(): mixed
    {
        $testArguments = array_merge($this->data, array_values($this->dependencyInput));

        try {
            $testResult = $this->{$this->methodName}(...$testArguments);
        } catch (Throwable $exception) {
            if (!$this->shouldExceptionExpectationsBeVerified($exception)) {
                throw $exception;
            }

            $this->verifyExceptionExpectations($exception);

            return null;
        }

        $this->expectedExceptionWasNotRaised();

        return $testResult;
    }

    /**
     * @throws ExpectationFailedException
     */
    private function verifyDeprecationExpectations(): void
    {
        foreach ($this->expectedUserDeprecationMessage as $deprecationExpectation) {
            $this->numberOfAssertionsPerformed++;

            if (!in_array($deprecationExpectation, DeprecationCollector::deprecations(), true)) {
                throw new ExpectationFailedException(
                    sprintf(
                        'Expected deprecation with message "%s" was not triggered',
                        $deprecationExpectation,
                    ),
                );
            }
        }

        foreach ($this->expectedUserDeprecationMessageRegularExpression as $deprecationExpectation) {
            $this->numberOfAssertionsPerformed++;

            $expectedDeprecationTriggered = false;

            foreach (DeprecationCollector::deprecations() as $deprecation) {
                if (@preg_match($deprecationExpectation, $deprecation) > 0) {
                    $expectedDeprecationTriggered = true;

                    break;
                }
            }

            if (!$expectedDeprecationTriggered) {
                throw new ExpectationFailedException(
                    sprintf(
                        'Expected deprecation with message matching regular expression "%s" was not triggered',
                        $deprecationExpectation,
                    ),
                );
            }
        }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @throws Throwable
     */
    private function verifyMockObjects(): void
    {
        foreach ($this->mockObjects as $mockObject) {
            if ($mockObject->__phpunit_hasMatchers()) {
<<<<<<< HEAD
                $this->numAssertions++;
=======
                $this->numberOfAssertionsPerformed++;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }

            $mockObject->__phpunit_verify(
                $this->shouldInvocationMockerBeReset($mockObject),
            );
        }
<<<<<<< HEAD

        if ($this->prophet !== null) {
            try {
                $this->prophet->checkPredictions();
            } finally {
                foreach ($this->prophet->getProphecies() as $objectProphecy) {
                    foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                        foreach ($methodProphecies as $methodProphecy) {
                            /* @var MethodProphecy $methodProphecy */
                            $this->numAssertions += count($methodProphecy->getCheckedPredictions());
                        }
                    }
                }
            }
        }
    }

    /**
     * @throws SkippedTestError
     * @throws SyntheticSkippedError
     * @throws Warning
     */
    private function checkRequirements(): void
    {
        if (!$this->name || !method_exists($this, $this->name)) {
            return;
        }

        $missingRequirements = TestUtil::getMissingRequirements(
            static::class,
            $this->name,
=======
    }

    /**
     * @throws SkippedTest
     */
    private function checkRequirements(): void
    {
        if (!$this->methodName || !method_exists($this, $this->methodName)) {
            return;
        }

        $missingRequirements = (new Requirements)->requirementsNotSatisfiedFor(
            static::class,
            $this->methodName,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        if (!empty($missingRequirements)) {
            $this->markTestSkipped(implode(PHP_EOL, $missingRequirements));
        }
    }

    private function handleDependencies(): bool
    {
        if ([] === $this->dependencies || $this->inIsolation) {
            return true;
        }

<<<<<<< HEAD
        $passed     = $this->result->passed();
        $passedKeys = array_keys($passed);
        $numKeys    = count($passedKeys);

        for ($i = 0; $i < $numKeys; $i++) {
            $pos = strpos($passedKeys[$i], ' with data set');

            if ($pos !== false) {
                $passedKeys[$i] = substr($passedKeys[$i], 0, $pos);
            }
        }

        $passedKeys = array_flip(array_unique($passedKeys));

        foreach ($this->dependencies as $dependency) {
            if (!$dependency->isValid()) {
                $this->markSkippedForNotSpecifyingDependency();
=======
        $passedTests = PassedTests::instance();

        foreach ($this->dependencies as $dependency) {
            if (!$dependency->isValid()) {
                $this->markErrorForInvalidDependency();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                return false;
            }

            if ($dependency->targetIsClass()) {
                $dependencyClassName = $dependency->getTargetClassName();

<<<<<<< HEAD
                if (array_search($dependencyClassName, $this->result->passedClasses(), true) === false) {
=======
                if (!class_exists($dependencyClassName)) {
                    $this->markErrorForInvalidDependency($dependency);

                    return false;
                }

                if (!$passedTests->hasTestClassPassed($dependencyClassName)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                    $this->markSkippedForMissingDependency($dependency);

                    return false;
                }

                continue;
            }

            $dependencyTarget = $dependency->getTarget();

<<<<<<< HEAD
            if (!isset($passedKeys[$dependencyTarget])) {
                if (!$this->isCallableTestMethod($dependencyTarget)) {
                    $this->markWarningForUncallableDependency($dependency);
=======
            if (!$passedTests->hasTestMethodPassed($dependencyTarget)) {
                if (!$this->isCallableTestMethod($dependencyTarget)) {
                    $this->markErrorForInvalidDependency($dependency);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                } else {
                    $this->markSkippedForMissingDependency($dependency);
                }

                return false;
            }

<<<<<<< HEAD
            if (isset($passed[$dependencyTarget])) {
                if ($passed[$dependencyTarget]['size'] != TestUtil::UNKNOWN &&
                    $this->getSize() != TestUtil::UNKNOWN &&
                    $passed[$dependencyTarget]['size'] > $this->getSize()) {
                    $this->result->addError(
                        $this,
                        new SkippedTestError(
                            'This test depends on a test that is larger than itself.',
                        ),
                        0,
                    );

                    return false;
                }

                if ($dependency->useDeepClone()) {
                    $deepCopy = new DeepCopy;
                    $deepCopy->skipUncloneable(false);

                    $this->dependencyInput[$dependencyTarget] = $deepCopy->copy($passed[$dependencyTarget]['result']);
                } elseif ($dependency->useShallowClone()) {
                    $this->dependencyInput[$dependencyTarget] = clone $passed[$dependencyTarget]['result'];
                } else {
                    $this->dependencyInput[$dependencyTarget] = $passed[$dependencyTarget]['result'];
                }
            } else {
                $this->dependencyInput[$dependencyTarget] = null;
            }
        }

        return true;
    }

    private function markSkippedForNotSpecifyingDependency(): void
    {
        $this->status = BaseTestRunner::STATUS_SKIPPED;

        $this->result->startTest($this);

        $this->result->addError(
            $this,
            new SkippedTestError(
                'This method has an invalid @depends annotation.',
            ),
            0,
        );

        $this->result->endTest($this, 0);
=======
            if ($passedTests->isGreaterThan($dependencyTarget, $this->size())) {
                Event\Facade::emitter()->testConsideredRisky(
                    $this->valueObjectForEvents(),
                    'This test depends on a test that is larger than itself',
                );

                return true;
            }

            if (!$passedTests->hasReturnValue($dependencyTarget)) {
                return true;
            }

            $returnValue = $passedTests->returnValue($dependencyTarget);

            if ($dependency->deepClone()) {
                $deepCopy = new DeepCopy;
                $deepCopy->skipUncloneable(false);

                $this->dependencyInput[$dependencyTarget] = $deepCopy->copy($returnValue);
            } elseif ($dependency->shallowClone()) {
                $this->dependencyInput[$dependencyTarget] = clone $returnValue;
            } else {
                $this->dependencyInput[$dependencyTarget] = $returnValue;
            }
        }

        $this->testValueObjectForEvents = null;

        return true;
    }

    /**
     * @throws Exception
     * @throws NoPreviousThrowableException
     */
    private function markErrorForInvalidDependency(?ExecutionOrderDependency $dependency = null): void
    {
        $message = 'This test has an invalid dependency';

        if ($dependency !== null) {
            $message = sprintf(
                'This test depends on "%s" which does not exist',
                $dependency->targetIsClass() ? $dependency->getTargetClassName() : $dependency->getTarget(),
            );
        }

        $exception = new InvalidDependencyException($message);

        Event\Facade::emitter()->testErrored(
            $this->valueObjectForEvents(),
            Event\Code\ThrowableBuilder::from($exception),
        );

        $this->status = TestStatus::error($message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function markSkippedForMissingDependency(ExecutionOrderDependency $dependency): void
    {
<<<<<<< HEAD
        $this->status = BaseTestRunner::STATUS_SKIPPED;

        $this->result->startTest($this);

        $this->result->addError(
            $this,
            new SkippedTestError(
                sprintf(
                    'This test depends on "%s" to pass.',
                    $dependency->getTarget(),
                ),
            ),
            0,
        );

        $this->result->endTest($this, 0);
    }

    private function markWarningForUncallableDependency(ExecutionOrderDependency $dependency): void
    {
        $this->status = BaseTestRunner::STATUS_WARNING;

        $this->result->startTest($this);

        $this->result->addWarning(
            $this,
            new Warning(
                sprintf(
                    'This test depends on "%s" which does not exist.',
                    $dependency->getTarget(),
                ),
            ),
            0,
        );

        $this->result->endTest($this, 0);
    }

    /**
     * Get the mock object generator, creating it if it doesn't exist.
     */
    private function getMockObjectGenerator(): MockGenerator
    {
        if ($this->mockObjectGenerator === null) {
            $this->mockObjectGenerator = new MockGenerator;
        }

        return $this->mockObjectGenerator;
=======
        $message = sprintf(
            'This test depends on "%s" to pass',
            $dependency->getTarget(),
        );

        Event\Facade::emitter()->testSkipped(
            $this->valueObjectForEvents(),
            $message,
        );

        $this->status = TestStatus::skipped($message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function startOutputBuffering(): void
    {
        ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = ob_get_level();
    }

<<<<<<< HEAD
    /**
     * @throws RiskyTestError
     */
    private function stopOutputBuffering(): void
    {
        if (ob_get_level() !== $this->outputBufferingLevel) {
=======
    private function stopOutputBuffering(): bool
    {
        $bufferingLevel = ob_get_level();

        if ($bufferingLevel !== $this->outputBufferingLevel) {
            if ($bufferingLevel > $this->outputBufferingLevel) {
                $message = 'Test code or tested code did not close its own output buffers';
            } else {
                $message = 'Test code or tested code closed output buffers other than its own';
            }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            while (ob_get_level() >= $this->outputBufferingLevel) {
                ob_end_clean();
            }

<<<<<<< HEAD
            throw new RiskyTestError(
                'Test code or tested code did not (only) close its own output buffers',
            );
        }

        $this->output = ob_get_contents();

        if ($this->outputCallback !== false) {
            $this->output = (string) call_user_func($this->outputCallback, $this->output);
        }

        ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = ob_get_level();
=======
            Event\Facade::emitter()->testConsideredRisky(
                $this->valueObjectForEvents(),
                $message,
            );

            return false;
        }

        $this->output = ob_get_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = ob_get_level();

        return true;
    }

    private function snapshotGlobalErrorExceptionHandlers(): void
    {
        $this->backupGlobalErrorHandlers     = $this->activeErrorHandlers();
        $this->backupGlobalExceptionHandlers = $this->activeExceptionHandlers();
    }

    private function restoreGlobalErrorExceptionHandlers(): void
    {
        $activeErrorHandlers     = $this->activeErrorHandlers();
        $activeExceptionHandlers = $this->activeExceptionHandlers();

        $message = null;

        if ($activeErrorHandlers !== $this->backupGlobalErrorHandlers) {
            if (count($activeErrorHandlers) > count($this->backupGlobalErrorHandlers)) {
                if (!$this->inIsolation) {
                    $message = 'Test code or tested code did not remove its own error handlers';
                }
            } else {
                $message = 'Test code or tested code removed error handlers other than its own';
            }

            foreach ($activeErrorHandlers as $handler) {
                restore_error_handler();
            }

            foreach ($this->backupGlobalErrorHandlers as $handler) {
                set_error_handler($handler);
            }
        }

        if ($message !== null) {
            Event\Facade::emitter()->testConsideredRisky(
                $this->valueObjectForEvents(),
                $message,
            );
        }

        $message = null;

        if ($activeExceptionHandlers !== $this->backupGlobalExceptionHandlers) {
            if (count($activeExceptionHandlers) > count($this->backupGlobalExceptionHandlers)) {
                if (!$this->inIsolation) {
                    $message = 'Test code or tested code did not remove its own exception handlers';
                }
            } else {
                $message = 'Test code or tested code removed exception handlers other than its own';
            }

            foreach ($activeExceptionHandlers as $handler) {
                restore_exception_handler();
            }

            foreach ($this->backupGlobalExceptionHandlers as $handler) {
                set_exception_handler($handler);
            }
        }

        $this->backupGlobalErrorHandlers     = null;
        $this->backupGlobalExceptionHandlers = null;

        if ($message !== null) {
            Event\Facade::emitter()->testConsideredRisky(
                $this->valueObjectForEvents(),
                $message,
            );
        }
    }

    /**
     * @return list<callable>
     */
    private function activeErrorHandlers(): array
    {
        $activeErrorHandlers = [];

        while (true) {
            $previousHandler = set_error_handler(static fn () => false);

            restore_error_handler();

            if ($previousHandler === null) {
                break;
            }

            $activeErrorHandlers[] = $previousHandler;

            restore_error_handler();
        }

        $activeErrorHandlers      = array_reverse($activeErrorHandlers);
        $invalidErrorHandlerStack = false;

        foreach ($activeErrorHandlers as $handler) {
            if (!is_callable($handler)) {
                $invalidErrorHandlerStack = true;

                continue;
            }

            set_error_handler($handler);
        }

        if ($invalidErrorHandlerStack) {
            $message = 'At least one error handler is not callable outside the scope it was registered in';

            Event\Facade::emitter()->testConsideredRisky(
                $this->valueObjectForEvents(),
                $message,
            );
        }

        return $activeErrorHandlers;
    }

    /**
     * @return list<callable>
     */
    private function activeExceptionHandlers(): array
    {
        $res = [];

        while (true) {
            $previousHandler = set_exception_handler(static fn () => null);
            restore_exception_handler();

            if ($previousHandler === null) {
                break;
            }
            $res[] = $previousHandler;
            restore_exception_handler();
        }
        $res = array_reverse($res);

        foreach ($res as $handler) {
            set_exception_handler($handler);
        }

        return $res;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function snapshotGlobalState(): void
    {
        if ($this->runTestInSeparateProcess || $this->inIsolation ||
<<<<<<< HEAD
            (!$this->backupGlobals && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($this->backupGlobals === true);
    }

    /**
     * @throws InvalidArgumentException
     * @throws RiskyTestError
     */
=======
            (!$this->backupGlobals && !$this->backupStaticProperties)) {
            return;
        }

        $snapshot = $this->createGlobalStateSnapshot($this->backupGlobals === true);

        $this->snapshot = $snapshot;
    }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function restoreGlobalState(): void
    {
        if (!$this->snapshot instanceof Snapshot) {
            return;
        }

<<<<<<< HEAD
        if ($this->beStrictAboutChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($this->backupGlobals === true),
                );
            } catch (RiskyTestError $rte) {
                // Intentionally left empty
            }
=======
        if (ConfigurationRegistry::get()->beStrictAboutChangesToGlobalState()) {
            $this->compareGlobalStateSnapshots(
                $this->snapshot,
                $this->createGlobalStateSnapshot($this->backupGlobals === true),
            );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $restorer = new Restorer;

        if ($this->backupGlobals) {
            $restorer->restoreGlobalVariables($this->snapshot);
        }

<<<<<<< HEAD
        if ($this->backupStaticAttributes) {
            $restorer->restoreStaticAttributes($this->snapshot);
        }

        $this->snapshot = null;

        if (isset($rte)) {
            throw $rte;
        }
=======
        if ($this->backupStaticProperties) {
            $restorer->restoreStaticProperties($this->snapshot);
        }

        $this->snapshot = null;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function createGlobalStateSnapshot(bool $backupGlobals): Snapshot
    {
<<<<<<< HEAD
        $excludeList = new ExcludeList;
=======
        $excludeList = new GlobalStateExcludeList;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        foreach ($this->backupGlobalsExcludeList as $globalVariable) {
            $excludeList->addGlobalVariable($globalVariable);
        }

<<<<<<< HEAD
        if (!empty($this->backupGlobalsBlacklist)) {
            $this->addWarning('PHPUnit\Framework\TestCase::$backupGlobalsBlacklist is deprecated and will be removed in PHPUnit 10. Please use PHPUnit\Framework\TestCase::$backupGlobalsExcludeList instead.');

            foreach ($this->backupGlobalsBlacklist as $globalVariable) {
                $excludeList->addGlobalVariable($globalVariable);
            }
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if (!defined('PHPUNIT_TESTSUITE')) {
            $excludeList->addClassNamePrefix('PHPUnit');
            $excludeList->addClassNamePrefix('SebastianBergmann\CodeCoverage');
            $excludeList->addClassNamePrefix('SebastianBergmann\FileIterator');
            $excludeList->addClassNamePrefix('SebastianBergmann\Invoker');
            $excludeList->addClassNamePrefix('SebastianBergmann\Template');
            $excludeList->addClassNamePrefix('SebastianBergmann\Timer');
<<<<<<< HEAD
            $excludeList->addClassNamePrefix('Doctrine\Instantiator');
            $excludeList->addClassNamePrefix('Prophecy');
            $excludeList->addStaticAttribute(ComparatorFactory::class, 'instance');

            foreach ($this->backupStaticAttributesExcludeList as $class => $attributes) {
                foreach ($attributes as $attribute) {
                    $excludeList->addStaticAttribute($class, $attribute);
                }
            }

            if (!empty($this->backupStaticAttributesBlacklist)) {
                $this->addWarning('PHPUnit\Framework\TestCase::$backupStaticAttributesBlacklist is deprecated and will be removed in PHPUnit 10. Please use PHPUnit\Framework\TestCase::$backupStaticAttributesExcludeList instead.');

                foreach ($this->backupStaticAttributesBlacklist as $class => $attributes) {
                    foreach ($attributes as $attribute) {
                        $excludeList->addStaticAttribute($class, $attribute);
                    }
=======
            $excludeList->addStaticProperty(ComparatorFactory::class, 'instance');

            foreach ($this->backupStaticPropertiesExcludeList as $class => $properties) {
                foreach ($properties as $property) {
                    $excludeList->addStaticProperty($class, $property);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                }
            }
        }

<<<<<<< HEAD
        return new Snapshot(
            $excludeList,
            $backupGlobals,
            (bool) $this->backupStaticAttributes,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
        );
    }

    /**
     * @throws InvalidArgumentException
     * @throws RiskyTestError
     */
=======
        try {
            return new Snapshot(
                $excludeList,
                $backupGlobals,
                (bool) $this->backupStaticProperties,
                false,
                false,
                false,
                false,
                false,
                false,
                false,
            );
        } catch (Throwable $t) {
            Event\Facade::emitter()->testPreparationFailed(
                $this->valueObjectForEvents(),
            );

            Event\Facade::emitter()->testErrored(
                $this->valueObjectForEvents(),
                Event\Code\ThrowableBuilder::from($t),
            );

            throw $t;
        }
    }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function compareGlobalStateSnapshots(Snapshot $before, Snapshot $after): void
    {
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals;

        if ($backupGlobals) {
            $this->compareGlobalStateSnapshotPart(
                $before->globalVariables(),
                $after->globalVariables(),
                "--- Global variables before the test\n+++ Global variables after the test\n",
            );

            $this->compareGlobalStateSnapshotPart(
                $before->superGlobalVariables(),
                $after->superGlobalVariables(),
                "--- Super-global variables before the test\n+++ Super-global variables after the test\n",
            );
        }

<<<<<<< HEAD
        if ($this->backupStaticAttributes) {
            $this->compareGlobalStateSnapshotPart(
                $before->staticAttributes(),
                $after->staticAttributes(),
                "--- Static attributes before the test\n+++ Static attributes after the test\n",
=======
        if ($this->backupStaticProperties) {
            $this->compareGlobalStateSnapshotPart(
                $before->staticProperties(),
                $after->staticProperties(),
                "--- Static properties before the test\n+++ Static properties after the test\n",
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

    /**
<<<<<<< HEAD
     * @throws RiskyTestError
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, string $header): void
    {
        if ($before != $after) {
            $differ   = new Differ($header);
            $exporter = new Exporter;

            $diff = $differ->diff(
                $exporter->export($before),
                $exporter->export($after),
            );

            throw new RiskyTestError(
                $diff,
            );
        }
    }

    private function getProphet(): Prophet
    {
        if ($this->prophet === null) {
            $this->prophet = new Prophet;
        }

        return $this->prophet;
    }

    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     */
=======
     * @param array<mixed> $before
     * @param array<mixed> $after
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, string $header): void
    {
        if ($before == $after) {
            return;
        }

        $differ = new Differ(new UnifiedDiffOutputBuilder($header));

        Event\Facade::emitter()->testConsideredRisky(
            $this->valueObjectForEvents(),
            'This test modified global state but was not expected to do so' . PHP_EOL .
            trim(
                $differ->diff(
                    Exporter::export($before),
                    Exporter::export($after),
                ),
            ),
        );
    }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function shouldInvocationMockerBeReset(MockObject $mock): bool
    {
        $enumerator = new Enumerator;

<<<<<<< HEAD
        foreach ($enumerator->enumerate($this->dependencyInput) as $object) {
            if ($mock === $object) {
                return false;
            }
=======
        if (in_array($mock, $enumerator->enumerate($this->dependencyInput), true)) {
            return false;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        if (!is_array($this->testResult) && !is_object($this->testResult)) {
            return true;
        }

        return !in_array($mock, $enumerator->enumerate($this->testResult), true);
    }

<<<<<<< HEAD
    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws \SebastianBergmann\ObjectReflector\InvalidArgumentException
     * @throws InvalidArgumentException
     */
    private function registerMockObjectsFromTestArguments(array $testArguments, array &$visited = []): void
    {
        if ($this->registerMockObjectsFromTestArgumentsRecursively) {
            foreach ((new Enumerator)->enumerate($testArguments) as $object) {
                if ($object instanceof MockObject) {
                    $this->registerMockObject($object);
                }
            }
        } else {
            foreach ($testArguments as $testArgument) {
                if ($testArgument instanceof MockObject) {
                    $testArgument = Cloner::clone($testArgument);

                    $this->registerMockObject($testArgument);
                } elseif (is_array($testArgument) && !in_array($testArgument, $visited, true)) {
                    $visited[] = $testArgument;

                    $this->registerMockObjectsFromTestArguments(
                        $testArgument,
                        $visited,
                    );
                }
            }
        }
    }

    private function setDoesNotPerformAssertionsFromAnnotation(): void
    {
        $annotations = TestUtil::parseTestMethodAnnotations(
            static::class,
            $this->name,
        );

        if (isset($annotations['method']['doesNotPerformAssertions'])) {
            $this->doesNotPerformAssertions = true;
        }
    }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function unregisterCustomComparators(): void
    {
        $factory = ComparatorFactory::getInstance();

        foreach ($this->customComparators as $comparator) {
            $factory->unregister($comparator);
        }

        $this->customComparators = [];
    }

    private function cleanupIniSettings(): void
    {
        foreach ($this->iniSettings as $varName => $oldValue) {
            ini_set($varName, $oldValue);
        }

        $this->iniSettings = [];
    }

    private function cleanupLocaleSettings(): void
    {
        foreach ($this->locale as $category => $locale) {
            setlocale($category, $locale);
        }

        $this->locale = [];
    }

    /**
     * @throws Exception
     */
<<<<<<< HEAD
    private function checkExceptionExpectations(Throwable $throwable): bool
=======
    private function shouldExceptionExpectationsBeVerified(Throwable $throwable): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $result = false;

        if ($this->expectedException !== null || $this->expectedExceptionCode !== null || $this->expectedExceptionMessage !== null || $this->expectedExceptionMessageRegExp !== null) {
            $result = true;
        }

        if ($throwable instanceof Exception) {
            $result = false;
        }

        if (is_string($this->expectedException)) {
            try {
                $reflector = new ReflectionClass($this->expectedException);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e,
                );
            }
            // @codeCoverageIgnoreEnd

            if ($this->expectedException === 'PHPUnit\Framework\Exception' ||
                $this->expectedException === '\PHPUnit\Framework\Exception' ||
                $reflector->isSubclassOf(Exception::class)) {
                $result = true;
            }
        }

        return $result;
    }

<<<<<<< HEAD
    private function runInSeparateProcess(): bool
    {
        return ($this->runTestInSeparateProcess || $this->runClassInSeparateProcess) &&
            !$this->inIsolation && !$this instanceof PhptTestCase;
=======
    private function shouldRunInSeparateProcess(): bool
    {
        if ($this->inIsolation) {
            return false;
        }

        if ($this->runTestInSeparateProcess) {
            return true;
        }

        if ($this->runClassInSeparateProcess) {
            return true;
        }

        return ConfigurationRegistry::get()->processIsolation();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function isCallableTestMethod(string $dependency): bool
    {
        [$className, $methodName] = explode('::', $dependency);

        if (!class_exists($className)) {
            return false;
        }

<<<<<<< HEAD
        try {
            $class = new ReflectionClass($className);
        } catch (ReflectionException $e) {
            return false;
        }
=======
        $class = new ReflectionClass($className);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        if (!$class->isSubclassOf(__CLASS__)) {
            return false;
        }

        if (!$class->hasMethod($methodName)) {
            return false;
        }

<<<<<<< HEAD
        try {
            $method = $class->getMethod($methodName);
        } catch (ReflectionException $e) {
            return false;
        }

        return TestUtil::isTestMethod($method);
    }

    /**
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    private function createMockObject(string $originalClassName): MockObject
    {
        return $this->getMockBuilder($originalClassName)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
=======
        return TestUtil::isTestMethod(
            $class->getMethod($methodName),
        );
    }

    /**
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws NoPreviousThrowableException
     */
    private function performAssertionsOnOutput(): void
    {
        try {
            if ($this->outputExpectedRegex !== null) {
                $this->assertMatchesRegularExpression($this->outputExpectedRegex, $this->output);
            } elseif ($this->outputExpectedString !== null) {
                $this->assertSame($this->outputExpectedString, $this->output);
            }
        } catch (ExpectationFailedException $e) {
            $this->status = TestStatus::failure($e->getMessage());

            Event\Facade::emitter()->testFailed(
                $this->valueObjectForEvents(),
                Event\Code\ThrowableBuilder::from($e),
                Event\Code\ComparisonFailureBuilder::from($e),
            );

            throw $e;
        }
    }

    /**
     * @param array{beforeClass: HookMethodCollection, before: HookMethodCollection, preCondition: HookMethodCollection, postCondition: HookMethodCollection, after: HookMethodCollection, afterClass: HookMethodCollection} $hookMethods
     *
     * @throws Throwable
     *
     * @codeCoverageIgnore
     */
    private function invokeBeforeClassHookMethods(array $hookMethods, Event\Emitter $emitter): void
    {
        $this->invokeHookMethods(
            $hookMethods['beforeClass'],
            $emitter,
            'beforeFirstTestMethodCalled',
            'beforeFirstTestMethodErrored',
            'beforeFirstTestMethodFinished',
        );
    }

    /**
     * @param array{beforeClass: HookMethodCollection, before: HookMethodCollection, preCondition: HookMethodCollection, postCondition: HookMethodCollection, after: HookMethodCollection, afterClass: HookMethodCollection} $hookMethods
     *
     * @throws Throwable
     */
    private function invokeBeforeTestHookMethods(array $hookMethods, Event\Emitter $emitter): void
    {
        $this->invokeHookMethods(
            $hookMethods['before'],
            $emitter,
            'beforeTestMethodCalled',
            'beforeTestMethodErrored',
            'beforeTestMethodFinished',
        );
    }

    /**
     * @param array{beforeClass: HookMethodCollection, before: HookMethodCollection, preCondition: HookMethodCollection, postCondition: HookMethodCollection, after: HookMethodCollection, afterClass: HookMethodCollection} $hookMethods
     *
     * @throws Throwable
     */
    private function invokePreConditionHookMethods(array $hookMethods, Event\Emitter $emitter): void
    {
        $this->invokeHookMethods(
            $hookMethods['preCondition'],
            $emitter,
            'preConditionCalled',
            'preConditionErrored',
            'preConditionFinished',
        );
    }

    /**
     * @param array{beforeClass: HookMethodCollection, before: HookMethodCollection, preCondition: HookMethodCollection, postCondition: HookMethodCollection, after: HookMethodCollection, afterClass: HookMethodCollection} $hookMethods
     *
     * @throws Throwable
     */
    private function invokePostConditionHookMethods(array $hookMethods, Event\Emitter $emitter): void
    {
        $this->invokeHookMethods(
            $hookMethods['postCondition'],
            $emitter,
            'postConditionCalled',
            'postConditionErrored',
            'postConditionFinished',
        );
    }

    /**
     * @param array{beforeClass: HookMethodCollection, before: HookMethodCollection, preCondition: HookMethodCollection, postCondition: HookMethodCollection, after: HookMethodCollection, afterClass: HookMethodCollection} $hookMethods
     *
     * @throws Throwable
     */
    private function invokeAfterTestHookMethods(array $hookMethods, Event\Emitter $emitter): void
    {
        $this->invokeHookMethods(
            $hookMethods['after'],
            $emitter,
            'afterTestMethodCalled',
            'afterTestMethodErrored',
            'afterTestMethodFinished',
        );
    }

    /**
     * @param array{beforeClass: HookMethodCollection, before: HookMethodCollection, preCondition: HookMethodCollection, postCondition: HookMethodCollection, after: HookMethodCollection, afterClass: HookMethodCollection} $hookMethods
     *
     * @throws Throwable
     *
     * @codeCoverageIgnore
     */
    private function invokeAfterClassHookMethods(array $hookMethods, Event\Emitter $emitter): void
    {
        $this->invokeHookMethods(
            $hookMethods['afterClass'],
            $emitter,
            'afterLastTestMethodCalled',
            'afterLastTestMethodErrored',
            'afterLastTestMethodFinished',
        );
    }

    /**
     * @param 'afterLastTestMethodCalled'|'afterTestMethodCalled'|'beforeFirstTestMethodCalled'|'beforeTestMethodCalled'|'postConditionCalled'|'preConditionCalled'             $calledMethod
     * @param 'afterLastTestMethodErrored'|'afterTestMethodErrored'|'beforeFirstTestMethodErrored'|'beforeTestMethodErrored'|'postConditionErrored'|'preConditionErrored'       $erroredMethod
     * @param 'afterLastTestMethodFinished'|'afterTestMethodFinished'|'beforeFirstTestMethodFinished'|'beforeTestMethodFinished'|'postConditionFinished'|'preConditionFinished' $finishedMethod *
     *
     * @throws Throwable
     */
    private function invokeHookMethods(HookMethodCollection $hookMethods, Event\Emitter $emitter, string $calledMethod, string $erroredMethod, string $finishedMethod): void
    {
        $methodsInvoked = [];

        foreach ($hookMethods->methodNamesSortedByPriority() as $methodName) {
            if ($this->methodDoesNotExistOrIsDeclaredInTestCase($methodName)) {
                continue;
            }

            $methodInvoked = new Event\Code\ClassMethod(
                static::class,
                $methodName,
            );

            try {
                $this->{$methodName}();
            } catch (Throwable $t) {
            }

            $emitter->{$calledMethod}(
                static::class,
                $methodInvoked
            );

            $methodsInvoked[] = $methodInvoked;

            if (isset($t) && !$t instanceof SkippedTest) {
                $emitter->{$erroredMethod}(
                    static::class,
                    $methodInvoked,
                    Event\Code\ThrowableBuilder::from($t),
                );

                break;
            }
        }

        if (!empty($methodsInvoked)) {
            $emitter->{$finishedMethod}(
                static::class,
                ...$methodsInvoked
            );
        }

        if (isset($t)) {
            throw $t;
        }
    }

    /**
     * @param non-empty-string $methodName
     */
    private function methodDoesNotExistOrIsDeclaredInTestCase(string $methodName): bool
    {
        $reflector = new ReflectionObject($this);

        return !$reflector->hasMethod($methodName) ||
               $reflector->getMethod($methodName)->getDeclaringClass()->getName() === self::class;
    }

    /**
     * @throws ExpectationFailedException
     */
    private function verifyExceptionExpectations(\Exception|Throwable $exception): void
    {
        if ($this->expectedException !== null) {
            $this->assertThat(
                $exception,
                new ExceptionConstraint(
                    $this->expectedException,
                ),
            );
        }

        if ($this->expectedExceptionMessage !== null) {
            $this->assertThat(
                $exception->getMessage(),
                new ExceptionMessageIsOrContains(
                    $this->expectedExceptionMessage,
                ),
            );
        }

        if ($this->expectedExceptionMessageRegExp !== null) {
            $this->assertThat(
                $exception->getMessage(),
                new ExceptionMessageMatchesRegularExpression(
                    $this->expectedExceptionMessageRegExp,
                ),
            );
        }

        if ($this->expectedExceptionCode !== null) {
            $this->assertThat(
                $exception->getCode(),
                new ExceptionCode(
                    $this->expectedExceptionCode,
                ),
            );
        }
    }

    /**
     * @throws AssertionFailedError
     */
    private function expectedExceptionWasNotRaised(): void
    {
        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
                new ExceptionConstraint($this->expectedException),
            );
        } elseif ($this->expectedExceptionMessage !== null) {
            $this->numberOfAssertionsPerformed++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with message "%s" is thrown',
                    $this->expectedExceptionMessage,
                ),
            );
        } elseif ($this->expectedExceptionMessageRegExp !== null) {
            $this->numberOfAssertionsPerformed++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with message matching "%s" is thrown',
                    $this->expectedExceptionMessageRegExp,
                ),
            );
        } elseif ($this->expectedExceptionCode !== null) {
            $this->numberOfAssertionsPerformed++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with code "%s" is thrown',
                    $this->expectedExceptionCode,
                ),
            );
        }
    }

    private function isRegisteredFailure(Throwable $t): bool
    {
        foreach (array_keys($this->failureTypes) as $failureType) {
            if ($t instanceof $failureType) {
                return true;
            }
        }

        return false;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    private function hasExpectationOnOutput(): bool
    {
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex);
    }

    private function requirementsNotSatisfied(): bool
    {
        return (new Requirements)->requirementsNotSatisfiedFor(static::class, $this->methodName) !== [];
    }

    private function requiresXdebug(): bool
    {
        return (new Requirements)->requiresXdebug(static::class, $this->methodName);
    }

    /**
     * @see https://github.com/sebastianbergmann/phpunit/issues/6095
     */
    private function handleExceptionFromInvokedCountMockObjectRule(Throwable $t): void
    {
        if (!$t instanceof ExpectationFailedException) {
            return;
        }

        $trace = $t->getTrace();

        if (isset($trace[0]['class']) && $trace[0]['class'] === InvokedCount::class) {
            $this->numberOfAssertionsPerformed++;
        }
    }

    /**
     * Creates a test stub for the specified interface or class.
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $originalClassName
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     * @throws NoPreviousThrowableException
     *
     * @return RealInstanceType&Stub
     */
    final protected static function createStub(string $originalClassName): Stub
    {
        $stub = (new MockGenerator)->testDouble(
            $originalClassName,
            true,
            false,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
            returnValueGeneration: self::generateReturnValuesForTestDoubles(),
        );

        Event\Facade::emitter()->testCreatedStub($originalClassName);

        assert($stub instanceof $originalClassName);
        assert($stub instanceof Stub);

        return $stub;
    }

    /**
     * @param list<class-string> $interfaces
     *
     * @throws MockObjectException
     */
    final protected static function createStubForIntersectionOfInterfaces(array $interfaces): Stub
    {
        $stub = (new MockGenerator)->testDoubleForInterfaceIntersection(
            $interfaces,
            false,
            returnValueGeneration: self::generateReturnValuesForTestDoubles(),
        );

        Event\Facade::emitter()->testCreatedStubForIntersectionOfInterfaces($interfaces);

        return $stub;
    }

    /**
     * Creates (and configures) a test stub for the specified interface or class.
     *
     * @template RealInstanceType of object
     *
     * @param class-string<RealInstanceType> $originalClassName
     * @param array<non-empty-string, mixed> $configuration
     *
     * @throws InvalidArgumentException
     * @throws MockObjectException
     * @throws NoPreviousThrowableException
     *
     * @return RealInstanceType&Stub
     */
    final protected static function createConfiguredStub(string $originalClassName, array $configuration): Stub
    {
        $o = self::createStub($originalClassName);

        foreach ($configuration as $method => $return) {
            $o->method($method)->willReturn($return);
        }

        return $o;
    }

    private static function generateReturnValuesForTestDoubles(): bool
    {
        return MetadataRegistry::parser()->forClass(static::class)->isDisableReturnValueGenerationForTestDoubles()->isEmpty();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
