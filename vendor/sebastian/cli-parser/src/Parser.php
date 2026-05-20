<?php declare(strict_types=1);
/*
 * This file is part of sebastian/cli-parser.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CliParser;

use function array_map;
use function array_merge;
use function array_shift;
use function array_slice;
use function assert;
use function count;
use function current;
use function explode;
use function is_array;
use function is_int;
use function is_string;
use function key;
use function next;
use function preg_replace;
use function reset;
use function sort;
<<<<<<< HEAD
use function strlen;
use function strpos;
=======
use function str_ends_with;
use function str_starts_with;
use function strlen;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function strstr;
use function substr;

final class Parser
{
    /**
<<<<<<< HEAD
     * @psalm-param list<string> $argv
     * @psalm-param list<string> $longOptions
     *
     * @throws AmbiguousOptionException
     * @throws RequiredOptionArgumentMissingException
     * @throws OptionDoesNotAllowArgumentException
     * @throws UnknownOptionException
=======
     * @param list<string> $argv
     * @param list<string> $longOptions
     *
     * @throws AmbiguousOptionException
     * @throws OptionDoesNotAllowArgumentException
     * @throws RequiredOptionArgumentMissingException
     * @throws UnknownOptionException
     *
     * @return array{0: list<array{0: non-empty-string, 1: ?non-empty-string}>, 1: list<non-empty-string>}
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function parse(array $argv, string $shortOptions, ?array $longOptions = null): array
    {
        if (empty($argv)) {
            return [[], []];
        }

<<<<<<< HEAD
        $options     = [];
        $nonOptions  = [];

        if ($longOptions) {
=======
        $options    = [];
        $nonOptions = [];

        if ($longOptions !== null) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            sort($longOptions);
        }

        if (isset($argv[0][0]) && $argv[0][0] !== '-') {
            array_shift($argv);
        }

        reset($argv);

        $argv = array_map('trim', $argv);

        while (false !== $arg = current($argv)) {
            $i = key($argv);

            assert(is_int($i));

            next($argv);

            if ($arg === '') {
                continue;
            }

            if ($arg === '--') {
                $nonOptions = array_merge($nonOptions, array_slice($argv, $i + 1));

                break;
            }

<<<<<<< HEAD
            if ($arg[0] !== '-' || (strlen($arg) > 1 && $arg[1] === '-' && !$longOptions)) {
=======
            if ($arg[0] !== '-' || (strlen($arg) > 1 && $arg[1] === '-' && $longOptions === null)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $nonOptions[] = $arg;

                continue;
            }

            if (strlen($arg) > 1 && $arg[1] === '-' && is_array($longOptions)) {
                $this->parseLongOption(
                    substr($arg, 2),
                    $longOptions,
                    $options,
<<<<<<< HEAD
                    $argv
                );
            } else {
                $this->parseShortOption(
                    substr($arg, 1),
                    $shortOptions,
                    $options,
                    $argv
                );
            }
=======
                    $argv,
                );

                continue;
            }

            $this->parseShortOption(
                substr($arg, 1),
                $shortOptions,
                $options,
                $argv,
            );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return [$options, $nonOptions];
    }

    /**
<<<<<<< HEAD
     * @throws RequiredOptionArgumentMissingException
     */
    private function parseShortOption(string $arg, string $shortOptions, array &$opts, array &$args): void
    {
        $argLength = strlen($arg);

        for ($i = 0; $i < $argLength; $i++) {
            $option         = $arg[$i];
            $optionArgument = null;

            if ($arg[$i] === ':' || ($spec = strstr($shortOptions, $option)) === false) {
                throw new UnknownOptionException('-' . $option);
            }

            assert(is_string($spec));

            if (strlen($spec) > 1 && $spec[1] === ':') {
                if ($i + 1 < $argLength) {
                    $opts[] = [$option, substr($arg, $i + 1)];
=======
     * @param list<array{0: non-empty-string, 1: ?non-empty-string}> $options
     * @param list<string>                                           $argv
     *
     * @throws RequiredOptionArgumentMissingException
     */
    private function parseShortOption(string $argument, string $shortOptions, array &$options, array &$argv): void
    {
        $argumentLength = strlen($argument);

        for ($i = 0; $i < $argumentLength; $i++) {
            $option         = $argument[$i];
            $optionArgument = null;

            if ($argument[$i] === ':' || ($spec = strstr($shortOptions, $option)) === false) {
                throw new UnknownOptionException('-' . $option);
            }

            if (strlen($spec) > 1 && $spec[1] === ':') {
                if ($i + 1 < $argumentLength) {
                    $options[] = [$option, substr($argument, $i + 1)];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                    break;
                }

                if (!(strlen($spec) > 2 && $spec[2] === ':')) {
<<<<<<< HEAD
                    $optionArgument = current($args);

                    if (!$optionArgument) {
=======
                    $optionArgument = current($argv);

                    if ($optionArgument === false) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                        throw new RequiredOptionArgumentMissingException('-' . $option);
                    }

                    assert(is_string($optionArgument));

<<<<<<< HEAD
                    next($args);
                }
            }

            $opts[] = [$option, $optionArgument];
=======
                    next($argv);
                }
            }

            $options[] = [$option, $optionArgument];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }
    }

    /**
<<<<<<< HEAD
     * @psalm-param list<string> $longOptions
     *
     * @throws AmbiguousOptionException
     * @throws RequiredOptionArgumentMissingException
     * @throws OptionDoesNotAllowArgumentException
     * @throws UnknownOptionException
     */
    private function parseLongOption(string $arg, array $longOptions, array &$opts, array &$args): void
    {
        $count          = count($longOptions);
        $list           = explode('=', $arg);
=======
     * @param list<string>                                           $longOptions
     * @param list<array{0: non-empty-string, 1: ?non-empty-string}> $options
     * @param list<string>                                           $argv
     *
     * @throws AmbiguousOptionException
     * @throws OptionDoesNotAllowArgumentException
     * @throws RequiredOptionArgumentMissingException
     * @throws UnknownOptionException
     */
    private function parseLongOption(string $argument, array $longOptions, array &$options, array &$argv): void
    {
        $count          = count($longOptions);
        $list           = explode('=', $argument);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $option         = $list[0];
        $optionArgument = null;

        if (count($list) > 1) {
            $optionArgument = $list[1];
        }

        $optionLength = strlen($option);

        foreach ($longOptions as $i => $longOption) {
            $opt_start = substr($longOption, 0, $optionLength);

            if ($opt_start !== $option) {
                continue;
            }

            $opt_rest = substr($longOption, $optionLength);

<<<<<<< HEAD
            if ($opt_rest !== '' && $i + 1 < $count && $option[0] !== '=' && strpos($longOptions[$i + 1], $option) === 0) {
                throw new AmbiguousOptionException('--' . $option);
            }

            if (substr($longOption, -1) === '=') {
                /* @noinspection StrlenInEmptyStringCheckContextInspection */
                if (substr($longOption, -2) !== '==' && !strlen((string) $optionArgument)) {
                    if (false === $optionArgument = current($args)) {
                        throw new RequiredOptionArgumentMissingException('--' . $option);
                    }

                    next($args);
                }
            } elseif ($optionArgument) {
=======
            if ($opt_rest !== '' && $i + 1 < $count && $option[0] !== '=' && str_starts_with($longOptions[$i + 1], $option)) {
                throw new AmbiguousOptionException('--' . $option);
            }

            if (str_ends_with($longOption, '=')) {
                if (!str_ends_with($longOption, '==') && !strlen((string) $optionArgument)) {
                    if (false === $optionArgument = current($argv)) {
                        throw new RequiredOptionArgumentMissingException('--' . $option);
                    }

                    next($argv);
                }
            } elseif ($optionArgument !== null) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                throw new OptionDoesNotAllowArgumentException('--' . $option);
            }

            $fullOption = '--' . preg_replace('/={1,2}$/', '', $longOption);
<<<<<<< HEAD
            $opts[]     = [$fullOption, $optionArgument];
=======
            $options[]  = [$fullOption, $optionArgument];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

            return;
        }

        throw new UnknownOptionException('--' . $option);
    }
}
