<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

use const DIRECTORY_SEPARATOR;
<<<<<<< HEAD
=======
use const PHP_EOL;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function explode;
use function implode;
use function preg_match;
use function preg_quote;
use function preg_replace;
use function strtr;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
<<<<<<< HEAD
final class StringMatchesFormatDescription extends RegularExpression
{
    /**
     * @var string
     */
    private $string;

    public function __construct(string $string)
    {
        parent::__construct(
            $this->createPatternFromFormat(
                $this->convertNewlines($string),
            ),
        );

        $this->string = $string;
=======
final class StringMatchesFormatDescription extends Constraint
{
    private readonly string $formatDescription;

    public function __construct(string $formatDescription)
    {
        $this->formatDescription = $formatDescription;
    }

    public function toString(): string
    {
        return 'matches format description:' . PHP_EOL . $this->formatDescription;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return parent::matches(
            $this->convertNewlines($other),
        );
    }

    protected function failureDescription($other): string
=======
     */
    protected function matches(mixed $other): bool
    {
        $other = $this->convertNewlines($other);

        $matches = preg_match(
            $this->regularExpressionForFormatDescription(
                $this->convertNewlines($this->formatDescription),
            ),
            $other,
        );

        return $matches > 0;
    }

    protected function failureDescription(mixed $other): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return 'string matches format description';
    }

<<<<<<< HEAD
    protected function additionalFailureDescription($other): string
    {
        $from = explode("\n", $this->string);
        $to   = explode("\n", $this->convertNewlines($other));

        foreach ($from as $index => $line) {
            if (isset($to[$index]) && $line !== $to[$index]) {
                $line = $this->createPatternFromFormat($line);

=======
    /**
     * Returns a cleaned up diff.
     *
     * The expected string can contain placeholders like %s and %d.
     * By using 'diff' such placeholders compared to the real output will
     * always be different, although we don't want to show them as different.
     * This method removes the expected differences by figuring out if a difference
     * is allowed by the use of a placeholder.
     *
     * The problem here are %A and %a multiline placeholders since we look at the
     * expected and actual output line by line. If differences allowed by those placeholders
     * stretch over multiple lines they will still end up in the final diff.
     * And since they mess up the line sync between the expected and actual output
     * all following allowed changes will not be detected/removed anymore.
     */
    protected function additionalFailureDescription(mixed $other): string
    {
        $from = explode("\n", $this->formatDescription);
        $to   = explode("\n", $this->convertNewlines($other));

        foreach ($from as $index => $line) {
            // is the expected output line different from the actual output line
            if (isset($to[$index]) && $line !== $to[$index]) {
                $line = $this->regularExpressionForFormatDescription($line);

                // if the difference is allowed by a placeholder
                // overwrite the expected line with the actual line to prevent it from showing up in the diff
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                if (preg_match($line, $to[$index]) > 0) {
                    $from[$index] = $to[$index];
                }
            }
        }

<<<<<<< HEAD
        $this->string = implode("\n", $from);
        $other        = implode("\n", $to);

        return (new Differ(new UnifiedDiffOutputBuilder("--- Expected\n+++ Actual\n")))->diff($this->string, $other);
    }

    private function createPatternFromFormat(string $string): string
=======
        $from = implode("\n", $from);
        $to   = implode("\n", $to);

        return $this->differ()->diff($from, $to);
    }

    private function regularExpressionForFormatDescription(string $string): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $string = strtr(
            preg_quote($string, '/'),
            [
                '%%' => '%',
<<<<<<< HEAD
                '%e' => '\\' . DIRECTORY_SEPARATOR,
                '%s' => '[^\r\n]+',
                '%S' => '[^\r\n]*',
                '%a' => '.+',
                '%A' => '.*',
=======
                '%e' => preg_quote(DIRECTORY_SEPARATOR, '/'),
                '%s' => '[^\r\n]+',
                '%S' => '[^\r\n]*',
                '%a' => '.+?',
                '%A' => '.*?',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                '%w' => '\s*',
                '%i' => '[+-]?\d+',
                '%d' => '\d+',
                '%x' => '[0-9a-fA-F]+',
<<<<<<< HEAD
                '%f' => '[+-]?\.?\d+\.?\d*(?:[Ee][+-]?\d+)?',
                '%c' => '.',
=======
                '%f' => '[+-]?(?:\d+|(?=\.\d))(?:\.\d+)?(?:[Ee][+-]?\d+)?',
                '%c' => '.',
                '%0' => '\x00',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            ],
        );

        return '/^' . $string . '$/s';
    }

    private function convertNewlines(string $text): string
    {
        return preg_replace('/\r\n/', "\n", $text);
    }
<<<<<<< HEAD
=======

    private function differ(): Differ
    {
        return new Differ(new UnifiedDiffOutputBuilder("--- Expected\n+++ Actual\n"));
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
