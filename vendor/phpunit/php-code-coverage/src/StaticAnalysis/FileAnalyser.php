<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\StaticAnalysis;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
<<<<<<< HEAD
 */
interface FileAnalyser
{
    public function classesIn(string $filename): array;

    public function traitsIn(string $filename): array;

    public function functionsIn(string $filename): array;

    /**
     * @psalm-return array{linesOfCode: int, commentLinesOfCode: int, nonCommentLinesOfCode: int}
     */
    public function linesOfCodeFor(string $filename): array;

    public function executableLinesIn(string $filename): array;

=======
 *
 * @phpstan-import-type CodeUnitFunctionType from \SebastianBergmann\CodeCoverage\StaticAnalysis\CodeUnitFindingVisitor
 * @phpstan-import-type CodeUnitMethodType from \SebastianBergmann\CodeCoverage\StaticAnalysis\CodeUnitFindingVisitor
 * @phpstan-import-type CodeUnitClassType from \SebastianBergmann\CodeCoverage\StaticAnalysis\CodeUnitFindingVisitor
 * @phpstan-import-type CodeUnitTraitType from \SebastianBergmann\CodeCoverage\StaticAnalysis\CodeUnitFindingVisitor
 *
 * @phpstan-type LinesOfCodeType = array{
 *     linesOfCode: int,
 *     commentLinesOfCode: int,
 *     nonCommentLinesOfCode: int
 * }
 * @phpstan-type LinesType = array<int, int>
 */
interface FileAnalyser
{
    /**
     * @return array<string, CodeUnitClassType>
     */
    public function classesIn(string $filename): array;

    /**
     * @return array<string, CodeUnitTraitType>
     */
    public function traitsIn(string $filename): array;

    /**
     * @return array<string, CodeUnitFunctionType>
     */
    public function functionsIn(string $filename): array;

    /**
     * @return LinesOfCodeType
     */
    public function linesOfCodeFor(string $filename): array;

    /**
     * @return LinesType
     */
    public function executableLinesIn(string $filename): array;

    /**
     * @return LinesType
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function ignoredLinesFor(string $filename): array;
}
