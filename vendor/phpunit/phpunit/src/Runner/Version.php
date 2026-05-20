<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

use function array_slice;
<<<<<<< HEAD
use function assert;
use function dirname;
use function explode;
use function implode;
use function strpos;
=======
use function dirname;
use function explode;
use function implode;
use function str_contains;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\Version as VersionId;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class Version
{
<<<<<<< HEAD
    /**
     * @var string
     */
    private static $pharVersion = '';

    /**
     * @var string
     */
    private static $version = '';

    /**
     * Returns the current version of PHPUnit.
     *
     * @psalm-return non-empty-string
=======
    private static string $pharVersion = '';
    private static string $version     = '';

    /**
     * @return non-empty-string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function id(): string
    {
        if (self::$pharVersion !== '') {
            return self::$pharVersion;
        }

        if (self::$version === '') {
<<<<<<< HEAD
            self::$version = (new VersionId('9.6.34', dirname(__DIR__, 2)))->getVersion();

            assert(!empty(self::$version));
=======
            self::$version = (new VersionId('11.5.55', dirname(__DIR__, 2)))->asString();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return self::$version;
    }

    /**
<<<<<<< HEAD
     * @psalm-return non-empty-string
     */
    public static function series(): string
    {
        if (strpos(self::id(), '-')) {
            $version = explode('-', self::id())[0];
=======
     * @return non-empty-string
     */
    public static function series(): string
    {
        if (str_contains(self::id(), '-')) {
            $version = explode('-', self::id(), 2)[0];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        } else {
            $version = self::id();
        }

        return implode('.', array_slice(explode('.', $version), 0, 2));
    }

    /**
<<<<<<< HEAD
     * @psalm-return non-empty-string
=======
     * @return positive-int
     */
    public static function majorVersionNumber(): int
    {
        return (int) explode('.', self::series())[0];
    }

    /**
     * @return non-empty-string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function getVersionString(): string
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }
}
