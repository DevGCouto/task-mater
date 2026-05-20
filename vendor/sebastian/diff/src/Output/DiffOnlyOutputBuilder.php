<?php declare(strict_types=1);
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Diff\Output;

use function fclose;
use function fopen;
use function fwrite;
<<<<<<< HEAD
=======
use function str_ends_with;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function stream_get_contents;
use function substr;
use SebastianBergmann\Diff\Differ;

/**
 * Builds a diff string representation in a loose unified diff format
 * listing only changes lines. Does not include line numbers.
 */
final class DiffOnlyOutputBuilder implements DiffOutputBuilderInterface
{
<<<<<<< HEAD
    /**
     * @var string
     */
    private $header;
=======
    private string $header;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(string $header = "--- Original\n+++ New\n")
    {
        $this->header = $header;
    }

    public function getDiff(array $diff): string
    {
        $buffer = fopen('php://memory', 'r+b');

        if ('' !== $this->header) {
            fwrite($buffer, $this->header);

<<<<<<< HEAD
            if ("\n" !== substr($this->header, -1, 1)) {
=======
            if (!str_ends_with($this->header, "\n")) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                fwrite($buffer, "\n");
            }
        }

        foreach ($diff as $diffEntry) {
            if ($diffEntry[1] === Differ::ADDED) {
                fwrite($buffer, '+' . $diffEntry[0]);
            } elseif ($diffEntry[1] === Differ::REMOVED) {
                fwrite($buffer, '-' . $diffEntry[0]);
            } elseif ($diffEntry[1] === Differ::DIFF_LINE_END_WARNING) {
                fwrite($buffer, ' ' . $diffEntry[0]);

                continue; // Warnings should not be tested for line break, it will always be there
            } else { /* Not changed (old) 0 */
<<<<<<< HEAD
                continue; // we didn't write the non changs line, so do not add a line break either
=======
                continue; // we didn't write the not-changed line, so do not add a line break either
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }

            $lc = substr($diffEntry[0], -1);

            if ($lc !== "\n" && $lc !== "\r") {
                fwrite($buffer, "\n"); // \No newline at end of file
            }
        }

        $diff = stream_get_contents($buffer, -1, 0);
        fclose($buffer);

        return $diff;
    }
}
