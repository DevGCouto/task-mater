<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-file-iterator.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\FileIterator;

<<<<<<< HEAD
use const DIRECTORY_SEPARATOR;
use function array_unique;
use function count;
use function dirname;
use function explode;
use function is_file;
use function is_string;
use function realpath;
use function sort;

class Facade
{
    /**
     * @param array|string $paths
     * @param array|string $suffixes
     * @param array|string $prefixes
     */
    public function getFilesAsArray($paths, $suffixes = '', $prefixes = '', array $exclude = [], bool $commonPath = false): array
    {
        if (is_string($paths)) {
            $paths = [$paths];
        }

=======
use function array_unique;
use function assert;
use function sort;
use SplFileInfo;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class Facade
{
    /**
     * @param list<non-empty-string>|non-empty-string $paths
     * @param list<non-empty-string>|string           $suffixes
     * @param list<non-empty-string>|string           $prefixes
     * @param list<non-empty-string>                  $exclude
     *
     * @return list<non-empty-string>
     */
    public function getFilesAsArray(array|string $paths, array|string $suffixes = '', array|string $prefixes = '', array $exclude = []): array
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $iterator = (new Factory)->getFileIterator($paths, $suffixes, $prefixes, $exclude);

        $files = [];

        foreach ($iterator as $file) {
<<<<<<< HEAD
=======
            assert($file instanceof SplFileInfo);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $file = $file->getRealPath();

            if ($file) {
                $files[] = $file;
            }
        }

<<<<<<< HEAD
        foreach ($paths as $path) {
            if (is_file($path)) {
                $files[] = realpath($path);
            }
        }

        $files = array_unique($files);
        sort($files);

        if ($commonPath) {
            return [
                'commonPath' => $this->getCommonPath($files),
                'files'      => $files,
            ];
        }

        return $files;
    }

    protected function getCommonPath(array $files): string
    {
        $count = count($files);

        if ($count === 0) {
            return '';
        }

        if ($count === 1) {
            return dirname($files[0]) . DIRECTORY_SEPARATOR;
        }

        $_files = [];

        foreach ($files as $file) {
            $_files[] = $_fileParts = explode(DIRECTORY_SEPARATOR, $file);

            if (empty($_fileParts[0])) {
                $_fileParts[0] = DIRECTORY_SEPARATOR;
            }
        }

        $common = '';
        $done   = false;
        $j      = 0;
        $count--;

        while (!$done) {
            for ($i = 0; $i < $count; $i++) {
                if ($_files[$i][$j] != $_files[$i + 1][$j]) {
                    $done = true;

                    break;
                }
            }

            if (!$done) {
                $common .= $_files[0][$j];

                if ($j > 0) {
                    $common .= DIRECTORY_SEPARATOR;
                }
            }

            $j++;
        }

        return DIRECTORY_SEPARATOR . $common;
    }
=======
        $files = array_unique($files);

        sort($files);

        return $files;
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
