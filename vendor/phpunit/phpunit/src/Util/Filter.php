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

use function array_unshift;
use function defined;
use function in_array;
use function is_file;
use function realpath;
use function sprintf;
<<<<<<< HEAD
use function strpos;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\SyntheticError;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Filter
=======
use function str_starts_with;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\PhptAssertionFailedError;
use Throwable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class Filter
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
{
    /**
     * @throws Exception
     */
<<<<<<< HEAD
    public static function getFilteredStacktrace(Throwable $t): string
    {
        $filteredStacktrace = '';

        if ($t instanceof SyntheticError) {
            $eTrace = $t->getSyntheticTrace();
            $eFile  = $t->getSyntheticFile();
            $eLine  = $t->getSyntheticLine();
        } elseif ($t instanceof Exception) {
            $eTrace = $t->getSerializableTrace();
            $eFile  = $t->getFile();
            $eLine  = $t->getLine();
        } else {
            if ($t->getPrevious()) {
                $t = $t->getPrevious();
            }

            $eTrace = $t->getTrace();
            $eFile  = $t->getFile();
            $eLine  = $t->getLine();
        }

        if (!self::frameExists($eTrace, $eFile, $eLine)) {
            array_unshift(
                $eTrace,
                ['file' => $eFile, 'line' => $eLine],
            );
        }

        $prefix      = defined('__PHPUNIT_PHAR_ROOT__') ? __PHPUNIT_PHAR_ROOT__ : false;
        $excludeList = new ExcludeList;

        foreach ($eTrace as $frame) {
            if (self::shouldPrintFrame($frame, $prefix, $excludeList)) {
                $filteredStacktrace .= sprintf(
=======
    public static function stackTraceFromThrowableAsString(Throwable $t, bool $unwrap = true): string
    {
        if ($t instanceof PhptAssertionFailedError) {
            $stackTrace = $t->syntheticTrace();
            $file       = $t->syntheticFile();
            $line       = $t->syntheticLine();
        } elseif ($t instanceof Exception) {
            $stackTrace = $t->getSerializableTrace();
            $file       = $t->getFile();
            $line       = $t->getLine();
        } else {
            if ($unwrap && $t->getPrevious()) {
                $t = $t->getPrevious();
            }

            $stackTrace = $t->getTrace();
            $file       = $t->getFile();
            $line       = $t->getLine();
        }

        if (!self::frameExists($stackTrace, $file, $line)) {
            array_unshift(
                $stackTrace,
                ['file' => $file, 'line' => $line],
            );
        }

        return self::stackTraceAsString($stackTrace);
    }

    /**
     * @param list<array{file: string, line: ?int, class?: class-string, function?: string, type: string}> $frames
     */
    public static function stackTraceAsString(array $frames): string
    {
        $buffer      = '';
        $prefix      = defined('__PHPUNIT_PHAR_ROOT__') ? __PHPUNIT_PHAR_ROOT__ : false;
        $excludeList = new ExcludeList;

        foreach ($frames as $frame) {
            if (self::shouldPrintFrame($frame, $prefix, $excludeList)) {
                $buffer .= sprintf(
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                    "%s:%s\n",
                    $frame['file'],
                    $frame['line'] ?? '?',
                );
            }
        }

<<<<<<< HEAD
        return $filteredStacktrace;
    }

    private static function shouldPrintFrame(array $frame, $prefix, ExcludeList $excludeList): bool
=======
        return $buffer;
    }

    /**
     * @param array{file?: non-empty-string} $frame
     */
    private static function shouldPrintFrame(array $frame, false|string $prefix, ExcludeList $excludeList): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!isset($frame['file'])) {
            return false;
        }

        $file              = $frame['file'];
<<<<<<< HEAD
        $fileIsNotPrefixed = $prefix === false || strpos($file, $prefix) !== 0;
=======
        $fileIsNotPrefixed = $prefix === false || !str_starts_with($file, $prefix);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        // @see https://github.com/sebastianbergmann/phpunit/issues/4033
        if (isset($GLOBALS['_SERVER']['SCRIPT_NAME'])) {
            $script = realpath($GLOBALS['_SERVER']['SCRIPT_NAME']);
        } else {
<<<<<<< HEAD
            $script = '';
        }

        return is_file($file) &&
               self::fileIsExcluded($file, $excludeList) &&
               $fileIsNotPrefixed &&
               $file !== $script;
=======
            // @codeCoverageIgnoreStart
            $script = '';
            // @codeCoverageIgnoreEnd
        }

        return $fileIsNotPrefixed &&
               $file !== $script &&
               self::fileIsExcluded($file, $excludeList) &&
               is_file($file);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private static function fileIsExcluded(string $file, ExcludeList $excludeList): bool
    {
        return (empty($GLOBALS['__PHPUNIT_ISOLATION_EXCLUDE_LIST']) ||
                !in_array($file, $GLOBALS['__PHPUNIT_ISOLATION_EXCLUDE_LIST'], true)) &&
                !$excludeList->isExcluded($file);
    }

<<<<<<< HEAD
=======
    /**
     * @param list<array{file?: non-empty-string, line?: int}> $trace
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private static function frameExists(array $trace, string $file, int $line): bool
    {
        foreach ($trace as $frame) {
            if (isset($frame['file'], $frame['line']) && $frame['file'] === $file && $frame['line'] === $line) {
                return true;
            }
        }

        return false;
    }
}
