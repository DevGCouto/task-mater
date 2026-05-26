<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Report\Xml;

use const DIRECTORY_SEPARATOR;
<<<<<<< HEAD
use const PHP_EOL;
use function count;
use function dirname;
use function file_get_contents;
use function file_put_contents;
=======
use function count;
use function dirname;
use function file_get_contents;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function is_array;
use function is_dir;
use function is_file;
use function is_writable;
<<<<<<< HEAD
use function libxml_clear_errors;
use function libxml_get_errors;
use function libxml_use_internal_errors;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function sprintf;
use function strlen;
use function substr;
use DateTimeImmutable;
use DOMDocument;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Driver\PathExistsButIsNotDirectoryException;
use SebastianBergmann\CodeCoverage\Driver\WriteOperationFailedException;
use SebastianBergmann\CodeCoverage\Node\AbstractNode;
use SebastianBergmann\CodeCoverage\Node\Directory as DirectoryNode;
use SebastianBergmann\CodeCoverage\Node\File as FileNode;
<<<<<<< HEAD
use SebastianBergmann\CodeCoverage\Util\Filesystem as DirectoryUtil;
=======
use SebastianBergmann\CodeCoverage\Util\Filesystem;
use SebastianBergmann\CodeCoverage\Util\Filesystem as DirectoryUtil;
use SebastianBergmann\CodeCoverage\Util\Xml;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeCoverage\Version;
use SebastianBergmann\CodeCoverage\XmlException;
use SebastianBergmann\Environment\Runtime;

final class Facade
{
<<<<<<< HEAD
    /**
     * @var string
     */
    private $target;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var string
     */
    private $phpUnitVersion;
=======
    private string $target;
    private Project $project;
    private readonly string $phpUnitVersion;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(string $version)
    {
        $this->phpUnitVersion = $version;
    }

    /**
     * @throws XmlException
     */
    public function process(CodeCoverage $coverage, string $target): void
    {
        if (substr($target, -1, 1) !== DIRECTORY_SEPARATOR) {
            $target .= DIRECTORY_SEPARATOR;
        }

        $this->target = $target;
        $this->initTargetDirectory($target);

        $report = $coverage->getReport();

        $this->project = new Project(
<<<<<<< HEAD
            $coverage->getReport()->name()
        );

        $this->setBuildInformation();
=======
            $coverage->getReport()->name(),
        );

        $this->setBuildInformation($coverage);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->processTests($coverage->getTests());
        $this->processDirectory($report, $this->project);

        $this->saveDocument($this->project->asDom(), 'index');
    }

