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

use const DIRECTORY_SEPARATOR;
<<<<<<< HEAD
use function array_keys;
use function array_map;
use function array_values;
use function count;
use function explode;
use function implode;
use function min;
use function preg_replace;
use function preg_replace_callback;
use function sprintf;
=======
use const PHP_EOL;
use function array_map;
use function array_walk;
use function count;
use function explode;
use function implode;
use function max;
use function min;
use function preg_replace;
use function preg_replace_callback;
use function preg_split;
use function sprintf;
use function str_pad;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function strtr;
use function trim;

/**
<<<<<<< HEAD
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Color
{
    /**
     * @var array<string,string>
     */
    private const WHITESPACE_MAP = [
        ' '  => '·',
        "\t" => '⇥',
    ];

    /**
     * @var array<string,string>
     */
    private const WHITESPACE_EOL_MAP = [
        ' '  => '·',
        "\t" => '⇥',
        "\n" => '↵',
        "\r" => '⟵',
    ];

    /**
     * @var array<string,string>
     */
<<<<<<< HEAD
    private static $ansiCodes = [
=======
    private static array $ansiCodes = [
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        'reset'      => '0',
        'bold'       => '1',
        'dim'        => '2',
        'dim-reset'  => '22',
        'underlined' => '4',
        'fg-default' => '39',
        'fg-black'   => '30',
        'fg-red'     => '31',
        'fg-green'   => '32',
        'fg-yellow'  => '33',
        'fg-blue'    => '34',
        'fg-magenta' => '35',
        'fg-cyan'    => '36',
        'fg-white'   => '37',
        'bg-default' => '49',
        'bg-black'   => '40',
        'bg-red'     => '41',
        'bg-green'   => '42',
        'bg-yellow'  => '43',
        'bg-blue'    => '44',
        'bg-magenta' => '45',
        'bg-cyan'    => '46',
        'bg-white'   => '47',
    ];

    public static function colorize(string $color, string $buffer): string
    {
        if (trim($buffer) === '') {
            return $buffer;
        }

        $codes  = array_map('\trim', explode(',', $color));
        $styles = [];

        foreach ($codes as $code) {
            if (isset(self::$ansiCodes[$code])) {
<<<<<<< HEAD
                $styles[] = self::$ansiCodes[$code] ?? '';
=======
                $styles[] = self::$ansiCodes[$code];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }
        }

        if (empty($styles)) {
            return $buffer;
        }

        return self::optimizeColor(sprintf("\x1b[%sm", implode(';', $styles)) . $buffer . "\x1b[0m");
    }

<<<<<<< HEAD
    public static function colorizePath(string $path, ?string $prevPath = null, bool $colorizeFilename = false): string
    {
        if ($prevPath === null) {
            $prevPath = '';
        }

        $path     = explode(DIRECTORY_SEPARATOR, $path);
        $prevPath = explode(DIRECTORY_SEPARATOR, $prevPath);

        for ($i = 0; $i < min(count($path), count($prevPath)); $i++) {
            if ($path[$i] == $prevPath[$i]) {
=======
    public static function colorizeTextBox(string $color, string $buffer, ?int $columns = null): string
    {
        $lines       = preg_split('/\r\n|\r|\n/', $buffer);
        $maxBoxWidth = max(array_map('\strlen', $lines));

        if ($columns !== null) {
            $maxBoxWidth = min($maxBoxWidth, $columns);
        }

        array_walk($lines, static function (string &$line) use ($color, $maxBoxWidth): void
        {
            $line = self::colorize($color, str_pad($line, $maxBoxWidth));
        });

        return implode(PHP_EOL, $lines);
    }

    public static function colorizePath(string $path, ?string $previousPath = null, bool $colorizeFilename = false): string
    {
        if ($previousPath === null) {
            $previousPath = '';
        }

        $path         = explode(DIRECTORY_SEPARATOR, $path);
        $previousPath = explode(DIRECTORY_SEPARATOR, $previousPath);

        for ($i = 0; $i < min(count($path), count($previousPath)); $i++) {
            if ($path[$i] === $previousPath[$i]) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $path[$i] = self::dim($path[$i]);
            }
        }

        if ($colorizeFilename) {
            $last        = count($path) - 1;
            $path[$last] = preg_replace_callback(
<<<<<<< HEAD
                '/([\-_\.]+|phpt$)/',
                static function ($matches)
                {
                    return self::dim($matches[0]);
                },
=======
                '/([\-_.]+|phpt$)/',
                static fn ($matches) => self::dim($matches[0]),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $path[$last],
            );
        }

        return self::optimizeColor(implode(self::dim(DIRECTORY_SEPARATOR), $path));
    }

    public static function dim(string $buffer): string
    {
        if (trim($buffer) === '') {
            return $buffer;
        }

        return "\e[2m{$buffer}\e[22m";
    }

    public static function visualizeWhitespace(string $buffer, bool $visualizeEOL = false): string
    {
        $replaceMap = $visualizeEOL ? self::WHITESPACE_EOL_MAP : self::WHITESPACE_MAP;

<<<<<<< HEAD
        return preg_replace_callback('/\s+/', static function ($matches) use ($replaceMap)
        {
            return self::dim(strtr($matches[0], $replaceMap));
        }, $buffer);
=======
        return preg_replace_callback(
            '/\s+/',
            static fn ($matches) => self::dim(strtr($matches[0], $replaceMap)),
            $buffer,
        );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private static function optimizeColor(string $buffer): string
    {
<<<<<<< HEAD
        $patterns = [
            "/\e\\[22m\e\\[2m/"                   => '',
            "/\e\\[([^m]*)m\e\\[([1-9][0-9;]*)m/" => "\e[$1;$2m",
            "/(\e\\[[^m]*m)+(\e\\[0m)/"           => '$2',
        ];

        return preg_replace(array_keys($patterns), array_values($patterns), $buffer);
=======
        return preg_replace(
            [
                "/\e\\[22m\e\\[2m/",
                "/\e\\[([^m]*)m\e\\[([1-9][0-9;]*)m/",
                "/(\e\\[[^m]*m)+(\e\\[0m)/",
            ],
            [
                '',
                "\e[$1;$2m",
                '$2',
            ],
            $buffer,
        );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
