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
use const DEBUG_BACKTRACE_IGNORE_ARGS;
use const PHP_EOL;
use function array_shift;
use function array_unshift;
use function assert;
use function class_exists;
use function count;
use function debug_backtrace;
use function explode;
use function file_get_contents;
use function func_get_args;
use function implode;
use function interface_exists;
use function is_array;
use function is_bool;
use function is_int;
use function is_iterable;
use function is_object;
use function is_string;
use function preg_match;
use function preg_split;
use function sprintf;
use function strpos;
use ArrayAccess;
use Countable;
use DOMAttr;
use DOMDocument;
use DOMElement;
use Generator;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\ClassHasAttribute;
use PHPUnit\Framework\Constraint\ClassHasStaticAttribute;
=======
use function array_combine;
use function array_intersect_key;
use function class_exists;
use function count;
use function file_get_contents;
use function interface_exists;
use function is_bool;
use ArrayAccess;
use Countable;
use Generator;
use PHPUnit\Event;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\Callback;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\DirectoryExists;
use PHPUnit\Framework\Constraint\FileExists;
use PHPUnit\Framework\Constraint\GreaterThan;
use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsEqualCanonicalizing;
use PHPUnit\Framework\Constraint\IsEqualIgnoringCase;
use PHPUnit\Framework\Constraint\IsEqualWithDelta;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsFinite;
use PHPUnit\Framework\Constraint\IsIdentical;
use PHPUnit\Framework\Constraint\IsInfinite;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsJson;
<<<<<<< HEAD
=======
use PHPUnit\Framework\Constraint\IsList;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PHPUnit\Framework\Constraint\IsNan;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsReadable;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\IsWritable;
use PHPUnit\Framework\Constraint\JsonMatches;
use PHPUnit\Framework\Constraint\LessThan;
use PHPUnit\Framework\Constraint\LogicalAnd;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Constraint\LogicalXor;
use PHPUnit\Framework\Constraint\ObjectEquals;
<<<<<<< HEAD
use PHPUnit\Framework\Constraint\ObjectHasAttribute;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PHPUnit\Framework\Constraint\ObjectHasProperty;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\Constraint\SameSize;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Framework\Constraint\StringEndsWith;
<<<<<<< HEAD
=======
use PHPUnit\Framework\Constraint\StringEqualsStringIgnoringLineEndings;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PHPUnit\Framework\Constraint\StringMatchesFormatDescription;
use PHPUnit\Framework\Constraint\StringStartsWith;
use PHPUnit\Framework\Constraint\TraversableContainsEqual;
use PHPUnit\Framework\Constraint\TraversableContainsIdentical;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;
<<<<<<< HEAD
use PHPUnit\Util\Type;
use PHPUnit\Util\Xml;
use PHPUnit\Util\Xml\Loader as XmlLoader;
=======
use PHPUnit\Util\Xml\Loader as XmlLoader;
use PHPUnit\Util\Xml\XmlException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
abstract class Assert
{
<<<<<<< HEAD
    /**
     * @var int
     */
    private static $count = 0;
=======
    private static int $count = 0;

