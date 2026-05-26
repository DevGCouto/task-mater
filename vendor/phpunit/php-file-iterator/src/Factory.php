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
=======
use const DIRECTORY_SEPARATOR;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use const GLOB_ONLYDIR;
use function array_filter;
use function array_map;
use function array_merge;
<<<<<<< HEAD
=======
use function array_unique;
use function array_values;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function glob;
use function is_dir;
use function is_string;
use function realpath;
<<<<<<< HEAD
use AppendIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Factory
{
    /**
     * @param array|string $paths
     * @param array|string $suffixes
     * @param array|string $prefixes
     */
    public function getFileIterator($paths, $suffixes = '', $prefixes = '', array $exclude = []): AppendIterator
=======
use function sort;
use function str_ends_with;
use function stripos;
use function substr;
use AppendIterator;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-file-iterator
 */
final class Factory
{
    /**
     * @param list<non-empty-string>|non-empty-string $paths
     * @param list<non-empty-string>|string           $suffixes
     * @param list<non-empty-string>|string           $prefixes
     * @param list<non-empty-string>                  $exclude
     *
     * @phpstan-ignore missingType.generics
     */
    public function getFileIterator(array|string $paths, array|string $suffixes = '', array|string $prefixes = '', array $exclude = []): AppendIterator
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (is_string($paths)) {
            $paths = [$paths];
        }

<<<<<<< HEAD
        $paths   = $this->getPathsAfterResolvingWildcards($paths);
        $exclude = $this->getPathsAfterResolvingWildcards($exclude);
=======
        $paths   = $this->resolveWildcards($paths);
        $exclude = $this->resolveWildcards($exclude);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        if (is_string($prefixes)) {
            if ($prefixes !== '') {
                $prefixes = [$prefixes];
            } else {
                $prefixes = [];
            }
        }

        if (is_string($suffixes)) {
            if ($suffixes !== '') {
                $suffixes = [$suffixes];
            } else {
                $suffixes = [];
            }
        }

        $iterator = new AppendIterator;

        foreach ($paths as $path) {
            if (is_dir($path)) {
                $iterator->append(
                    new Iterator(
                        $path,
                        new RecursiveIteratorIterator(
<<<<<<< HEAD
                            new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::FOLLOW_SYMLINKS | RecursiveDirectoryIterator::SKIP_DOTS)
                        ),
                        $suffixes,
                        $prefixes,
                        $exclude
                    )
=======
                            new ExcludeIterator(
                                new RecursiveDirectoryIterator($path, FilesystemIterator::FOLLOW_SYMLINKS | FilesystemIterator::SKIP_DOTS),
                                $exclude,
                            ),
                        ),
                        $suffixes,
                        $prefixes,
                    ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                );
            }
        }

        return $iterator;
    }

<<<<<<< HEAD
    protected function getPathsAfterResolvingWildcards(array $paths): array
=======
    /**
     * @param list<non-empty-string> $paths
     *
     * @return list<non-empty-string>
     */
    private function resolveWildcards(array $paths): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $_paths = [[]];

        foreach ($paths as $path) {
<<<<<<< HEAD
            if ($locals = glob($path, GLOB_ONLYDIR)) {
                $_paths[] = array_map('\realpath', $locals);
            } else {
                $_paths[] = [realpath($path)];
            }
        }

        return array_filter(array_merge(...$_paths));
=======
            $pathEndsWithDirectorySeparator = str_ends_with($path, '/') || str_ends_with($path, DIRECTORY_SEPARATOR);

            if ($locals = $this->globstar($path)) {
                $_paths[] = array_map(
                    static function (string $local) use ($pathEndsWithDirectorySeparator): string|false
                    {
                        $realPath = realpath($local);

                        if ($realPath !== false && $pathEndsWithDirectorySeparator && is_dir($realPath)) {
                            return $realPath . DIRECTORY_SEPARATOR;
                        }

                        return $realPath;
                    },
                    $locals,
                );
            } else {
                // @codeCoverageIgnoreStart
                $realPath = realpath($path);

                if ($realPath !== false && $pathEndsWithDirectorySeparator && is_dir($realPath)) {
                    $_paths[] = [$realPath . DIRECTORY_SEPARATOR];
                } else {
                    $_paths[] = [$realPath];
                }
                // @codeCoverageIgnoreEnd
            }
        }

        return array_values(array_filter(array_merge(...$_paths)));
    }

    /**
     * @see https://gist.github.com/funkjedi/3feee27d873ae2297b8e2370a7082aad
     *
     * @return list<string>
     */
    private function globstar(string $pattern): array
    {
        if (stripos($pattern, '**') === false) {
            $files = glob($pattern, GLOB_ONLYDIR);
        } else {
            $position    = stripos($pattern, '**');
            $rootPattern = substr($pattern, 0, $position - 1);
            $restPattern = substr($pattern, $position + 2);

            $patterns = [$rootPattern . $restPattern];
            $rootPattern .= '/*';

            while ($directories = glob($rootPattern, GLOB_ONLYDIR)) {
                $rootPattern .= '/*';

                foreach ($directories as $directory) {
                    $patterns[] = $directory . $restPattern;
                }
            }

            $files = [];

            foreach ($patterns as $_pattern) {
                $files = array_merge($files, $this->globstar($_pattern));
            }
        }

        if ($files !== false) {
            $files = array_unique($files);

            sort($files);

            return $files;
        }

        // @codeCoverageIgnoreStart
        return [];
        // @codeCoverageIgnoreEnd
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
