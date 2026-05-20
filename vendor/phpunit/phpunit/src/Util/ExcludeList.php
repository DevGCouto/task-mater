<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

<<<<<<< HEAD
use const DIRECTORY_SEPARATOR;
=======
use const PHP_OS_FAMILY;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function class_exists;
use function defined;
use function dirname;
use function is_dir;
use function realpath;
<<<<<<< HEAD
use function sprintf;
use function strpos;
use function sys_get_temp_dir;
use Composer\Autoload\ClassLoader;
use DeepCopy\DeepCopy;
use Doctrine\Instantiator\Instantiator;
=======
use function str_starts_with;
use function sys_get_temp_dir;
use Composer\Autoload\ClassLoader;
use DeepCopy\DeepCopy;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PharIo\Manifest\Manifest;
use PharIo\Version\Version as PharIoVersion;
use PhpParser\Parser;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SebastianBergmann\CliParser\Parser as CliParser;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeUnit\CodeUnit;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Complexity\Calculator;
use SebastianBergmann\Diff\Diff;
use SebastianBergmann\Environment\Runtime;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\Invoker\Invoker;
use SebastianBergmann\LinesOfCode\Counter;
use SebastianBergmann\ObjectEnumerator\Enumerator;
use SebastianBergmann\ObjectReflector\ObjectReflector;
use SebastianBergmann\RecursionContext\Context;
<<<<<<< HEAD
use SebastianBergmann\ResourceOperations\ResourceOperations;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\Template\Template;
use SebastianBergmann\Timer\Timer;
use SebastianBergmann\Type\TypeName;
use SebastianBergmann\Version;
<<<<<<< HEAD
=======
use staabm\SideEffectsDetector\SideEffectsDetector;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use TheSeer\Tokenizer\Tokenizer;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class ExcludeList
{
    /**
     * @var array<string,int>
     */
    private const EXCLUDED_CLASS_NAMES = [
        // composer
        ClassLoader::class => 1,

<<<<<<< HEAD
        // doctrine/instantiator
        Instantiator::class => 1,

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        // myclabs/deepcopy
        DeepCopy::class => 1,

        // nikic/php-parser
        Parser::class => 1,

        // phar-io/manifest
        Manifest::class => 1,

        // phar-io/version
        PharIoVersion::class => 1,

<<<<<<< HEAD
        // phpdocumentor/type-resolver
        Type::class => 1,

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        // phpunit/phpunit
        TestCase::class => 2,

        // phpunit/php-code-coverage
        CodeCoverage::class => 1,

        // phpunit/php-file-iterator
        FileIteratorFacade::class => 1,

        // phpunit/php-invoker
        Invoker::class => 1,

        // phpunit/php-text-template
        Template::class => 1,

        // phpunit/php-timer
        Timer::class => 1,

        // sebastian/cli-parser
        CliParser::class => 1,

        // sebastian/code-unit
        CodeUnit::class => 1,

        // sebastian/code-unit-reverse-lookup
        Wizard::class => 1,

        // sebastian/comparator
        Comparator::class => 1,

        // sebastian/complexity
        Calculator::class => 1,

        // sebastian/diff
        Diff::class => 1,

        // sebastian/environment
        Runtime::class => 1,

        // sebastian/exporter
        Exporter::class => 1,

        // sebastian/global-state
        Snapshot::class => 1,

        // sebastian/lines-of-code
        Counter::class => 1,

        // sebastian/object-enumerator
        Enumerator::class => 1,

        // sebastian/object-reflector
        ObjectReflector::class => 1,

        // sebastian/recursion-context
        Context::class => 1,

<<<<<<< HEAD
        // sebastian/resource-operations
        ResourceOperations::class => 1,

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        // sebastian/type
        TypeName::class => 1,

        // sebastian/version
        Version::class => 1,

<<<<<<< HEAD
=======
        // staabm/side-effects-detector
        SideEffectsDetector::class => 1,

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        // theseer/tokenizer
        Tokenizer::class => 1,
    ];

    /**
<<<<<<< HEAD
     * @var string[]
     */
    private static $directories = [];

    /**
     * @var bool
     */
    private static $initialized = false;

    public static function addDirectory(string $directory): void
    {
        if (!is_dir($directory)) {
            throw new Exception(
                sprintf(
                    '"%s" is not a directory',
                    $directory,
                ),
            );
=======
     * @var list<string>
     */
    private static array $directories = [];
    private static bool $initialized  = false;
    private readonly bool $enabled;

    /**
     * @param non-empty-string $directory
     *
     * @throws InvalidDirectoryException
     */
    public static function addDirectory(string $directory): void
    {
        if (!is_dir($directory)) {
            throw new InvalidDirectoryException($directory);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        self::$directories[] = realpath($directory);
    }

<<<<<<< HEAD
    /**
     * @throws Exception
     *
     * @return string[]
     */
    public function getExcludedDirectories(): array
    {
        $this->initialize();
=======
    public function __construct(?bool $enabled = null)
    {
        if ($enabled === null) {
            $enabled = !defined('PHPUNIT_TESTSUITE');
        }

        $this->enabled = $enabled;
    }

    /**
     * @return list<string>
     */
    public function getExcludedDirectories(): array
    {
        self::initialize();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        return self::$directories;
    }

<<<<<<< HEAD
    /**
     * @throws Exception
     */
    public function isExcluded(string $file): bool
    {
        if (defined('PHPUNIT_TESTSUITE')) {
            return false;
        }

        $this->initialize();

        foreach (self::$directories as $directory) {
            if (strpos($file, $directory) === 0) {
=======
    public function isExcluded(string $file): bool
    {
        if (!$this->enabled) {
            return false;
        }

        self::initialize();

        foreach (self::$directories as $directory) {
            if (str_starts_with($file, $directory)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                return true;
            }
        }

        return false;
    }

<<<<<<< HEAD
    /**
     * @throws Exception
     */
    private function initialize(): void
=======
    private static function initialize(): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (self::$initialized) {
            return;
        }

        foreach (self::EXCLUDED_CLASS_NAMES as $className => $parent) {
            if (!class_exists($className)) {
                continue;
            }

            $directory = (new ReflectionClass($className))->getFileName();

            for ($i = 0; $i < $parent; $i++) {
                $directory = dirname($directory);
            }

            self::$directories[] = $directory;
        }

<<<<<<< HEAD
        // Hide process isolation workaround on Windows.
        if (DIRECTORY_SEPARATOR === '\\') {
            // tempnam() prefix is limited to first 3 chars.
            // @see https://php.net/manual/en/function.tempnam.php
            self::$directories[] = sys_get_temp_dir() . '\\PHP';
=======
        /**
         * Hide process isolation workaround on Windows:
         * tempnam() prefix is limited to first 3 characters.
         *
         * @see https://php.net/manual/en/function.tempnam.php
         */
        if (PHP_OS_FAMILY === 'Windows') {
            // @codeCoverageIgnoreStart
            self::$directories[] = sys_get_temp_dir() . '\\PHP';
            // @codeCoverageIgnoreEnd
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        self::$initialized = true;
    }
}
