<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Node;

use const DIRECTORY_SEPARATOR;
use function array_merge;
<<<<<<< HEAD
=======
use function str_ends_with;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function str_replace;
use function substr;
use Countable;
use SebastianBergmann\CodeCoverage\Util\Percentage;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
<<<<<<< HEAD
 */
abstract class AbstractNode implements Countable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $pathAsString;

    /**
     * @var array
     */
    private $pathAsArray;

    /**
     * @var AbstractNode
     */
    private $parent;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $name, ?self $parent = null)
    {
        if (substr($name, -1) === DIRECTORY_SEPARATOR) {
=======
 *
 * @phpstan-import-type LinesOfCodeType from \SebastianBergmann\CodeCoverage\StaticAnalysis\FileAnalyser
 * @phpstan-import-type ProcessedFunctionType from \SebastianBergmann\CodeCoverage\Node\File
 * @phpstan-import-type ProcessedClassType from \SebastianBergmann\CodeCoverage\Node\File
 * @phpstan-import-type ProcessedTraitType from \SebastianBergmann\CodeCoverage\Node\File
 */
abstract class AbstractNode implements Countable
{
    private readonly string $name;
    private string $pathAsString;
    private array $pathAsArray;
    private readonly ?AbstractNode $parent;
    private string $id;

    public function __construct(string $name, ?self $parent = null)
    {
        if (str_ends_with($name, DIRECTORY_SEPARATOR)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $name = substr($name, 0, -1);
        }

        $this->name   = $name;
        $this->parent = $parent;
<<<<<<< HEAD
=======

        $this->processId();
        $this->processPath();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
<<<<<<< HEAD
        if ($this->id === null) {
            $parent = $this->parent();

            if ($parent === null) {
                $this->id = 'index';
            } else {
                $parentId = $parent->id();

                if ($parentId === 'index') {
                    $this->id = str_replace(':', '_', $this->name);
                } else {
                    $this->id = $parentId . '/' . $this->name;
                }
            }
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $this->id;
    }

    public function pathAsString(): string
    {
<<<<<<< HEAD
        if ($this->pathAsString === null) {
            if ($this->parent === null) {
                $this->pathAsString = $this->name;
            } else {
                $this->pathAsString = $this->parent->pathAsString() . DIRECTORY_SEPARATOR . $this->name;
            }
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $this->pathAsString;
    }

    public function pathAsArray(): array
    {
<<<<<<< HEAD
        if ($this->pathAsArray === null) {
            if ($this->parent === null) {
                $this->pathAsArray = [];
            } else {
                $this->pathAsArray = $this->parent->pathAsArray();
            }

            $this->pathAsArray[] = $this;
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $this->pathAsArray;
    }

    public function parent(): ?self
    {
        return $this->parent;
    }

    public function percentageOfTestedClasses(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedClasses(),
            $this->numberOfClasses(),
        );
    }

    public function percentageOfTestedTraits(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedTraits(),
            $this->numberOfTraits(),
        );
    }

    public function percentageOfTestedClassesAndTraits(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedClassesAndTraits(),
            $this->numberOfClassesAndTraits(),
        );
    }

    public function percentageOfTestedFunctions(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedFunctions(),
            $this->numberOfFunctions(),
        );
    }

    public function percentageOfTestedMethods(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedMethods(),
            $this->numberOfMethods(),
        );
    }

    public function percentageOfTestedFunctionsAndMethods(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedFunctionsAndMethods(),
            $this->numberOfFunctionsAndMethods(),
        );
    }

    public function percentageOfExecutedLines(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfExecutedLines(),
            $this->numberOfExecutableLines(),
        );
    }

    public function percentageOfExecutedBranches(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfExecutedBranches(),
<<<<<<< HEAD
            $this->numberOfExecutableBranches()
=======
            $this->numberOfExecutableBranches(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    public function percentageOfExecutedPaths(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfExecutedPaths(),
<<<<<<< HEAD
            $this->numberOfExecutablePaths()
=======
            $this->numberOfExecutablePaths(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    public function numberOfClassesAndTraits(): int
    {
        return $this->numberOfClasses() + $this->numberOfTraits();
    }

    public function numberOfTestedClassesAndTraits(): int
    {
        return $this->numberOfTestedClasses() + $this->numberOfTestedTraits();
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, ProcessedClassType|ProcessedTraitType>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function classesAndTraits(): array
    {
        return array_merge($this->classes(), $this->traits());
    }

    public function numberOfFunctionsAndMethods(): int
    {
        return $this->numberOfFunctions() + $this->numberOfMethods();
    }

    public function numberOfTestedFunctionsAndMethods(): int
    {
        return $this->numberOfTestedFunctions() + $this->numberOfTestedMethods();
    }

<<<<<<< HEAD
    abstract public function classes(): array;

    abstract public function traits(): array;

    abstract public function functions(): array;

    /**
     * @psalm-return array{linesOfCode: int, commentLinesOfCode: int, nonCommentLinesOfCode: int}
=======
    /**
     * @return array<string, ProcessedClassType>
     */
    abstract public function classes(): array;

    /**
     * @return array<string, ProcessedTraitType>
     */
    abstract public function traits(): array;

    /**
     * @return array<string, ProcessedFunctionType>
     */
    abstract public function functions(): array;

    /**
     * @return LinesOfCodeType
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    abstract public function linesOfCode(): array;

    abstract public function numberOfExecutableLines(): int;

    abstract public function numberOfExecutedLines(): int;

    abstract public function numberOfExecutableBranches(): int;

    abstract public function numberOfExecutedBranches(): int;

    abstract public function numberOfExecutablePaths(): int;

    abstract public function numberOfExecutedPaths(): int;

    abstract public function numberOfClasses(): int;

    abstract public function numberOfTestedClasses(): int;

    abstract public function numberOfTraits(): int;

    abstract public function numberOfTestedTraits(): int;

    abstract public function numberOfMethods(): int;

    abstract public function numberOfTestedMethods(): int;

    abstract public function numberOfFunctions(): int;

    abstract public function numberOfTestedFunctions(): int;
<<<<<<< HEAD
=======

    private function processId(): void
    {
        if ($this->parent === null) {
            $this->id = 'index';

            return;
        }

        $parentId = $this->parent->id();

        if ($parentId === 'index') {
            $this->id = str_replace(':', '_', $this->name);
        } else {
            $this->id = $parentId . '/' . $this->name;
        }
    }

    private function processPath(): void
    {
        if ($this->parent === null) {
            $this->pathAsArray  = [$this];
            $this->pathAsString = $this->name;

            return;
        }

        $this->pathAsArray  = $this->parent->pathAsArray();
        $this->pathAsString = $this->parent->pathAsString() . DIRECTORY_SEPARATOR . $this->name;

        $this->pathAsArray[] = $this;
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
