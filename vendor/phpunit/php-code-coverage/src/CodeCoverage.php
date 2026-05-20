<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage;

use function array_diff;
use function array_diff_key;
use function array_flip;
use function array_keys;
use function array_merge;
<<<<<<< HEAD
use function array_unique;
use function array_values;
use function count;
use function explode;
use function get_class;
use function is_array;
use function sort;
use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Test;
use ReflectionClass;
=======
use function array_merge_recursive;
use function array_unique;
use function count;
use function explode;
use function is_array;
use function is_file;
use function sort;
use ReflectionClass;
use SebastianBergmann\CodeCoverage\Data\ProcessedCodeCoverageData;
use SebastianBergmann\CodeCoverage\Data\RawCodeCoverageData;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Node\Builder;
use SebastianBergmann\CodeCoverage\Node\Directory;
use SebastianBergmann\CodeCoverage\StaticAnalysis\CachingFileAnalyser;
use SebastianBergmann\CodeCoverage\StaticAnalysis\FileAnalyser;
use SebastianBergmann\CodeCoverage\StaticAnalysis\ParsingFileAnalyser;
<<<<<<< HEAD
=======
use SebastianBergmann\CodeCoverage\Test\TestSize\TestSize;
use SebastianBergmann\CodeCoverage\Test\TestStatus\TestStatus;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

/**
 * Provides collection functionality for PHP code coverage information.
<<<<<<< HEAD
=======
 *
 * @phpstan-type TestType = array{
 *     size: string,
 *     status: string,
 * }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 */
final class CodeCoverage
{
    private const UNCOVERED_FILES = 'UNCOVERED_FILES';
<<<<<<< HEAD

    /**
     * @var Driver
     */
    private $driver;

    /**
     * @var Filter
     */
    private $filter;

    /**
     * @var Wizard
     */
    private $wizard;

    /**
     * @var bool
     */
    private $checkForUnintentionallyCoveredCode = false;

    /**
     * @var bool
     */
    private $includeUncoveredFiles = true;

    /**
     * @var bool
     */
    private $processUncoveredFiles = false;

    /**
     * @var bool
     */
    private $ignoreDeprecatedCode = false;

    /**
     * @var null|PhptTestCase|string|TestCase
     */
    private $currentId;

    /**
     * Code coverage data.
     *
     * @var ProcessedCodeCoverageData
     */
    private $data;

    /**
     * @var bool
     */
    private $useAnnotationsForIgnoringCode = true;

    /**
     * Test data.
     *
     * @var array
     */
    private $tests = [];

    /**
     * @psalm-var list<class-string>
     */
    private $parentClassesExcludedFromUnintentionallyCoveredCodeCheck = [];

    /**
     * @var ?FileAnalyser
     */
    private $analyser;

    /**
     * @var ?string
     */
    private $cacheDirectory;

    /**
     * @var ?Directory
     */
    private $cachedReport;
=======
    private readonly Driver $driver;
    private readonly Filter $filter;
    private readonly Wizard $wizard;
    private bool $checkForUnintentionallyCoveredCode = false;
    private bool $includeUncoveredFiles              = true;
    private bool $ignoreDeprecatedCode               = false;
    private ?string $currentId                       = null;
    private ?TestSize $currentSize                   = null;
    private ProcessedCodeCoverageData $data;
    private bool $useAnnotationsForIgnoringCode = true;

    /**
     * @var array<string,list<int>>
     */
    private array $linesToBeIgnored = [];

    /**
     * @var array<string, TestType>
     */
    private array $tests = [];

    /**
     * @var list<class-string>
     */
    private array $parentClassesExcludedFromUnintentionallyCoveredCodeCheck = [];
    private ?FileAnalyser $analyser                                         = null;
    private ?string $cacheDirectory                                         = null;
    private ?Directory $cachedReport                                        = null;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(Driver $driver, Filter $filter)
    {
        $this->driver = $driver;
        $this->filter = $filter;
        $this->data   = new ProcessedCodeCoverageData;
        $this->wizard = new Wizard;
    }