<<<<<<< HEAD
    private function setBuildInformation(): void
    {
        $buildNode = $this->project->buildInformation();
        $buildNode->setRuntimeInformation(new Runtime);
=======
    private function setBuildInformation(CodeCoverage $coverage): void
    {
        $buildNode = $this->project->buildInformation();
        $buildNode->setRuntimeInformation(new Runtime, $coverage);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $buildNode->setBuildTime(new DateTimeImmutable);
        $buildNode->setGeneratorVersions($this->phpUnitVersion, Version::id());
    }

    /**
     * @throws PathExistsButIsNotDirectoryException
     * @throws WriteOperationFailedException
     */
    private function initTargetDirectory(string $directory): void
    {
        if (is_file($directory)) {
            if (!is_dir($directory)) {
                throw new PathExistsButIsNotDirectoryException($directory);
            }

            if (!is_writable($directory)) {
                throw new WriteOperationFailedException($directory);
            }
        }

        DirectoryUtil::createDirectory($directory);
    }

    /**
     * @throws XmlException
     */
    private function processDirectory(DirectoryNode $directory, Node $context): void
    {
        $directoryName = $directory->name();

        if ($this->project->projectSourceDirectory() === $directoryName) {
            $directoryName = '/';
        }

        $directoryObject = $context->addDirectory($directoryName);

        $this->setTotals($directory, $directoryObject->totals());

        foreach ($directory->directories() as $node) {
            $this->processDirectory($node, $directoryObject);
        }

        foreach ($directory->files() as $node) {
            $this->processFile($node, $directoryObject);
        }
    }

    /**
     * @throws XmlException
     */
    private function processFile(FileNode $file, Directory $context): void
    {
        $fileObject = $context->addFile(
            $file->name(),
<<<<<<< HEAD
            $file->id() . '.xml'
=======
            $file->id() . '.xml',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->setTotals($file, $fileObject->totals());

        $path = substr(
            $file->pathAsString(),
<<<<<<< HEAD
            strlen($this->project->projectSourceDirectory())
=======
            strlen($this->project->projectSourceDirectory()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $fileReport = new Report($path);

        $this->setTotals($file, $fileReport->totals());

        foreach ($file->classesAndTraits() as $unit) {
            $this->processUnit($unit, $fileReport);
        }

        foreach ($file->functions() as $function) {
            $this->processFunction($function, $fileReport);
        }

        foreach ($file->lineCoverageData() as $line => $tests) {
            if (!is_array($tests) || count($tests) === 0) {
                continue;
            }

            $coverage = $fileReport->lineCoverage((string) $line);

            foreach ($tests as $test) {
                $coverage->addTest($test);
            }

            $coverage->finalize();
        }

        $fileReport->source()->setSourceCode(
<<<<<<< HEAD
            file_get_contents($file->pathAsString())
=======
            file_get_contents($file->pathAsString()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->saveDocument($fileReport->asDom(), $file->id());
    }

    private function processUnit(array $unit, Report $report): void
    {
        if (isset($unit['className'])) {
            $unitObject = $report->classObject($unit['className']);
        } else {
            $unitObject = $report->traitObject($unit['traitName']);
        }

        $unitObject->setLines(
            $unit['startLine'],
            $unit['executableLines'],
<<<<<<< HEAD
            $unit['executedLines']
=======
            $unit['executedLines'],
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $unitObject->setCrap((float) $unit['crap']);
        $unitObject->setNamespace($unit['namespace']);

        foreach ($unit['methods'] as $method) {
            $methodObject = $unitObject->addMethod($method['methodName']);
            $methodObject->setSignature($method['signature']);
            $methodObject->setLines((string) $method['startLine'], (string) $method['endLine']);
            $methodObject->setCrap($method['crap']);
            $methodObject->setTotals(
                (string) $method['executableLines'],
                (string) $method['executedLines'],
<<<<<<< HEAD
                (string) $method['coverage']
=======
                (string) $method['coverage'],
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

    private function processFunction(array $function, Report $report): void
    {
        $functionObject = $report->functionObject($function['functionName']);

        $functionObject->setSignature($function['signature']);
        $functionObject->setLines((string) $function['startLine']);
        $functionObject->setCrap($function['crap']);
        $functionObject->setTotals((string) $function['executableLines'], (string) $function['executedLines'], (string) $function['coverage']);
    }

    private function processTests(array $tests): void
    {
        $testsObject = $this->project->tests();

        foreach ($tests as $test => $result) {
            $testsObject->addTest($test, $result);
        }
    }

    private function setTotals(AbstractNode $node, Totals $totals): void
    {
        $loc = $node->linesOfCode();

        $totals->setNumLines(
            $loc['linesOfCode'],
            $loc['commentLinesOfCode'],
            $loc['nonCommentLinesOfCode'],
            $node->numberOfExecutableLines(),
<<<<<<< HEAD
            $node->numberOfExecutedLines()
=======
            $node->numberOfExecutedLines(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $totals->setNumClasses(
            $node->numberOfClasses(),
<<<<<<< HEAD
            $node->numberOfTestedClasses()
=======
            $node->numberOfTestedClasses(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $totals->setNumTraits(
            $node->numberOfTraits(),
<<<<<<< HEAD
            $node->numberOfTestedTraits()
=======
            $node->numberOfTestedTraits(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $totals->setNumMethods(
            $node->numberOfMethods(),
<<<<<<< HEAD
            $node->numberOfTestedMethods()
=======
            $node->numberOfTestedMethods(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $totals->setNumFunctions(
            $node->numberOfFunctions(),
<<<<<<< HEAD
            $node->numberOfTestedFunctions()
=======
            $node->numberOfTestedFunctions(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    private function targetDirectory(): string
    {
        return $this->target;
    }

    /**
     * @throws XmlException
     */
    private function saveDocument(DOMDocument $document, string $name): void
    {
        $filename = sprintf('%s/%s.xml', $this->targetDirectory(), $name);

<<<<<<< HEAD
        $document->formatOutput       = true;
        $document->preserveWhiteSpace = false;
        $this->initTargetDirectory(dirname($filename));

        file_put_contents($filename, $this->documentAsString($document));
    }

    /**
     * @throws XmlException
     *
     * @see https://bugs.php.net/bug.php?id=79191
     */
    private function documentAsString(DOMDocument $document): string
    {
        $xmlErrorHandling = libxml_use_internal_errors(true);
        $xml              = $document->saveXML();

        if ($xml === false) {
            $message = 'Unable to generate the XML';

            foreach (libxml_get_errors() as $error) {
                $message .= PHP_EOL . $error->message;
            }

            throw new XmlException($message);
        }

        libxml_clear_errors();
        libxml_use_internal_errors($xmlErrorHandling);

        return $xml;
=======
        $this->initTargetDirectory(dirname($filename));

        Filesystem::write($filename, Xml::asString($document));
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
