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
use function array_filter;
use function array_map;
use function preg_match;
use function realpath;
use function str_replace;
use function strlen;
use function strpos;
use function substr;
use FilterIterator;

class Iterator extends FilterIterator
{
    public const PREFIX = 0;

    public const SUFFIX = 1;

    /**
     * @var string
     */
    private $basePath;

    /**
     * @var array
     */
    private $suffixes = [];

    /**
     * @var array
     */
    private $prefixes = [];

    /**
     * @var array
     */
    private $exclude = [];

    public function __construct(string $basePath, \Iterator $iterator, array $suffixes = [], array $prefixes = [], array $exclude = [])
=======
use function preg_match;
use function realpath;
use function str_ends_with;
use function str_replace;
use function str_starts_with;
use FilterIterator;
use SplFileInfo;

/**
 * @template-extends FilterIterator<int, SplFileInfo, \Iterator>
 *
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-file-iterator
 */
final class Iterator extends FilterIterator
{
    public const PREFIX = 0;
    public const SUFFIX = 1;
    private false|string $basePath;

    /**
     * @var list<string>
     */
    private array $suffixes;

    /**
     * @var list<string>
     */
    private array $prefixes;

    /**
     * @param list<string> $suffixes
     * @param list<string> $prefixes
     */
    public function __construct(string $basePath, \Iterator $iterator, array $suffixes = [], array $prefixes = [])
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->basePath = realpath($basePath);
        $this->prefixes = $prefixes;
        $this->suffixes = $suffixes;
<<<<<<< HEAD
        $this->exclude  = array_filter(array_map('realpath', $exclude));
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        parent::__construct($iterator);
    }

    public function accept(): bool
    {
<<<<<<< HEAD
        $current  = $this->getInnerIterator()->current();
=======
        $current = $this->getInnerIterator()->current();

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $filename = $current->getFilename();
        $realPath = $current->getRealPath();

        if ($realPath === false) {
<<<<<<< HEAD
            return false;
=======
            // @codeCoverageIgnoreStart
            return false;
            // @codeCoverageIgnoreEnd
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $this->acceptPath($realPath) &&
               $this->acceptPrefix($filename) &&
               $this->acceptSuffix($filename);
    }

    private function acceptPath(string $path): bool
    {
        // Filter files in hidden directories by checking path that is relative to the base path.
<<<<<<< HEAD
        if (preg_match('=/\.[^/]*/=', str_replace($this->basePath, '', $path))) {
            return false;
        }

        foreach ($this->exclude as $exclude) {
            if (strpos($path, $exclude) === 0) {
                return false;
            }
        }

=======
        if (preg_match('=/\.[^/]*/=', str_replace((string) $this->basePath, '', $path))) {
            return false;
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return true;
    }

    private function acceptPrefix(string $filename): bool
    {
        return $this->acceptSubString($filename, $this->prefixes, self::PREFIX);
    }

    private function acceptSuffix(string $filename): bool
    {
        return $this->acceptSubString($filename, $this->suffixes, self::SUFFIX);
    }

<<<<<<< HEAD
=======
    /**
     * @param list<string> $subStrings
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function acceptSubString(string $filename, array $subStrings, int $type): bool
    {
        if (empty($subStrings)) {
            return true;
        }

<<<<<<< HEAD
        $matched = false;

        foreach ($subStrings as $string) {
            if (($type === self::PREFIX && strpos($filename, $string) === 0) ||
                ($type === self::SUFFIX &&
                 substr($filename, -1 * strlen($string)) === $string)) {
                $matched = true;

                break;
            }
        }

        return $matched;
=======
        foreach ($subStrings as $string) {
            if (($type === self::PREFIX && str_starts_with($filename, $string)) ||
                ($type === self::SUFFIX && str_ends_with($filename, $string))) {
                return true;
            }
        }

        return false;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