    /**
     * Returns the code coverage information as a graph of node objects.
     */
    public function getReport(): Directory
    {
        if ($this->cachedReport === null) {
            $this->cachedReport = (new Builder($this->analyser()))->build($this);
        }

        return $this->cachedReport;
    }

    /**
     * Clears collected code coverage data.
     */
    public function clear(): void
    {
        $this->currentId    = null;
<<<<<<< HEAD
=======
        $this->currentSize  = null;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->data         = new ProcessedCodeCoverageData;
        $this->tests        = [];
        $this->cachedReport = null;
    }

    /**
     * @internal
     */
    public function clearCache(): void
    {
        $this->cachedReport = null;
    }

    /**
     * Returns the filter object used.
     */
    public function filter(): Filter
    {
        return $this->filter;
    }

    /**
     * Returns the collected code coverage data.
     */
    public function getData(bool $raw = false): ProcessedCodeCoverageData
    {
        if (!$raw) {
<<<<<<< HEAD
            if ($this->processUncoveredFiles) {
                $this->processUncoveredFilesFromFilter();
            } elseif ($this->includeUncoveredFiles) {
=======
            if ($this->includeUncoveredFiles) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $this->addUncoveredFilesFromFilter();
            }
        }

        return $this->data;
    }

    /**
     * Sets the coverage data.
     */
    public function setData(ProcessedCodeCoverageData $data): void
    {
        $this->data = $data;
    }

    /**
<<<<<<< HEAD
     * Returns the test data.
=======
     * @return array<string, TestType>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function getTests(): array
    {
        return $this->tests;
    }

    /**
<<<<<<< HEAD
     * Sets the test data.
=======
     * @param array<string, TestType> $tests
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function setTests(array $tests): void
    {
        $this->tests = $tests;
    }

<<<<<<< HEAD
    /**
     * Start collection of code coverage information.
     *
     * @param PhptTestCase|string|TestCase $id
     */
    public function start($id, bool $clear = false): void
=======
    public function start(string $id, ?TestSize $size = null, bool $clear = false): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($clear) {
            $this->clear();
        }

<<<<<<< HEAD
        $this->currentId = $id;
=======
        $this->currentId   = $id;
        $this->currentSize = $size;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $this->driver->start();