    /**
     * Asserts that two arrays are equal while only considering a list of keys.
     *
     * @param array<mixed>              $expected
     * @param array<mixed>              $actual
     * @param non-empty-list<array-key> $keysToBeConsidered
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertArrayIsEqualToArrayOnlyConsideringListOfKeys(array $expected, array $actual, array $keysToBeConsidered, string $message = ''): void
    {
        $filteredExpected = [];

        foreach ($keysToBeConsidered as $key) {
            if (isset($expected[$key])) {
                $filteredExpected[$key] = $expected[$key];
            }
        }

        $filteredActual = [];

        foreach ($keysToBeConsidered as $key) {
            if (isset($actual[$key])) {
                $filteredActual[$key] = $actual[$key];
            }
        }

        self::assertEquals($filteredExpected, $filteredActual, $message);
    }

    /**
     * Asserts that two arrays are equal while ignoring a list of keys.
     *
     * @param array<mixed>              $expected
     * @param array<mixed>              $actual
     * @param non-empty-list<array-key> $keysToBeIgnored
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertArrayIsEqualToArrayIgnoringListOfKeys(array $expected, array $actual, array $keysToBeIgnored, string $message = ''): void
    {
        foreach ($keysToBeIgnored as $key) {
            unset($expected[$key], $actual[$key]);
        }

        self::assertEquals($expected, $actual, $message);
    }

    /**
     * Asserts that two arrays are identical while only considering a list of keys.
     *
     * @param array<mixed>              $expected
     * @param array<mixed>              $actual
     * @param non-empty-list<array-key> $keysToBeConsidered
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertArrayIsIdenticalToArrayOnlyConsideringListOfKeys(array $expected, array $actual, array $keysToBeConsidered, string $message = ''): void
    {
        $keysToBeConsidered = array_combine($keysToBeConsidered, $keysToBeConsidered);
        $expected           = array_intersect_key($expected, $keysToBeConsidered);
        $actual             = array_intersect_key($actual, $keysToBeConsidered);

        self::assertSame($expected, $actual, $message);
    }

    /**
     * Asserts that two arrays are equal while ignoring a list of keys.
     *
     * @param array<mixed>              $expected
     * @param array<mixed>              $actual
     * @param non-empty-list<array-key> $keysToBeIgnored
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertArrayIsIdenticalToArrayIgnoringListOfKeys(array $expected, array $actual, array $keysToBeIgnored, string $message = ''): void
    {
        foreach ($keysToBeIgnored as $key) {
            unset($expected[$key], $actual[$key]);
        }

        self::assertSame($expected, $actual, $message);
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * Asserts that an array has a specified key.
     *
<<<<<<< HEAD
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertArrayHasKey($key, $array, string $message = ''): void
    {
        if (!(is_int($key) || is_string($key))) {
            throw InvalidArgumentException::create(
                1,
                'integer or string',
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentException::create(
                2,
                'array or ArrayAccess',
            );
        }

        $constraint = new ArrayHasKey($key);

        static::assertThat($array, $constraint, $message);
=======
     * @param array<mixed>|ArrayAccess<array-key, mixed> $array
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertArrayHasKey(mixed $key, array|ArrayAccess $array, string $message = ''): void
    {
        $constraint = new ArrayHasKey($key);

        self::assertThat($array, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that an array does not have a specified key.
     *
<<<<<<< HEAD
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertArrayNotHasKey($key, $array, string $message = ''): void
    {
        if (!(is_int($key) || is_string($key))) {
            throw InvalidArgumentException::create(
                1,
                'integer or string',
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentException::create(
                2,
                'array or ArrayAccess',
            );
        }

=======
     * @param array<mixed>|ArrayAccess<array-key, mixed> $array
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertArrayNotHasKey(mixed $key, array|ArrayAccess $array, string $message = ''): void
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $constraint = new LogicalNot(
            new ArrayHasKey($key),
        );

<<<<<<< HEAD
        static::assertThat($array, $constraint, $message);
=======
        self::assertThat($array, $constraint, $message);
    }

    /**
     * @phpstan-assert list<mixed> $array
     *
     * @throws ExpectationFailedException
     */
    final public static function assertIsList(mixed $array, string $message = ''): void
    {
        self::assertThat(
            $array,
            new IsList,
            $message,
        );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a haystack contains a needle.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertContains($needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new TraversableContainsIdentical($needle);

        static::assertThat($haystack, $constraint, $message);
    }

    public static function assertContainsEquals($needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new TraversableContainsEqual($needle);

        static::assertThat($haystack, $constraint, $message);
=======
     * @param iterable<mixed> $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertContains(mixed $needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new TraversableContainsIdentical($needle);

        self::assertThat($haystack, $constraint, $message);
    }

    /**
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsEquals(mixed $needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new TraversableContainsEqual($needle);

        self::assertThat($haystack, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a haystack does not contain a needle.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertNotContains($needle, iterable $haystack, string $message = ''): void
=======
     * @param iterable<mixed> $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertNotContains(mixed $needle, iterable $haystack, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraint = new LogicalNot(
            new TraversableContainsIdentical($needle),
        );

<<<<<<< HEAD
        static::assertThat($haystack, $constraint, $message);
    }

    public static function assertNotContainsEquals($needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new TraversableContainsEqual($needle));

        static::assertThat($haystack, $constraint, $message);
=======
        self::assertThat($haystack, $constraint, $message);
    }

    /**
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertNotContainsEquals(mixed $needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new TraversableContainsEqual($needle));

        self::assertThat($haystack, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a haystack contains only values of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        if ($isNativeType === null) {
            $isNativeType = Type::isType($type);
        }

        static::assertThat(
=======
     * @param 'array'|'bool'|'boolean'|'callable'|'double'|'float'|'int'|'integer'|'iterable'|'null'|'numeric'|'object'|'real'|'resource (closed)'|'resource'|'scalar'|'string' $type
     * @param iterable<mixed>                                                                                                                                                   $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/6055
     */
    final public static function assertContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        if ($isNativeType === null) {
            $isNativeType = self::isNativeType($type);
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $haystack,
            new TraversableContainsOnly(
                $type,
                $isNativeType,
            ),
            $message,
        );
    }

    /**
<<<<<<< HEAD
     * Asserts that a haystack contains only instances of a given class name.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertContainsOnlyInstancesOf(string $className, iterable $haystack, string $message = ''): void
    {
        static::assertThat(
=======
     * Asserts that a haystack contains only values of type array.
     *
     * @phpstan-assert iterable<array<mixed>> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyArray(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Array->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type bool.
     *
     * @phpstan-assert iterable<bool> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyBool(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Bool->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type callable.
     *
     * @phpstan-assert iterable<callable> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyCallable(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Callable->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type float.
     *
     * @phpstan-assert iterable<float> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyFloat(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Float->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type int.
     *
     * @phpstan-assert iterable<int> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyInt(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Int->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type iterable.
     *
     * @phpstan-assert iterable<iterable<mixed>> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyIterable(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Iterable->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type null.
     *
     * @phpstan-assert iterable<null> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyNull(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Null->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type numeric.
     *
     * @phpstan-assert iterable<numeric> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyNumeric(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Numeric->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type object.
     *
     * @phpstan-assert iterable<object> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyObject(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Object->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type resource.
     *
     * @phpstan-assert iterable<resource> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyResource(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Resource->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type closed resource.
     *
     * @phpstan-assert iterable<resource> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyClosedResource(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::ClosedResource->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type scalar.
     *
     * @phpstan-assert iterable<scalar> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyScalar(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::Scalar->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only values of type string.
     *
     * @phpstan-assert iterable<string> $haystack
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyString(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new TraversableContainsOnly(
                NativeType::String->value,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack contains only instances of a specified interface or class name.
     *
     * @template T
     *
     * @phpstan-assert iterable<T> $haystack
     *
     * @param class-string<T> $className
     * @param iterable<mixed> $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertContainsOnlyInstancesOf(string $className, iterable $haystack, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $haystack,
            new TraversableContainsOnly(
                $className,
                false,
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        if ($isNativeType === null) {
            $isNativeType = Type::isType($type);
        }

        static::assertThat(
=======
     * @param 'array'|'bool'|'boolean'|'callable'|'double'|'float'|'int'|'integer'|'iterable'|'null'|'numeric'|'object'|'real'|'resource (closed)'|'resource'|'scalar'|'string' $type
     * @param iterable<mixed>                                                                                                                                                   $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/6055
     */
    final public static function assertNotContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        if ($isNativeType === null) {
            $isNativeType = self::isNativeType($type);
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    $type,
                    $isNativeType,
                ),
            ),
            $message,
        );
    }

    /**
<<<<<<< HEAD
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param Countable|iterable $haystack
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertCount(int $expectedCount, $haystack, string $message = ''): void
    {
        if ($haystack instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $haystack parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        if (!$haystack instanceof Countable && !is_iterable($haystack)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        static::assertThat(
=======
     * Asserts that a haystack does not contain only values of type array.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyArray(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Array->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type bool.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyBool(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Bool->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type callable.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyCallable(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Callable->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type float.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyFloat(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Float->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type int.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyInt(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Int->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type iterable.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyIterable(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Iterable->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type null.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyNull(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Null->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type numeric.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyNumeric(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Numeric->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type object.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyObject(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Object->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type resource.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyResource(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Resource->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type closed resource.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyClosedResource(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::ClosedResource->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type scalar.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyScalar(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::Scalar->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only values of type string.
     *
     * @param iterable<mixed> $haystack
     *
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyString(iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    NativeType::String->value,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a haystack does not contain only instances of a specified interface or class name.
     *
     * @param class-string    $className
     * @param iterable<mixed> $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     */
    final public static function assertContainsNotOnlyInstancesOf(string $className, iterable $haystack, string $message = ''): void
    {
        self::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
                    $className,
                    false,
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param Countable|iterable<mixed> $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws GeneratorNotSupportedException
     */
    final public static function assertCount(int $expectedCount, Countable|iterable $haystack, string $message = ''): void
    {
        if ($haystack instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$haystack');
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $haystack,
            new Count($expectedCount),
            $message,
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
<<<<<<< HEAD
     * @param Countable|iterable $haystack
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertNotCount(int $expectedCount, $haystack, string $message = ''): void
    {
        if ($haystack instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $haystack parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        if (!$haystack instanceof Countable && !is_iterable($haystack)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
=======
     * @param Countable|iterable<mixed> $haystack
     *
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws GeneratorNotSupportedException
     */
    final public static function assertNotCount(int $expectedCount, Countable|iterable $haystack, string $message = ''): void
    {
        if ($haystack instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$haystack');
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $constraint = new LogicalNot(
            new Count($expectedCount),
        );

<<<<<<< HEAD
        static::assertThat($haystack, $constraint, $message);
=======
        self::assertThat($haystack, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEquals($expected, $actual, string $message = ''): void
    {
        $constraint = new IsEqual($expected);

        static::assertThat($actual, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void
    {
        $constraint = new IsEqual($expected);

        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are equal (canonicalizing).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEqualsCanonicalizing($expected, $actual, string $message = ''): void
    {
        $constraint = new IsEqualCanonicalizing($expected);

        static::assertThat($actual, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertEqualsCanonicalizing(mixed $expected, mixed $actual, string $message = ''): void
    {
        $constraint = new IsEqualCanonicalizing($expected);

        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are equal (ignoring case).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEqualsIgnoringCase($expected, $actual, string $message = ''): void
    {
        $constraint = new IsEqualIgnoringCase($expected);

        static::assertThat($actual, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertEqualsIgnoringCase(mixed $expected, mixed $actual, string $message = ''): void
    {
        $constraint = new IsEqualIgnoringCase($expected);

        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are equal (with delta).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertEqualsWithDelta(mixed $expected, mixed $actual, float $delta, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraint = new IsEqualWithDelta(
            $expected,
            $delta,
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are not equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEquals($expected, $actual, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertNotEquals(mixed $expected, mixed $actual, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraint = new LogicalNot(
            new IsEqual($expected),
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are not equal (canonicalizing).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEqualsCanonicalizing($expected, $actual, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertNotEqualsCanonicalizing(mixed $expected, mixed $actual, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraint = new LogicalNot(
            new IsEqualCanonicalizing($expected),
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are not equal (ignoring case).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEqualsIgnoringCase($expected, $actual, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertNotEqualsIgnoringCase(mixed $expected, mixed $actual, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraint = new LogicalNot(
            new IsEqualIgnoringCase($expected),
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two variables are not equal (with delta).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertNotEqualsWithDelta(mixed $expected, mixed $actual, float $delta, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $constraint = new LogicalNot(
            new IsEqualWithDelta(
                $expected,
                $delta,
            ),
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @throws ExpectationFailedException
     */
<<<<<<< HEAD
    public static function assertObjectEquals(object $expected, object $actual, string $method = 'equals', string $message = ''): void
    {
        static::assertThat(
            $actual,
            static::objectEquals($expected, $method),
=======
    final public static function assertObjectEquals(object $expected, object $actual, string $method = 'equals', string $message = ''): void
    {
        self::assertThat(
            $actual,
            self::objectEquals($expected, $method),
            $message,
        );
    }

    /**
     * @throws ExpectationFailedException
     */
    final public static function assertObjectNotEquals(object $expected, object $actual, string $method = 'equals', string $message = ''): void
    {
        self::assertThat(
            $actual,
            self::logicalNot(
                self::objectEquals($expected, $method),
            ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $message,
        );
    }

    /**
     * Asserts that a variable is empty.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert empty $actual
     */
    public static function assertEmpty($actual, string $message = ''): void
    {
        if ($actual instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $actual parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        static::assertThat($actual, static::isEmpty(), $message);
=======
     * @throws ExpectationFailedException
     * @throws GeneratorNotSupportedException
     */
    final public static function assertEmpty(mixed $actual, string $message = ''): void
    {
        if ($actual instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$actual');
        }

        self::assertThat($actual, self::isEmpty(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a variable is not empty.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !empty $actual
     */
    public static function assertNotEmpty($actual, string $message = ''): void
    {
        if ($actual instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $actual parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        static::assertThat($actual, static::logicalNot(static::isEmpty()), $message);
=======
     * @throws ExpectationFailedException
     * @throws GeneratorNotSupportedException
     */
    final public static function assertNotEmpty(mixed $actual, string $message = ''): void
    {
        if ($actual instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$actual');
        }

        self::assertThat($actual, self::logicalNot(self::isEmpty()), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a value is greater than another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertGreaterThan($expected, $actual, string $message = ''): void
    {
        static::assertThat($actual, static::greaterThan($expected), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertGreaterThan(mixed $minimum, mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::greaterThan($minimum), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a value is greater than or equal to another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertGreaterThanOrEqual($expected, $actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            static::greaterThanOrEqual($expected),
=======
     * @throws ExpectationFailedException
     */
    final public static function assertGreaterThanOrEqual(mixed $minimum, mixed $actual, string $message = ''): void
    {
        self::assertThat(
            $actual,
            self::greaterThanOrEqual($minimum),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $message,
        );
    }

    /**
     * Asserts that a value is smaller than another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertLessThan($expected, $actual, string $message = ''): void
    {
        static::assertThat($actual, static::lessThan($expected), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertLessThan(mixed $maximum, mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::lessThan($maximum), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a value is smaller than or equal to another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertLessThanOrEqual($expected, $actual, string $message = ''): void
    {
        static::assertThat($actual, static::lessThanOrEqual($expected), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertLessThanOrEqual(mixed $maximum, mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::lessThanOrEqual($maximum), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileEquals(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new IsEqual(file_get_contents($expected));

        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileEquals(string $expected, string $actual, string $message = ''): void
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);

        $constraint = new IsEqual(file_get_contents($expected));

        self::assertThat(file_get_contents($actual), $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file (canonicalizing).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new IsEqualCanonicalizing(
            file_get_contents($expected),
        );

<<<<<<< HEAD
        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
        self::assertThat(file_get_contents($actual), $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file (ignoring case).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new IsEqualIgnoringCase(file_get_contents($expected));

        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);

        $constraint = new IsEqualIgnoringCase(file_get_contents($expected));

        self::assertThat(file_get_contents($actual), $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of
     * another file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotEquals(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileNotEquals(string $expected, string $actual, string $message = ''): void
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new LogicalNot(
            new IsEqual(file_get_contents($expected)),
        );

<<<<<<< HEAD
        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
        self::assertThat(file_get_contents($actual), $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of another
     * file (canonicalizing).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileNotEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new LogicalNot(
            new IsEqualCanonicalizing(file_get_contents($expected)),
        );

<<<<<<< HEAD
        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
        self::assertThat(file_get_contents($actual), $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of another
     * file (ignoring case).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileNotEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new LogicalNot(
            new IsEqualIgnoringCase(file_get_contents($expected)),
        );

<<<<<<< HEAD
        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
        self::assertThat(file_get_contents($actual), $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new IsEqual(file_get_contents($expectedFile));

        static::assertThat($actualString, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $constraint = new IsEqual(file_get_contents($expectedFile));

        self::assertThat($actualString, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file (canonicalizing).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new IsEqualCanonicalizing(file_get_contents($expectedFile));

        static::assertThat($actualString, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $constraint = new IsEqualCanonicalizing(file_get_contents($expectedFile));

        self::assertThat($actualString, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file (ignoring case).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new IsEqualIgnoringCase(file_get_contents($expectedFile));

        static::assertThat($actualString, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $constraint = new IsEqualIgnoringCase(file_get_contents($expectedFile));

        self::assertThat($actualString, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new LogicalNot(
            new IsEqual(file_get_contents($expectedFile)),
        );

<<<<<<< HEAD
        static::assertThat($actualString, $constraint, $message);
=======
        self::assertThat($actualString, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file (canonicalizing).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringNotEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new LogicalNot(
            new IsEqualCanonicalizing(file_get_contents($expectedFile)),
        );

<<<<<<< HEAD
        static::assertThat($actualString, $constraint, $message);
=======
        self::assertThat($actualString, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file (ignoring case).
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringNotEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $constraint = new LogicalNot(
            new IsEqualIgnoringCase(file_get_contents($expectedFile)),
        );

<<<<<<< HEAD
        static::assertThat($actualString, $constraint, $message);
=======
        self::assertThat($actualString, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a file/dir is readable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertIsReadable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new IsReadable, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertIsReadable(string $filename, string $message = ''): void
    {
        self::assertThat($filename, new IsReadable, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertIsNotReadable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new LogicalNot(new IsReadable), $message);
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4062
     */
    public static function assertNotIsReadable(string $filename, string $message = ''): void
    {
        self::createWarning('assertNotIsReadable() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertIsNotReadable() instead.');

        static::assertThat($filename, new LogicalNot(new IsReadable), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertIsNotReadable(string $filename, string $message = ''): void
    {
        self::assertThat($filename, new LogicalNot(new IsReadable), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a file/dir exists and is writable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertIsWritable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new IsWritable, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertIsWritable(string $filename, string $message = ''): void
    {
        self::assertThat($filename, new IsWritable, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertIsNotWritable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new LogicalNot(new IsWritable), $message);
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4065
     */
    public static function assertNotIsWritable(string $filename, string $message = ''): void
    {
        self::createWarning('assertNotIsWritable() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertIsNotWritable() instead.');

        static::assertThat($filename, new LogicalNot(new IsWritable), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertIsNotWritable(string $filename, string $message = ''): void
    {
        self::assertThat($filename, new LogicalNot(new IsWritable), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a directory exists.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryExists(string $directory, string $message = ''): void
    {
        static::assertThat($directory, new DirectoryExists, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertDirectoryExists(string $directory, string $message = ''): void
    {
        self::assertThat($directory, new DirectoryExists, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a directory does not exist.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryDoesNotExist(string $directory, string $message = ''): void
    {
        static::assertThat($directory, new LogicalNot(new DirectoryExists), $message);
    }

    /**
     * Asserts that a directory does not exist.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4068
     */
    public static function assertDirectoryNotExists(string $directory, string $message = ''): void
    {
        self::createWarning('assertDirectoryNotExists() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertDirectoryDoesNotExist() instead.');

        static::assertThat($directory, new LogicalNot(new DirectoryExists), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertDirectoryDoesNotExist(string $directory, string $message = ''): void
    {
        self::assertThat($directory, new LogicalNot(new DirectoryExists), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a directory exists and is readable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryIsReadable(string $directory, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertDirectoryIsReadable(string $directory, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsReadable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryIsNotReadable(string $directory, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertDirectoryIsNotReadable(string $directory, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsNotReadable($directory, $message);
    }

    /**
<<<<<<< HEAD
     * Asserts that a directory exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4071
     */
    public static function assertDirectoryNotIsReadable(string $directory, string $message = ''): void
    {
        self::createWarning('assertDirectoryNotIsReadable() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertDirectoryIsNotReadable() instead.');

        self::assertDirectoryExists($directory, $message);
        self::assertIsNotReadable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryIsWritable(string $directory, string $message = ''): void
=======
     * Asserts that a directory exists and is writable.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertDirectoryIsWritable(string $directory, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsWritable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is not writable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryIsNotWritable(string $directory, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertDirectoryIsNotWritable(string $directory, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsNotWritable($directory, $message);
    }

    /**
<<<<<<< HEAD
     * Asserts that a directory exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4074
     */
    public static function assertDirectoryNotIsWritable(string $directory, string $message = ''): void
    {
        self::createWarning('assertDirectoryNotIsWritable() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertDirectoryIsNotWritable() instead.');

        self::assertDirectoryExists($directory, $message);
        self::assertIsNotWritable($directory, $message);
    }

    /**
     * Asserts that a file exists.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileExists(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new FileExists, $message);
=======
     * Asserts that a file exists.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertFileExists(string $filename, string $message = ''): void
    {
        self::assertThat($filename, new FileExists, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a file does not exist.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileDoesNotExist(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new LogicalNot(new FileExists), $message);
    }

    /**
     * Asserts that a file does not exist.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4077
     */
    public static function assertFileNotExists(string $filename, string $message = ''): void
    {
        self::createWarning('assertFileNotExists() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertFileDoesNotExist() instead.');

        static::assertThat($filename, new LogicalNot(new FileExists), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileDoesNotExist(string $filename, string $message = ''): void
    {
        self::assertThat($filename, new LogicalNot(new FileExists), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a file exists and is readable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileIsReadable(string $file, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileIsReadable(string $file, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertFileExists($file, $message);
        self::assertIsReadable($file, $message);
    }

    /**
     * Asserts that a file exists and is not readable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileIsNotReadable(string $file, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileIsNotReadable(string $file, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertFileExists($file, $message);
        self::assertIsNotReadable($file, $message);
    }

    /**
<<<<<<< HEAD
     * Asserts that a file exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4080
     */
    public static function assertFileNotIsReadable(string $file, string $message = ''): void
    {
        self::createWarning('assertFileNotIsReadable() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertFileIsNotReadable() instead.');

        self::assertFileExists($file, $message);
        self::assertIsNotReadable($file, $message);
    }

    /**
     * Asserts that a file exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileIsWritable(string $file, string $message = ''): void
=======
     * Asserts that a file exists and is writable.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertFileIsWritable(string $file, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertFileExists($file, $message);
        self::assertIsWritable($file, $message);
    }

    /**
     * Asserts that a file exists and is not writable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileIsNotWritable(string $file, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFileIsNotWritable(string $file, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::assertFileExists($file, $message);
        self::assertIsNotWritable($file, $message);
    }

    /**
<<<<<<< HEAD
     * Asserts that a file exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4083
     */
    public static function assertFileNotIsWritable(string $file, string $message = ''): void
    {
        self::createWarning('assertFileNotIsWritable() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertFileIsNotWritable() instead.');

        self::assertFileExists($file, $message);
        self::assertIsNotWritable($file, $message);
    }

    /**
     * Asserts that a condition is true.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert true $condition
     */
    public static function assertTrue($condition, string $message = ''): void
    {
        static::assertThat($condition, static::isTrue(), $message);
=======
     * Asserts that a condition is true.
     *
     * @throws ExpectationFailedException
     *
     * @phpstan-assert true $condition
     */
    final public static function assertTrue(mixed $condition, string $message = ''): void
    {
        self::assertThat($condition, self::isTrue(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a condition is not true.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !true $condition
     */
    public static function assertNotTrue($condition, string $message = ''): void
    {
        static::assertThat($condition, static::logicalNot(static::isTrue()), $message);
=======
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !true $condition
     */
    final public static function assertNotTrue(mixed $condition, string $message = ''): void
    {
        self::assertThat($condition, self::logicalNot(self::isTrue()), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a condition is false.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert false $condition
     */
    public static function assertFalse($condition, string $message = ''): void
    {
        static::assertThat($condition, static::isFalse(), $message);
=======
     * @throws ExpectationFailedException
     *
     * @phpstan-assert false $condition
     */
    final public static function assertFalse(mixed $condition, string $message = ''): void
    {
        self::assertThat($condition, self::isFalse(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a condition is not false.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !false $condition
     */
    public static function assertNotFalse($condition, string $message = ''): void
    {
        static::assertThat($condition, static::logicalNot(static::isFalse()), $message);
=======
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !false $condition
     */
    final public static function assertNotFalse(mixed $condition, string $message = ''): void
    {
        self::assertThat($condition, self::logicalNot(self::isFalse()), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a variable is null.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert null $actual
     */
    public static function assertNull($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isNull(), $message);
=======
     * @throws ExpectationFailedException
     *
     * @phpstan-assert null $actual
     */
    final public static function assertNull(mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::isNull(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a variable is not null.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !null $actual
     */
    public static function assertNotNull($actual, string $message = ''): void
    {
        static::assertThat($actual, static::logicalNot(static::isNull()), $message);
=======
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !null $actual
     */
    final public static function assertNotNull(mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::logicalNot(self::isNull()), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a variable is finite.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFinite($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isFinite(), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertFinite(mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::isFinite(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a variable is infinite.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertInfinite($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isInfinite(), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertInfinite(mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::isInfinite(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a variable is nan.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNan($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isNan(), $message);
    }

    /**
     * Asserts that a class has a specified attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function assertClassHasAttribute(string $attributeName, string $className, string $message = ''): void
    {
        self::createWarning('assertClassHasAttribute() is deprecated and will be removed in PHPUnit 10.');

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat($className, new ClassHasAttribute($attributeName), $message);
    }

    /**
     * Asserts that a class does not have a specified attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function assertClassNotHasAttribute(string $attributeName, string $className, string $message = ''): void
    {
        self::createWarning('assertClassNotHasAttribute() is deprecated and will be removed in PHPUnit 10.');

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat(
            $className,
            new LogicalNot(
                new ClassHasAttribute($attributeName),
            ),
            $message,
        );
    }

    /**
     * Asserts that a class has a specified static attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function assertClassHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
    {
        self::createWarning('assertClassHasStaticAttribute() is deprecated and will be removed in PHPUnit 10.');

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat(
            $className,
            new ClassHasStaticAttribute($attributeName),
            $message,
        );
    }

    /**
     * Asserts that a class does not have a specified static attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function assertClassNotHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
    {
        self::createWarning('assertClassNotHasStaticAttribute() is deprecated and will be removed in PHPUnit 10.');

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat(
            $className,
            new LogicalNot(
                new ClassHasStaticAttribute($attributeName),
            ),
            $message,
        );
    }

    /**
     * Asserts that an object has a specified attribute.
     *
     * @param object $object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function assertObjectHasAttribute(string $attributeName, $object, string $message = ''): void
    {
        self::createWarning('assertObjectHasAttribute() is deprecated and will be removed in PHPUnit 10. Refactor your test to use assertObjectHasProperty() instead.');

        if (!self::isValidObjectAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw InvalidArgumentException::create(2, 'object');
        }

        static::assertThat(
            $object,
            new ObjectHasAttribute($attributeName),
            $message,
        );
    }

    /**
     * Asserts that an object does not have a specified attribute.
     *
     * @param object $object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function assertObjectNotHasAttribute(string $attributeName, $object, string $message = ''): void
    {
        self::createWarning('assertObjectNotHasAttribute() is deprecated and will be removed in PHPUnit 10. Refactor your test to use assertObjectNotHasProperty() instead.');

        if (!self::isValidObjectAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw InvalidArgumentException::create(2, 'object');
        }

        static::assertThat(
            $object,
            new LogicalNot(
                new ObjectHasAttribute($attributeName),
            ),
            $message,
        );
=======
     * @throws ExpectationFailedException
     */
    final public static function assertNan(mixed $actual, string $message = ''): void
    {
        self::assertThat($actual, self::isNan(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that an object has a specified property.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertObjectHasProperty(string $propertyName, object $object, string $message = ''): void
    {
<<<<<<< HEAD
        static::assertThat(
=======
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $object,
            new ObjectHasProperty($propertyName),
            $message,
        );
    }

    /**
     * Asserts that an object does not have a specified property.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertObjectNotHasProperty(string $propertyName, object $object, string $message = ''): void
    {
<<<<<<< HEAD
        static::assertThat(
=======
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $object,
            new LogicalNot(
                new ObjectHasProperty($propertyName),
            ),
            $message,
        );
    }

    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
<<<<<<< HEAD
     * @psalm-template ExpectedType
     *
     * @psalm-param ExpectedType $expected
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert =ExpectedType $actual
     */
    public static function assertSame($expected, $actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @template ExpectedType
     *
     * @param ExpectedType $expected
     *
     * @throws ExpectationFailedException
     *
     * @phpstan-assert =ExpectedType $actual
     */
    final public static function assertSame(mixed $expected, mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsIdentical($expected),
            $message,
        );
    }

    /**
     * Asserts that two variables do not have the same type and value.
     * Used on objects, it asserts that two variables do not reference
     * the same object.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotSame($expected, $actual, string $message = ''): void
    {
        if (is_bool($expected) && is_bool($actual)) {
            static::assertNotEquals($expected, $actual, $message);
        }

        static::assertThat(
=======
     * @throws ExpectationFailedException
     */
    final public static function assertNotSame(mixed $expected, mixed $actual, string $message = ''): void
    {
        if (is_bool($expected) && is_bool($actual)) {
            self::assertNotEquals($expected, $actual, $message);
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(
                new IsIdentical($expected),
            ),
            $message,
        );
    }

    /**
     * Asserts that a variable is of a given type.
     *
<<<<<<< HEAD
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $expected
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @psalm-assert =ExpectedType $actual
     */
    public static function assertInstanceOf(string $expected, $actual, string $message = ''): void
    {
        if (!class_exists($expected) && !interface_exists($expected)) {
            throw InvalidArgumentException::create(1, 'class or interface name');
        }

        static::assertThat(
=======
     * @template ExpectedType of object
     *
     * @param class-string<ExpectedType> $expected
     *
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws UnknownClassOrInterfaceException
     *
     * @phpstan-assert =ExpectedType $actual
     */
    final public static function assertInstanceOf(string $expected, mixed $actual, string $message = ''): void
    {
        if (!class_exists($expected) && !interface_exists($expected)) {
            throw new UnknownClassOrInterfaceException($expected);
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsInstanceOf($expected),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of a given type.
     *
<<<<<<< HEAD
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $expected
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @psalm-assert !ExpectedType $actual
     */
    public static function assertNotInstanceOf(string $expected, $actual, string $message = ''): void
    {
        if (!class_exists($expected) && !interface_exists($expected)) {
            throw InvalidArgumentException::create(1, 'class or interface name');
        }

        static::assertThat(
=======
     * @template ExpectedType of object
     *
     * @param class-string<ExpectedType> $expected
     *
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !ExpectedType $actual
     */
    final public static function assertNotInstanceOf(string $expected, mixed $actual, string $message = ''): void
    {
        if (!class_exists($expected) && !interface_exists($expected)) {
            throw new UnknownClassOrInterfaceException($expected);
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(
                new IsInstanceOf($expected),
            ),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type array.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert array $actual
     */
    public static function assertIsArray($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert array<mixed> $actual
     */
    final public static function assertIsArray(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_ARRAY),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type bool.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert bool $actual
     */
    public static function assertIsBool($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert bool $actual
     */
    final public static function assertIsBool(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_BOOL),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type float.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert float $actual
     */
    public static function assertIsFloat($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert float $actual
     */
    final public static function assertIsFloat(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_FLOAT),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type int.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert int $actual
     */
    public static function assertIsInt($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert int $actual
     */
    final public static function assertIsInt(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_INT),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type numeric.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert numeric $actual
     */
    public static function assertIsNumeric($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert numeric $actual
     */
    final public static function assertIsNumeric(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_NUMERIC),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type object.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert object $actual
     */
    public static function assertIsObject($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert object $actual
     */
    final public static function assertIsObject(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_OBJECT),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type resource.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert resource $actual
     */
    public static function assertIsResource($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert resource $actual
     */
    final public static function assertIsResource(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_RESOURCE),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type resource and is closed.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert resource $actual
     */
    public static function assertIsClosedResource($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert resource $actual
     */
    final public static function assertIsClosedResource(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_CLOSED_RESOURCE),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert string $actual
     */
    public static function assertIsString($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert string $actual
     */
    final public static function assertIsString(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_STRING),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type scalar.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert scalar $actual
     */
    public static function assertIsScalar($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert scalar $actual
     */
    final public static function assertIsScalar(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_SCALAR),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type callable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert callable $actual
     */
    public static function assertIsCallable($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert callable $actual
     */
    final public static function assertIsCallable(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_CALLABLE),
            $message,
        );
    }

    /**
     * Asserts that a variable is of type iterable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert iterable $actual
     */
    public static function assertIsIterable($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert iterable<mixed> $actual
     */
    final public static function assertIsIterable(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new IsType(IsType::TYPE_ITERABLE),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type array.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !array $actual
     */
    public static function assertIsNotArray($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !array<mixed> $actual
     */
    final public static function assertIsNotArray(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_ARRAY)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type bool.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !bool $actual
     */
    public static function assertIsNotBool($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !bool $actual
     */
    final public static function assertIsNotBool(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_BOOL)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type float.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !float $actual
     */
    public static function assertIsNotFloat($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !float $actual
     */
    final public static function assertIsNotFloat(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_FLOAT)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type int.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !int $actual
     */
    public static function assertIsNotInt($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !int $actual
     */
    final public static function assertIsNotInt(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_INT)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type numeric.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !numeric $actual
     */
    public static function assertIsNotNumeric($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !numeric $actual
     */
    final public static function assertIsNotNumeric(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_NUMERIC)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type object.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !object $actual
     */
    public static function assertIsNotObject($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !object $actual
     */
    final public static function assertIsNotObject(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_OBJECT)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type resource.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !resource $actual
     */
    public static function assertIsNotResource($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !resource $actual
     */
    final public static function assertIsNotResource(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_RESOURCE)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type resource.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !resource $actual
     */
    public static function assertIsNotClosedResource($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !resource $actual
     */
    final public static function assertIsNotClosedResource(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_CLOSED_RESOURCE)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !string $actual
     */
    public static function assertIsNotString($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !string $actual
     */
    final public static function assertIsNotString(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_STRING)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type scalar.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !scalar $actual
     */
    public static function assertIsNotScalar($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !scalar $actual
     */
    final public static function assertIsNotScalar(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_SCALAR)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type callable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !callable $actual
     */
    public static function assertIsNotCallable($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !callable $actual
     */
    final public static function assertIsNotCallable(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_CALLABLE)),
            $message,
        );
    }

    /**
     * Asserts that a variable is not of type iterable.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !iterable $actual
     */
    public static function assertIsNotIterable($actual, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @phpstan-assert !iterable<mixed> $actual
     */
    final public static function assertIsNotIterable(mixed $actual, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_ITERABLE)),
            $message,
        );
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertMatchesRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat($string, new RegularExpression($pattern), $message);
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4086
     */
    public static function assertRegExp(string $pattern, string $string, string $message = ''): void
    {
        self::createWarning('assertRegExp() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertMatchesRegularExpression() instead.');

        static::assertThat($string, new RegularExpression($pattern), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertMatchesRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        self::assertThat($string, new RegularExpression($pattern), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDoesNotMatchRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat(
            $string,
            new LogicalNot(
                new RegularExpression($pattern),
            ),
            $message,
        );
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4089
     */
    public static function assertNotRegExp(string $pattern, string $string, string $message = ''): void
    {
        self::createWarning('assertNotRegExp() is deprecated and will be removed in PHPUnit 10. Refactor your code to use assertDoesNotMatchRegularExpression() instead.');

        static::assertThat(
=======
     * @throws ExpectationFailedException
     */
    final public static function assertDoesNotMatchRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $string,
            new LogicalNot(
                new RegularExpression($pattern),
            ),
            $message,
        );
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is the same.
     *
<<<<<<< HEAD
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertSameSize($expected, $actual, string $message = ''): void
    {
        if ($expected instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $expected parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        if ($actual instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $actual parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        if (!$expected instanceof Countable && !is_iterable($expected)) {
            throw InvalidArgumentException::create(1, 'countable or iterable');
        }

        if (!$actual instanceof Countable && !is_iterable($actual)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        static::assertThat(
=======
     * @param Countable|iterable<mixed> $expected
     * @param Countable|iterable<mixed> $actual
     *
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws GeneratorNotSupportedException
     */
    final public static function assertSameSize(Countable|iterable $expected, Countable|iterable $actual, string $message = ''): void
    {
        if ($expected instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$expected');
        }

        if ($actual instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$actual');
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new SameSize($expected),
            $message,
        );
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is not the same.
     *
<<<<<<< HEAD
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertNotSameSize($expected, $actual, string $message = ''): void
    {
        if ($expected instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $expected parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        if ($actual instanceof Generator) {
            self::createWarning('Passing an argument of type Generator for the $actual parameter is deprecated. Support for this will be removed in PHPUnit 10.');
        }

        if (!$expected instanceof Countable && !is_iterable($expected)) {
            throw InvalidArgumentException::create(1, 'countable or iterable');
        }

        if (!$actual instanceof Countable && !is_iterable($actual)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        static::assertThat(
=======
     * @param Countable|iterable<mixed> $expected
     * @param Countable|iterable<mixed> $actual
     *
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws GeneratorNotSupportedException
     */
    final public static function assertNotSameSize(Countable|iterable $expected, Countable|iterable $actual, string $message = ''): void
    {
        if ($expected instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$expected');
        }

        if ($actual instanceof Generator) {
            throw GeneratorNotSupportedException::fromParameterName('$actual');
        }

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actual,
            new LogicalNot(
                new SameSize($expected),
            ),
            $message,
        );
    }

    /**
<<<<<<< HEAD
     * Asserts that a string matches a given format string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringMatchesFormat(string $format, string $string, string $message = ''): void
    {
        static::assertThat($string, new StringMatchesFormatDescription($format), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringContainsStringIgnoringLineEndings(string $needle, string $haystack, string $message = ''): void
    {
        self::assertThat($haystack, new StringContains($needle, false, true), $message);
    }

    /**
     * Asserts that two strings are equal except for line endings.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertStringEqualsStringIgnoringLineEndings(string $expected, string $actual, string $message = ''): void
    {
        self::assertThat($actual, new StringEqualsStringIgnoringLineEndings($expected), $message);
    }

    /**
     * Asserts that a string matches a given format string.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertFileMatchesFormat(string $format, string $actualFile, string $message = ''): void
    {
        self::assertFileExists($actualFile, $message);

        self::assertThat(
            file_get_contents($actualFile),
            new StringMatchesFormatDescription($format),
            $message,
        );
    }

    /**
     * Asserts that a string matches a given format string.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertFileMatchesFormatFile(string $formatFile, string $actualFile, string $message = ''): void
    {
        self::assertFileExists($formatFile, $message);
        self::assertFileExists($actualFile, $message);

        $formatDescription = file_get_contents($formatFile);

        self::assertIsString($formatDescription);

        self::assertThat(
            file_get_contents($actualFile),
            new StringMatchesFormatDescription($formatDescription),
            $message,
        );
    }

    /**
     * Asserts that a string matches a given format string.
     *
     * @throws ExpectationFailedException
     */
    final public static function assertStringMatchesFormat(string $format, string $string, string $message = ''): void
    {
        self::assertThat($string, new StringMatchesFormatDescription($format), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a string does not match a given format string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotMatchesFormat(string $format, string $string, string $message = ''): void
    {
        static::assertThat(
=======
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5472
     */
    final public static function assertStringNotMatchesFormat(string $format, string $string, string $message = ''): void
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            null,
            'assertStringNotMatchesFormat() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $string,
            new LogicalNot(
                new StringMatchesFormatDescription($format),
            ),
            $message,
        );
    }

    /**
     * Asserts that a string matches a given format file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        static::assertFileExists($formatFile, $message);

        static::assertThat(
            $string,
            new StringMatchesFormatDescription(
                file_get_contents($formatFile),
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        self::assertFileExists($formatFile, $message);

        $formatDescription = file_get_contents($formatFile);

        self::assertIsString($formatDescription);

        self::assertThat(
            $string,
            new StringMatchesFormatDescription(
                $formatDescription,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            ),
            $message,
        );
    }

    /**
     * Asserts that a string does not match a given format string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        static::assertFileExists($formatFile, $message);

        static::assertThat(
            $string,
            new LogicalNot(
                new StringMatchesFormatDescription(
                    file_get_contents($formatFile),
=======
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/5472
     */
    final public static function assertStringNotMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        Event\Facade::emitter()->testTriggeredPhpunitDeprecation(
            null,
            'assertStringNotMatchesFormatFile() is deprecated and will be removed in PHPUnit 12 without replacement.',
        );

        self::assertFileExists($formatFile, $message);

        $formatDescription = file_get_contents($formatFile);

        self::assertIsString($formatDescription);

        self::assertThat(
            $string,
            new LogicalNot(
                new StringMatchesFormatDescription(
                    $formatDescription,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                ),
            ),
            $message,
        );
    }

    /**
     * Asserts that a string starts with a given prefix.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringStartsWith(string $prefix, string $string, string $message = ''): void
    {
        static::assertThat($string, new StringStartsWith($prefix), $message);
=======
     * @param non-empty-string $prefix
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    final public static function assertStringStartsWith(string $prefix, string $string, string $message = ''): void
    {
        self::assertThat($string, new StringStartsWith($prefix), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a string starts not with a given prefix.
     *
<<<<<<< HEAD
     * @param string $prefix
     * @param string $string
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringStartsNotWith($prefix, $string, string $message = ''): void
    {
        static::assertThat(
=======
     * @param non-empty-string $prefix
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    final public static function assertStringStartsNotWith(string $prefix, string $string, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $string,
            new LogicalNot(
                new StringStartsWith($prefix),
            ),
            $message,
        );
    }

    /**
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new StringContains($needle, false);

        static::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new StringContains($needle, true);

        static::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new StringContains($needle));

        static::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new StringContains($needle, true));

        static::assertThat($haystack, $constraint, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new StringContains($needle);

        self::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws ExpectationFailedException
     */
    final public static function assertStringContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new StringContains($needle, true);

        self::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws ExpectationFailedException
     */
    final public static function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new StringContains($needle));

        self::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws ExpectationFailedException
     */
    final public static function assertStringNotContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new StringContains($needle, true));

        self::assertThat($haystack, $constraint, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a string ends with a given suffix.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEndsWith(string $suffix, string $string, string $message = ''): void
    {
        static::assertThat($string, new StringEndsWith($suffix), $message);
=======
     * @param non-empty-string $suffix
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    final public static function assertStringEndsWith(string $suffix, string $string, string $message = ''): void
    {
        self::assertThat($string, new StringEndsWith($suffix), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that a string ends not with a given suffix.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEndsNotWith(string $suffix, string $string, string $message = ''): void
    {
        static::assertThat(
=======
     * @param non-empty-string $suffix
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    final public static function assertStringEndsNotWith(string $suffix, string $string, string $message = ''): void
    {
        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $string,
            new LogicalNot(
                new StringEndsWith($suffix),
            ),
            $message,
        );
    }

    /**
     * Asserts that two XML files are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
=======
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws XmlException
     */
    final public static function assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $expected = (new XmlLoader)->loadFile($expectedFile);
        $actual   = (new XmlLoader)->loadFile($actualFile);

<<<<<<< HEAD
        static::assertEquals($expected, $actual, $message);
=======
        self::assertEquals($expected, $actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two XML files are not equal.
     *
     * @throws \PHPUnit\Util\Exception
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertXmlFileNotEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertXmlFileNotEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $expected = (new XmlLoader)->loadFile($expectedFile);
        $actual   = (new XmlLoader)->loadFile($actualFile);

<<<<<<< HEAD
        static::assertNotEquals($expected, $actual, $message);
=======
        self::assertNotEquals($expected, $actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two XML documents are equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     * @throws Xml\Exception
     */
    public static function assertXmlStringEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
    {
        if (!is_string($actualXml)) {
            self::createWarning('Passing an argument of type DOMDocument for the $actualXml parameter is deprecated. Support for this will be removed in PHPUnit 10.');

            $actual = $actualXml;
        } else {
            $actual = (new XmlLoader)->load($actualXml);
        }

        $expected = (new XmlLoader)->loadFile($expectedFile);

        static::assertEquals($expected, $actual, $message);
=======
     * @throws ExpectationFailedException
     * @throws XmlException
     */
    final public static function assertXmlStringEqualsXmlFile(string $expectedFile, string $actualXml, string $message = ''): void
    {
        $expected = (new XmlLoader)->loadFile($expectedFile);
        $actual   = (new XmlLoader)->load($actualXml);

        self::assertEquals($expected, $actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two XML documents are not equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     * @throws Xml\Exception
     */
    public static function assertXmlStringNotEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
    {
        if (!is_string($actualXml)) {
            self::createWarning('Passing an argument of type DOMDocument for the $actualXml parameter is deprecated. Support for this will be removed in PHPUnit 10.');

            $actual = $actualXml;
        } else {
            $actual = (new XmlLoader)->load($actualXml);
        }

        $expected = (new XmlLoader)->loadFile($expectedFile);

        static::assertNotEquals($expected, $actual, $message);
=======
     * @throws ExpectationFailedException
     * @throws XmlException
     */
    final public static function assertXmlStringNotEqualsXmlFile(string $expectedFile, string $actualXml, string $message = ''): void
    {
        $expected = (new XmlLoader)->loadFile($expectedFile);
        $actual   = (new XmlLoader)->load($actualXml);

        self::assertNotEquals($expected, $actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two XML documents are equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     * @throws Xml\Exception
     */
    public static function assertXmlStringEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
    {
        if (!is_string($expectedXml)) {
            self::createWarning('Passing an argument of type DOMDocument for the $expectedXml parameter is deprecated. Support for this will be removed in PHPUnit 10.');

            $expected = $expectedXml;
        } else {
            $expected = (new XmlLoader)->load($expectedXml);
        }

        if (!is_string($actualXml)) {
            self::createWarning('Passing an argument of type DOMDocument for the $actualXml parameter is deprecated. Support for this will be removed in PHPUnit 10.');

            $actual = $actualXml;
        } else {
            $actual = (new XmlLoader)->load($actualXml);
        }

        static::assertEquals($expected, $actual, $message);
=======
     * @throws ExpectationFailedException
     * @throws XmlException
     */
    final public static function assertXmlStringEqualsXmlString(string $expectedXml, string $actualXml, string $message = ''): void
    {
        $expected = (new XmlLoader)->load($expectedXml);
        $actual   = (new XmlLoader)->load($actualXml);

        self::assertEquals($expected, $actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two XML documents are not equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     * @throws Xml\Exception
     */
    public static function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
    {
        if (!is_string($expectedXml)) {
            self::createWarning('Passing an argument of type DOMDocument for the $expectedXml parameter is deprecated. Support for this will be removed in PHPUnit 10.');

            $expected = $expectedXml;
        } else {
            $expected = (new XmlLoader)->load($expectedXml);
        }

        if (!is_string($actualXml)) {
            self::createWarning('Passing an argument of type DOMDocument for the $actualXml parameter is deprecated. Support for this will be removed in PHPUnit 10.');

            $actual = $actualXml;
        } else {
            $actual = (new XmlLoader)->load($actualXml);
        }

        static::assertNotEquals($expected, $actual, $message);
    }

    /**
     * Asserts that a hierarchy of DOMElements matches.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws AssertionFailedError
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4091
     */
    public static function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, bool $checkAttributes = false, string $message = ''): void
    {
        self::createWarning('assertEqualXMLStructure() is deprecated and will be removed in PHPUnit 10.');

        $expectedElement = Xml::import($expectedElement);
        $actualElement   = Xml::import($actualElement);

        static::assertSame(
            $expectedElement->tagName,
            $actualElement->tagName,
            $message,
        );

        if ($checkAttributes) {
            static::assertSame(
                $expectedElement->attributes->length,
                $actualElement->attributes->length,
                sprintf(
                    '%s%sNumber of attributes on node "%s" does not match',
                    $message,
                    !empty($message) ? "\n" : '',
                    $expectedElement->tagName,
                ),
            );

            for ($i = 0; $i < $expectedElement->attributes->length; $i++) {
                $expectedAttribute = $expectedElement->attributes->item($i);
                $actualAttribute   = $actualElement->attributes->getNamedItem($expectedAttribute->name);

                assert($expectedAttribute instanceof DOMAttr);

                if (!$actualAttribute) {
                    static::fail(
                        sprintf(
                            '%s%sCould not find attribute "%s" on node "%s"',
                            $message,
                            !empty($message) ? "\n" : '',
                            $expectedAttribute->name,
                            $expectedElement->tagName,
                        ),
                    );
                }
            }
        }

        Xml::removeCharacterDataNodes($expectedElement);
        Xml::removeCharacterDataNodes($actualElement);

        static::assertSame(
            $expectedElement->childNodes->length,
            $actualElement->childNodes->length,
            sprintf(
                '%s%sNumber of child nodes of "%s" differs',
                $message,
                !empty($message) ? "\n" : '',
                $expectedElement->tagName,
            ),
        );

        for ($i = 0; $i < $expectedElement->childNodes->length; $i++) {
            static::assertEqualXMLStructure(
                $expectedElement->childNodes->item($i),
                $actualElement->childNodes->item($i),
                $checkAttributes,
                $message,
            );
        }
=======
     * @throws ExpectationFailedException
     * @throws XmlException
     */
    final public static function assertXmlStringNotEqualsXmlString(string $expectedXml, string $actualXml, string $message = ''): void
    {
        $expected = (new XmlLoader)->load($expectedXml);
        $actual   = (new XmlLoader)->load($actualXml);

        self::assertNotEquals($expected, $actual, $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Evaluates a PHPUnit\Framework\Constraint matcher object.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertThat($value, Constraint $constraint, string $message = ''): void
=======
     * @throws ExpectationFailedException
     */
    final public static function assertThat(mixed $value, Constraint $constraint, string $message = ''): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::$count += count($constraint);

        $constraint->evaluate($value, $message);
    }

    /**
     * Asserts that a string is a valid JSON string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJson(string $actualJson, string $message = ''): void
    {
        static::assertThat($actualJson, static::isJson(), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJson(string $actual, string $message = ''): void
    {
        self::assertThat($actual, self::isJson(), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringEqualsJsonString(string $expectedJson, string $actualJson, string $message = ''): void
    {
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat($actualJson, new JsonMatches($expectedJson), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJsonStringEqualsJsonString(string $expectedJson, string $actualJson, string $message = ''): void
    {
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        self::assertThat($actualJson, new JsonMatches($expectedJson), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are not equal.
     *
<<<<<<< HEAD
     * @param string $expectedJson
     * @param string $actualJson
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, string $message = ''): void
    {
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat(
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJsonStringNotEqualsJsonString(string $expectedJson, string $actualJson, string $message = ''): void
    {
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actualJson,
            new LogicalNot(
                new JsonMatches($expectedJson),
            ),
            $message,
        );
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat($actualJson, new JsonMatches($expectedJson), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJsonStringEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $expectedJson = file_get_contents($expectedFile);

        self::assertIsString($expectedJson);
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        self::assertThat($actualJson, new JsonMatches($expectedJson), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are not equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringNotEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat(
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJsonStringNotEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $expectedJson = file_get_contents($expectedFile);

        self::assertIsString($expectedJson);
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        self::assertThat(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $actualJson,
            new LogicalNot(
                new JsonMatches($expectedJson),
            ),
            $message,
        );
    }

    /**
     * Asserts that two JSON files are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonFileEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        static::assertFileExists($actualFile, $message);

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraintExpected = new JsonMatches(
            $expectedJson,
        );

        $constraintActual = new JsonMatches($actualJson);

        static::assertThat($expectedJson, $constraintActual, $message);
        static::assertThat($actualJson, $constraintExpected, $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJsonFileEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $expectedJson = file_get_contents($expectedFile);

        self::assertIsString($expectedJson);
        self::assertJson($expectedJson, $message);

        self::assertFileExists($actualFile, $message);

        $actualJson = file_get_contents($actualFile);

        self::assertIsString($actualJson);
        self::assertJson($actualJson, $message);

        self::assertThat($actualJson, new JsonMatches($expectedJson), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Asserts that two JSON files are not equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonFileNotEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        static::assertFileExists($actualFile, $message);

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraintExpected = new JsonMatches(
            $expectedJson,
        );

        $constraintActual = new JsonMatches($actualJson);

        static::assertThat($expectedJson, new LogicalNot($constraintActual), $message);
        static::assertThat($actualJson, new LogicalNot($constraintExpected), $message);
=======
     * @throws ExpectationFailedException
     */
    final public static function assertJsonFileNotEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        self::assertFileExists($expectedFile, $message);

        $expectedJson = file_get_contents($expectedFile);

        self::assertIsString($expectedJson);
        self::assertJson($expectedJson, $message);

        self::assertFileExists($actualFile, $message);

        $actualJson = file_get_contents($actualFile);

        self::assertIsString($actualJson);
        self::assertJson($actualJson, $message);

        self::assertThat($actualJson, self::logicalNot(new JsonMatches($expectedJson)), $message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * @throws Exception
     */
<<<<<<< HEAD
    public static function logicalAnd(): LogicalAnd
    {
        $constraints = func_get_args();

        $constraint = new LogicalAnd;
        $constraint->setConstraints($constraints);

        return $constraint;
    }

    public static function logicalOr(): LogicalOr
    {
        $constraints = func_get_args();

        $constraint = new LogicalOr;
        $constraint->setConstraints($constraints);

        return $constraint;
    }

    public static function logicalNot(Constraint $constraint): LogicalNot
=======
    final public static function logicalAnd(mixed ...$constraints): LogicalAnd
    {
        return LogicalAnd::fromConstraints(...$constraints);
    }

    final public static function logicalOr(mixed ...$constraints): LogicalOr
    {
        return LogicalOr::fromConstraints(...$constraints);
    }

    final public static function logicalNot(Constraint $constraint): LogicalNot
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new LogicalNot($constraint);
    }

<<<<<<< HEAD
    public static function logicalXor(): LogicalXor
    {
        $constraints = func_get_args();

        $constraint = new LogicalXor;
        $constraint->setConstraints($constraints);

        return $constraint;
    }

    public static function anything(): IsAnything
=======
    final public static function logicalXor(mixed ...$constraints): LogicalXor
    {
        return LogicalXor::fromConstraints(...$constraints);
    }

    final public static function anything(): IsAnything
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsAnything;
    }

<<<<<<< HEAD
    public static function isTrue(): IsTrue
=======
    final public static function isTrue(): IsTrue
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsTrue;
    }

    /**
<<<<<<< HEAD
     * @psalm-template CallbackInput of mixed
     *
     * @psalm-param callable(CallbackInput $callback): bool $callback
     *
     * @psalm-return Callback<CallbackInput>
     */
    public static function callback(callable $callback): Callback
=======
     * @template CallbackInput of mixed
     *
     * @param callable(CallbackInput $callback): bool $callback
     *
     * @return Callback<CallbackInput>
     */
    final public static function callback(callable $callback): Callback
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new Callback($callback);
    }

<<<<<<< HEAD
    public static function isFalse(): IsFalse
=======
    final public static function isFalse(): IsFalse
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsFalse;
    }

<<<<<<< HEAD
    public static function isJson(): IsJson
=======
    final public static function isJson(): IsJson
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsJson;
    }

<<<<<<< HEAD
    public static function isNull(): IsNull
=======
    final public static function isNull(): IsNull
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsNull;
    }

<<<<<<< HEAD
    public static function isFinite(): IsFinite
=======
    final public static function isFinite(): IsFinite
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsFinite;
    }

<<<<<<< HEAD
    public static function isInfinite(): IsInfinite
=======
    final public static function isInfinite(): IsInfinite
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsInfinite;
    }

<<<<<<< HEAD
    public static function isNan(): IsNan
=======
    final public static function isNan(): IsNan
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsNan;
    }

<<<<<<< HEAD
    public static function containsEqual($value): TraversableContainsEqual
=======
    final public static function containsEqual(mixed $value): TraversableContainsEqual
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new TraversableContainsEqual($value);
    }

<<<<<<< HEAD
    public static function containsIdentical($value): TraversableContainsIdentical
=======
    final public static function containsIdentical(mixed $value): TraversableContainsIdentical
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new TraversableContainsIdentical($value);
    }

<<<<<<< HEAD
    public static function containsOnly(string $type): TraversableContainsOnly
=======
    /**
     * @param 'array'|'bool'|'boolean'|'callable'|'double'|'float'|'int'|'integer'|'iterable'|'null'|'numeric'|'object'|'real'|'resource (closed)'|'resource'|'scalar'|'string' $type
     *
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/6055
     */
    final public static function containsOnly(string $type): TraversableContainsOnly
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new TraversableContainsOnly($type);
    }

<<<<<<< HEAD
    public static function containsOnlyInstancesOf(string $className): TraversableContainsOnly
=======
    final public static function containsOnlyArray(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Array->value);
    }

    final public static function containsOnlyBool(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Bool->value);
    }

    final public static function containsOnlyCallable(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Callable->value);
    }

    final public static function containsOnlyFloat(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Float->value);
    }

    final public static function containsOnlyInt(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Int->value);
    }

    final public static function containsOnlyIterable(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Iterable->value);
    }

    final public static function containsOnlyNull(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Null->value);
    }

    final public static function containsOnlyNumeric(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Numeric->value);
    }

    final public static function containsOnlyObject(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Object->value);
    }

    final public static function containsOnlyResource(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Resource->value);
    }

    final public static function containsOnlyClosedResource(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::ClosedResource->value);
    }

    final public static function containsOnlyScalar(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::Scalar->value);
    }

    final public static function containsOnlyString(): TraversableContainsOnly
    {
        return new TraversableContainsOnly(NativeType::String->value);
    }

    /**
     * @param class-string $className
     *
     * @throws Exception
     */
    final public static function containsOnlyInstancesOf(string $className): TraversableContainsOnly
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new TraversableContainsOnly($className, false);
    }

<<<<<<< HEAD
    /**
     * @param int|string $key
     */
    public static function arrayHasKey($key): ArrayHasKey
=======
    final public static function arrayHasKey(mixed $key): ArrayHasKey
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new ArrayHasKey($key);
    }

<<<<<<< HEAD
    public static function equalTo($value): IsEqual
    {
        return new IsEqual($value, 0.0, false, false);
    }

    public static function equalToCanonicalizing($value): IsEqualCanonicalizing
=======
    final public static function isList(): IsList
    {
        return new IsList;
    }

    final public static function equalTo(mixed $value): IsEqual
    {
        return new IsEqual($value);
    }

    final public static function equalToCanonicalizing(mixed $value): IsEqualCanonicalizing
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsEqualCanonicalizing($value);
    }

<<<<<<< HEAD
    public static function equalToIgnoringCase($value): IsEqualIgnoringCase
=======
    final public static function equalToIgnoringCase(mixed $value): IsEqualIgnoringCase
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsEqualIgnoringCase($value);
    }

<<<<<<< HEAD
    public static function equalToWithDelta($value, float $delta): IsEqualWithDelta
=======
    final public static function equalToWithDelta(mixed $value, float $delta): IsEqualWithDelta
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsEqualWithDelta($value, $delta);
    }

<<<<<<< HEAD
    public static function isEmpty(): IsEmpty
=======
    final public static function isEmpty(): IsEmpty
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsEmpty;
    }

<<<<<<< HEAD
    public static function isWritable(): IsWritable
=======
    final public static function isWritable(): IsWritable
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsWritable;
    }

<<<<<<< HEAD
    public static function isReadable(): IsReadable
=======
    final public static function isReadable(): IsReadable
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsReadable;
    }

<<<<<<< HEAD
    public static function directoryExists(): DirectoryExists
=======
    final public static function directoryExists(): DirectoryExists
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new DirectoryExists;
    }

<<<<<<< HEAD
    public static function fileExists(): FileExists
=======
    final public static function fileExists(): FileExists
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new FileExists;
    }

<<<<<<< HEAD
    public static function greaterThan($value): GreaterThan
=======
    final public static function greaterThan(mixed $value): GreaterThan
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new GreaterThan($value);
    }

<<<<<<< HEAD
    public static function greaterThanOrEqual($value): LogicalOr
    {
        return static::logicalOr(
=======
    final public static function greaterThanOrEqual(mixed $value): LogicalOr
    {
        return self::logicalOr(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            new IsEqual($value),
            new GreaterThan($value),
        );
    }

<<<<<<< HEAD
    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function classHasAttribute(string $attributeName): ClassHasAttribute
    {
        self::createWarning('classHasAttribute() is deprecated and will be removed in PHPUnit 10.');

        return new ClassHasAttribute($attributeName);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function classHasStaticAttribute(string $attributeName): ClassHasStaticAttribute
    {
        self::createWarning('classHasStaticAttribute() is deprecated and will be removed in PHPUnit 10.');

        return new ClassHasStaticAttribute($attributeName);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/4601
     */
    public static function objectHasAttribute($attributeName): ObjectHasAttribute
    {
        self::createWarning('objectHasAttribute() is deprecated and will be removed in PHPUnit 10.');

        return new ObjectHasAttribute($attributeName);
    }

    public static function identicalTo($value): IsIdentical
=======
    final public static function identicalTo(mixed $value): IsIdentical
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsIdentical($value);
    }

<<<<<<< HEAD
    public static function isInstanceOf(string $className): IsInstanceOf
=======
    /**
     * @throws UnknownClassOrInterfaceException
     */
    final public static function isInstanceOf(string $className): IsInstanceOf
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsInstanceOf($className);
    }

<<<<<<< HEAD
    public static function isType(string $type): IsType
=======
    final public static function isArray(): IsType
    {
        return new IsType(NativeType::Array->value);
    }

    final public static function isBool(): IsType
    {
        return new IsType(NativeType::Bool->value);
    }

    final public static function isCallable(): IsType
    {
        return new IsType(NativeType::Callable->value);
    }

    final public static function isFloat(): IsType
    {
        return new IsType(NativeType::Float->value);
    }

    final public static function isInt(): IsType
    {
        return new IsType(NativeType::Int->value);
    }

    final public static function isIterable(): IsType
    {
        return new IsType(NativeType::Iterable->value);
    }

    final public static function isNumeric(): IsType
    {
        return new IsType(NativeType::Numeric->value);
    }

    final public static function isObject(): IsType
    {
        return new IsType(NativeType::Object->value);
    }

    final public static function isResource(): IsType
    {
        return new IsType(NativeType::Resource->value);
    }

    final public static function isClosedResource(): IsType
    {
        return new IsType(NativeType::ClosedResource->value);
    }

    final public static function isScalar(): IsType
    {
        return new IsType(NativeType::Scalar->value);
    }

    final public static function isString(): IsType
    {
        return new IsType(NativeType::String->value);
    }

    /**
     * @param 'array'|'bool'|'boolean'|'callable'|'double'|'float'|'int'|'integer'|'iterable'|'null'|'numeric'|'object'|'real'|'resource (closed)'|'resource'|'scalar'|'string' $type
     *
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/6052
     */
    final public static function isType(string $type): IsType
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new IsType($type);
    }

<<<<<<< HEAD
    public static function lessThan($value): LessThan
=======
    final public static function lessThan(mixed $value): LessThan
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new LessThan($value);
    }

<<<<<<< HEAD
    public static function lessThanOrEqual($value): LogicalOr
    {
        return static::logicalOr(
=======
    final public static function lessThanOrEqual(mixed $value): LogicalOr
    {
        return self::logicalOr(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            new IsEqual($value),
            new LessThan($value),
        );
    }

<<<<<<< HEAD
    public static function matchesRegularExpression(string $pattern): RegularExpression
=======
    final public static function matchesRegularExpression(string $pattern): RegularExpression
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new RegularExpression($pattern);
    }

<<<<<<< HEAD
    public static function matches(string $string): StringMatchesFormatDescription
=======
    final public static function matches(string $string): StringMatchesFormatDescription
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new StringMatchesFormatDescription($string);
    }

<<<<<<< HEAD
    public static function stringStartsWith($prefix): StringStartsWith
=======
    /**
     * @param non-empty-string $prefix
     *
     * @throws InvalidArgumentException
     */
    final public static function stringStartsWith(string $prefix): StringStartsWith
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new StringStartsWith($prefix);
    }

<<<<<<< HEAD
    public static function stringContains(string $string, bool $case = true): StringContains
=======
    final public static function stringContains(string $string, bool $case = true): StringContains
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new StringContains($string, $case);
    }

<<<<<<< HEAD
    public static function stringEndsWith(string $suffix): StringEndsWith
=======
    /**
     * @param non-empty-string $suffix
     *
     * @throws InvalidArgumentException
     */
    final public static function stringEndsWith(string $suffix): StringEndsWith
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new StringEndsWith($suffix);
    }

<<<<<<< HEAD
    public static function countOf(int $count): Count
=======
    final public static function stringEqualsStringIgnoringLineEndings(string $string): StringEqualsStringIgnoringLineEndings
    {
        return new StringEqualsStringIgnoringLineEndings($string);
    }

    final public static function countOf(int $count): Count
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new Count($count);
    }

<<<<<<< HEAD
    public static function objectEquals(object $object, string $method = 'equals'): ObjectEquals
=======
    final public static function objectEquals(object $object, string $method = 'equals'): ObjectEquals
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return new ObjectEquals($object, $method);
    }

    /**
     * Fails a test with the given message.
     *
     * @throws AssertionFailedError
<<<<<<< HEAD
     *
     * @psalm-return never-return
     */
    public static function fail(string $message = ''): void
=======
     */
    final public static function fail(string $message = ''): never
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::$count++;

        throw new AssertionFailedError($message);
    }

    /**
     * Mark the test as incomplete.
     *
     * @throws IncompleteTestError
<<<<<<< HEAD
     *
     * @psalm-return never-return
     */
    public static function markTestIncomplete(string $message = ''): void
=======
     */
    final public static function markTestIncomplete(string $message = ''): never
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        throw new IncompleteTestError($message);
    }

    /**
     * Mark the test as skipped.
     *
<<<<<<< HEAD
     * @throws SkippedTestError
     * @throws SyntheticSkippedError
     *
     * @psalm-return never-return
     */
    public static function markTestSkipped(string $message = ''): void
    {
        if ($hint = self::detectLocationHint($message)) {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            array_unshift($trace, $hint);

            throw new SyntheticSkippedError($hint['message'], 0, $hint['file'], (int) $hint['line'], $trace);
        }

        throw new SkippedTestError($message);
=======
     * @throws SkippedWithMessageException
     */
    final public static function markTestSkipped(string $message = ''): never
    {
        throw new SkippedWithMessageException($message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Return the current assertion count.
     */
<<<<<<< HEAD
    public static function getCount(): int
=======
    final public static function getCount(): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return self::$count;
    }

    /**
     * Reset the assertion counter.
     */
<<<<<<< HEAD
    public static function resetCount(): void
=======
    final public static function resetCount(): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        self::$count = 0;
    }

<<<<<<< HEAD
    private static function detectLocationHint(string $message): ?array
    {
        $hint  = null;
        $lines = preg_split('/\r\n|\r|\n/', $message);

        while (strpos($lines[0], '__OFFSET') !== false) {
            $offset = explode('=', array_shift($lines));

            if ($offset[0] === '__OFFSET_FILE') {
                $hint['file'] = $offset[1];
            }

            if ($offset[0] === '__OFFSET_LINE') {
                $hint['line'] = $offset[1];
            }
        }

        if ($hint) {
            $hint['message'] = implode(PHP_EOL, $lines);
        }

        return $hint;
    }

    private static function isValidObjectAttributeName(string $attributeName): bool
    {
        return (bool) preg_match('/[^\x00-\x1f\x7f-\x9f]+/', $attributeName);
    }

    private static function isValidClassAttributeName(string $attributeName): bool
    {
        return (bool) preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName);
    }

    /**
     * @codeCoverageIgnore
     */
    private static function createWarning(string $warning): void
    {
        foreach (debug_backtrace() as $step) {
            if (isset($step['object']) && $step['object'] instanceof TestCase) {
                assert($step['object'] instanceof TestCase);

                $step['object']->addWarning($warning);

                break;
            }
        }
=======
    private static function isNativeType(string $type): bool
    {
        return match ($type) {
            'numeric', 'integer', 'int', 'iterable', 'float', 'string', 'boolean', 'bool', 'null', 'array', 'object', 'resource', 'scalar' => true,
            default => false,
        };
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