        $this->cachedReport = null;
    }

    /**
<<<<<<< HEAD
     * Stop collection of code coverage information.
     *
     * @param array|false $linesToBeCovered
     */
    public function stop(bool $append = true, $linesToBeCovered = [], array $linesToBeUsed = []): RawCodeCoverageData
    {
        if (!is_array($linesToBeCovered) && $linesToBeCovered !== false) {
            throw new InvalidArgumentException(
                '$linesToBeCovered must be an array or false'
            );
        }

        $data = $this->driver->stop();
        $this->append($data, null, $append, $linesToBeCovered, $linesToBeUsed);

        $this->currentId    = null;
=======
     * @param array<string,list<int>> $linesToBeIgnored
     */
    public function stop(bool $append = true, ?TestStatus $status = null, array|false $linesToBeCovered = [], array $linesToBeUsed = [], array $linesToBeIgnored = []): RawCodeCoverageData
    {
        $data = $this->driver->stop();

        $this->linesToBeIgnored = array_merge_recursive(
            $this->linesToBeIgnored,
            $linesToBeIgnored,
        );

        $this->append($data, null, $append, $status, $linesToBeCovered, $linesToBeUsed, $linesToBeIgnored);

        $this->currentId    = null;
        $this->currentSize  = null;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->cachedReport = null;

        return $data;
    }

    /**
<<<<<<< HEAD
     * Appends code coverage data.
     *
     * @param PhptTestCase|string|TestCase $id
     * @param array|false                  $linesToBeCovered
=======
     * @param array<string,list<int>> $linesToBeIgnored
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     *
     * @throws ReflectionException
     * @throws TestIdMissingException
     * @throws UnintentionallyCoveredCodeException
     */
<<<<<<< HEAD
    public function append(RawCodeCoverageData $rawData, $id = null, bool $append = true, $linesToBeCovered = [], array $linesToBeUsed = []): void
=======
    public function append(RawCodeCoverageData $rawData, ?string $id = null, bool $append = true, ?TestStatus $status = null, array|false $linesToBeCovered = [], array $linesToBeUsed = [], array $linesToBeIgnored = []): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($id === null) {
            $id = $this->currentId;
        }

        if ($id === null) {
            throw new TestIdMissingException;
        }

        $this->cachedReport = null;

<<<<<<< HEAD
=======
        if ($status === null) {
            $status = TestStatus::unknown();
        }

        $size = $this->currentSize;

        if ($size === null) {
            $size = TestSize::unknown();
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->applyFilter($rawData);

        $this->applyExecutableLinesFilter($rawData);

        if ($this->useAnnotationsForIgnoringCode) {
<<<<<<< HEAD
            $this->applyIgnoredLinesFilter($rawData);
=======
            $this->applyIgnoredLinesFilter($rawData, $linesToBeIgnored);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $this->data->initializeUnseenData($rawData);

        if (!$append) {
            return;
        }

<<<<<<< HEAD
        if ($id !== self::UNCOVERED_FILES) {
            $this->applyCoversAnnotationFilter(
                $rawData,
                $linesToBeCovered,
                $linesToBeUsed
            );

            if (empty($rawData->lineCoverage())) {
                return;
            }

            $size         = 'unknown';
            $status       = -1;
            $fromTestcase = false;

            if ($id instanceof TestCase) {
                $fromTestcase = true;
                $_size        = $id->getSize();

                if ($_size === Test::SMALL) {
                    $size = 'small';
                } elseif ($_size === Test::MEDIUM) {
                    $size = 'medium';
                } elseif ($_size === Test::LARGE) {
                    $size = 'large';
                }

                $status = $id->getStatus();
                $id     = get_class($id) . '::' . $id->getName();
            } elseif ($id instanceof PhptTestCase) {
                $fromTestcase = true;
                $size         = 'large';
                $id           = $id->getName();
            }

            $this->tests[$id] = ['size' => $size, 'status' => $status, 'fromTestcase' => $fromTestcase];

            $this->data->markCodeAsExecutedByTestCase($id, $rawData);
        }
=======
        if ($id === self::UNCOVERED_FILES) {
            return;
        }

        $this->applyCoversAndUsesFilter(
            $rawData,
            $linesToBeCovered,
            $linesToBeUsed,
            $size,
        );

        if (empty($rawData->lineCoverage())) {
            return;
        }

        $this->tests[$id] = [
            'size'   => $size->asString(),
            'status' => $status->asString(),
        ];

        $this->data->markCodeAsExecutedByTestCase($id, $rawData);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Merges the data from another instance.
     */
    public function merge(self $that): void
    {
        $this->filter->includeFiles(
<<<<<<< HEAD
            $that->filter()->files()
=======
            $that->filter()->files(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->data->merge($that->data);

        $this->tests = array_merge($this->tests, $that->getTests());

        $this->cachedReport = null;
    }

    public function enableCheckForUnintentionallyCoveredCode(): void
    {
        $this->checkForUnintentionallyCoveredCode = true;
    }

    public function disableCheckForUnintentionallyCoveredCode(): void
    {
        $this->checkForUnintentionallyCoveredCode = false;
    }

    public function includeUncoveredFiles(): void
    {
        $this->includeUncoveredFiles = true;
    }

    public function excludeUncoveredFiles(): void
    {
        $this->includeUncoveredFiles = false;
    }

<<<<<<< HEAD
    public function processUncoveredFiles(): void
    {
        $this->processUncoveredFiles = true;
    }

    public function doNotProcessUncoveredFiles(): void
    {
        $this->processUncoveredFiles = false;
    }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function enableAnnotationsForIgnoringCode(): void
    {
        $this->useAnnotationsForIgnoringCode = true;
    }

    public function disableAnnotationsForIgnoringCode(): void
    {
        $this->useAnnotationsForIgnoringCode = false;
    }

    public function ignoreDeprecatedCode(): void
    {
        $this->ignoreDeprecatedCode = true;
    }

    public function doNotIgnoreDeprecatedCode(): void
    {
        $this->ignoreDeprecatedCode = false;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true !null $this->cacheDirectory
=======
     * @phpstan-assert-if-true !null $this->cacheDirectory
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function cachesStaticAnalysis(): bool
    {
        return $this->cacheDirectory !== null;
    }

    public function cacheStaticAnalysis(string $directory): void
    {
        $this->cacheDirectory = $directory;
    }

    public function doNotCacheStaticAnalysis(): void
    {
        $this->cacheDirectory = null;
    }

    /**
     * @throws StaticAnalysisCacheNotConfiguredException
     */
    public function cacheDirectory(): string
    {
        if (!$this->cachesStaticAnalysis()) {
            throw new StaticAnalysisCacheNotConfiguredException(
<<<<<<< HEAD
                'The static analysis cache is not configured'
=======
                'The static analysis cache is not configured',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $this->cacheDirectory;
    }

    /**
<<<<<<< HEAD
     * @psalm-param class-string $className
=======
     * @param class-string $className
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function excludeSubclassesOfThisClassFromUnintentionallyCoveredCodeCheck(string $className): void
    {
        $this->parentClassesExcludedFromUnintentionallyCoveredCodeCheck[] = $className;
    }

    public function enableBranchAndPathCoverage(): void
    {
        $this->driver->enableBranchAndPathCoverage();
    }

    public function disableBranchAndPathCoverage(): void
    {
        $this->driver->disableBranchAndPathCoverage();
    }

    public function collectsBranchAndPathCoverage(): bool
    {
        return $this->driver->collectsBranchAndPathCoverage();
    }

    public function detectsDeadCode(): bool
    {
        return $this->driver->detectsDeadCode();
    }

    /**
<<<<<<< HEAD
     * Applies the @covers annotation filtering.
     *
     * @param array|false $linesToBeCovered
     *
     * @throws ReflectionException
     * @throws UnintentionallyCoveredCodeException
     */
    private function applyCoversAnnotationFilter(RawCodeCoverageData $rawData, $linesToBeCovered, array $linesToBeUsed): void
=======
     * @internal
     */
    public function driverIsPcov(): bool
    {
        return $this->driver->isPcov();
    }

    /**
     * @internal
     */
    public function driverIsXdebug(): bool
    {
        return $this->driver->isXdebug();
    }

    /**
     * @throws ReflectionException
     * @throws UnintentionallyCoveredCodeException
     */
    private function applyCoversAndUsesFilter(RawCodeCoverageData $rawData, array|false $linesToBeCovered, array $linesToBeUsed, TestSize $size): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($linesToBeCovered === false) {
            $rawData->clear();

            return;
        }

        if (empty($linesToBeCovered)) {
            return;
        }

<<<<<<< HEAD
        if ($this->checkForUnintentionallyCoveredCode &&
            (!$this->currentId instanceof TestCase ||
            (!$this->currentId->isMedium() && !$this->currentId->isLarge()))) {
=======
        if ($this->checkForUnintentionallyCoveredCode && !$size->isMedium() && !$size->isLarge()) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $this->performUnintentionallyCoveredCodeCheck($rawData, $linesToBeCovered, $linesToBeUsed);
        }

        $rawLineData         = $rawData->lineCoverage();
        $filesWithNoCoverage = array_diff_key($rawLineData, $linesToBeCovered);

        foreach (array_keys($filesWithNoCoverage) as $fileWithNoCoverage) {
            $rawData->removeCoverageDataForFile($fileWithNoCoverage);
        }

        if (is_array($linesToBeCovered)) {
            foreach ($linesToBeCovered as $fileToBeCovered => $includedLines) {
                $rawData->keepLineCoverageDataOnlyForLines($fileToBeCovered, $includedLines);
                $rawData->keepFunctionCoverageDataOnlyForLines($fileToBeCovered, $includedLines);
            }
        }
    }

    private function applyFilter(RawCodeCoverageData $data): void
    {
<<<<<<< HEAD
        if ($this->filter->isEmpty()) {
            return;
        }

        foreach (array_keys($data->lineCoverage()) as $filename) {
            if ($this->filter->isExcluded($filename)) {
                $data->removeCoverageDataForFile($filename);
            }
        }
=======
        if (!$this->filter->isEmpty()) {
            foreach (array_keys($data->lineCoverage()) as $filename) {
                if ($this->filter->isExcluded($filename)) {
                    $data->removeCoverageDataForFile($filename);
                }
            }
        }

        $data->skipEmptyLines();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function applyExecutableLinesFilter(RawCodeCoverageData $data): void
    {
        foreach (array_keys($data->lineCoverage()) as $filename) {
            if (!$this->filter->isFile($filename)) {
                continue;
            }

            $linesToBranchMap = $this->analyser()->executableLinesIn($filename);

            $data->keepLineCoverageDataOnlyForLines(
                $filename,
<<<<<<< HEAD
                array_keys($linesToBranchMap)
=======
                array_keys($linesToBranchMap),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );

            $data->markExecutableLineByBranch(
                $filename,
<<<<<<< HEAD
                $linesToBranchMap
=======
                $linesToBranchMap,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

<<<<<<< HEAD
    private function applyIgnoredLinesFilter(RawCodeCoverageData $data): void
=======
    /**
     * @param array<string,list<int>> $linesToBeIgnored
     */
    private function applyIgnoredLinesFilter(RawCodeCoverageData $data, array $linesToBeIgnored): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        foreach (array_keys($data->lineCoverage()) as $filename) {
            if (!$this->filter->isFile($filename)) {
                continue;
            }

<<<<<<< HEAD
            $data->removeCoverageDataForLines(
                $filename,
                $this->analyser()->ignoredLinesFor($filename)
=======
            if (isset($linesToBeIgnored[$filename])) {
                $data->removeCoverageDataForLines(
                    $filename,
                    $linesToBeIgnored[$filename],
                );
            }

            $data->removeCoverageDataForLines(
                $filename,
                $this->analyser()->ignoredLinesFor($filename),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

    /**
     * @throws UnintentionallyCoveredCodeException
     */
    private function addUncoveredFilesFromFilter(): void
    {
        $uncoveredFiles = array_diff(
            $this->filter->files(),
<<<<<<< HEAD
            $this->data->coveredFiles()
        );

        foreach ($uncoveredFiles as $uncoveredFile) {
            if ($this->filter->isFile($uncoveredFile)) {
                $this->append(
                    RawCodeCoverageData::fromUncoveredFile(
                        $uncoveredFile,
                        $this->analyser()
                    ),
                    self::UNCOVERED_FILES
=======
            $this->data->coveredFiles(),
        );

        foreach ($uncoveredFiles as $uncoveredFile) {
            if (is_file($uncoveredFile)) {
                $this->append(
                    RawCodeCoverageData::fromUncoveredFile(
                        $uncoveredFile,
                        $this->analyser(),
                    ),
                    self::UNCOVERED_FILES,
                    linesToBeIgnored: $this->linesToBeIgnored,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );
            }
        }
    }

    /**
<<<<<<< HEAD
     * @throws UnintentionallyCoveredCodeException
     */
    private function processUncoveredFilesFromFilter(): void
    {
        $uncoveredFiles = array_diff(
            $this->filter->files(),
            $this->data->coveredFiles()
        );

        $this->driver->start();

        foreach ($uncoveredFiles as $uncoveredFile) {
            if ($this->filter->isFile($uncoveredFile)) {
                include_once $uncoveredFile;
            }
        }

        $this->append($this->driver->stop(), self::UNCOVERED_FILES);
    }

    /**
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @throws ReflectionException
     * @throws UnintentionallyCoveredCodeException
     */
    private function performUnintentionallyCoveredCodeCheck(RawCodeCoverageData $data, array $linesToBeCovered, array $linesToBeUsed): void
    {
        $allowedLines = $this->getAllowedLines(
            $linesToBeCovered,
<<<<<<< HEAD
            $linesToBeUsed
=======
            $linesToBeUsed,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $unintentionallyCoveredUnits = [];

        foreach ($data->lineCoverage() as $file => $_data) {
            foreach ($_data as $line => $flag) {
                if ($flag === 1 && !isset($allowedLines[$file][$line])) {
                    $unintentionallyCoveredUnits[] = $this->wizard->lookup($file, $line);
                }
            }
        }

        $unintentionallyCoveredUnits = $this->processUnintentionallyCoveredUnits($unintentionallyCoveredUnits);

        if (!empty($unintentionallyCoveredUnits)) {
            throw new UnintentionallyCoveredCodeException(
<<<<<<< HEAD
                $unintentionallyCoveredUnits
=======
                $unintentionallyCoveredUnits,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

    private function getAllowedLines(array $linesToBeCovered, array $linesToBeUsed): array
    {
        $allowedLines = [];

        foreach (array_keys($linesToBeCovered) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = [];
            }

            $allowedLines[$file] = array_merge(
                $allowedLines[$file],
<<<<<<< HEAD
                $linesToBeCovered[$file]
=======
                $linesToBeCovered[$file],
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        foreach (array_keys($linesToBeUsed) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = [];
            }

            $allowedLines[$file] = array_merge(
                $allowedLines[$file],
<<<<<<< HEAD
                $linesToBeUsed[$file]
=======
                $linesToBeUsed[$file],
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        foreach (array_keys($allowedLines) as $file) {
            $allowedLines[$file] = array_flip(
<<<<<<< HEAD
                array_unique($allowedLines[$file])
=======
                array_unique($allowedLines[$file]),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $allowedLines;
    }

    /**
<<<<<<< HEAD
     * @throws ReflectionException
=======
     * @param list<string> $unintentionallyCoveredUnits
     *
     * @throws ReflectionException
     *
     * @return list<string>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    private function processUnintentionallyCoveredUnits(array $unintentionallyCoveredUnits): array
    {
        $unintentionallyCoveredUnits = array_unique($unintentionallyCoveredUnits);
<<<<<<< HEAD
        sort($unintentionallyCoveredUnits);

        foreach (array_keys($unintentionallyCoveredUnits) as $k => $v) {
            $unit = explode('::', $unintentionallyCoveredUnits[$k]);

            if (count($unit) !== 2) {
=======
        $processed                   = [];

        foreach ($unintentionallyCoveredUnits as $unintentionallyCoveredUnit) {
            $tmp = explode('::', $unintentionallyCoveredUnit);

            if (count($tmp) !== 2) {
                $processed[] = $unintentionallyCoveredUnit;

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                continue;
            }

            try {
<<<<<<< HEAD
                $class = new ReflectionClass($unit[0]);

                foreach ($this->parentClassesExcludedFromUnintentionallyCoveredCodeCheck as $parentClass) {
                    if ($class->isSubclassOf($parentClass)) {
                        unset($unintentionallyCoveredUnits[$k]);

                        break;
=======
                $class = new ReflectionClass($tmp[0]);

                foreach ($this->parentClassesExcludedFromUnintentionallyCoveredCodeCheck as $parentClass) {
                    if ($class->isSubclassOf($parentClass)) {
                        continue 2;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                    }
                }
            } catch (\ReflectionException $e) {
                throw new ReflectionException(
                    $e->getMessage(),
                    $e->getCode(),
<<<<<<< HEAD
                    $e
                );
            }
        }

        return array_values($unintentionallyCoveredUnits);
=======
                    $e,
                );
            }

            $processed[] = $tmp[0];
        }

        $processed = array_unique($processed);

        sort($processed);

        return $processed;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function analyser(): FileAnalyser
    {
        if ($this->analyser !== null) {
            return $this->analyser;
        }

        $this->analyser = new ParsingFileAnalyser(
            $this->useAnnotationsForIgnoringCode,
<<<<<<< HEAD
            $this->ignoreDeprecatedCode
=======
            $this->ignoreDeprecatedCode,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        if ($this->cachesStaticAnalysis()) {
            $this->analyser = new CachingFileAnalyser(
                $this->cacheDirectory,
                $this->analyser,
                $this->useAnnotationsForIgnoringCode,
<<<<<<< HEAD
                $this->ignoreDeprecatedCode
=======
                $this->ignoreDeprecatedCode,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $this->analyser;
    }
}
