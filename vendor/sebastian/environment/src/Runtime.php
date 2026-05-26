<?php declare(strict_types=1);
/*
 * This file is part of sebastian/environment.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Environment;

use const PHP_BINARY;
<<<<<<< HEAD
use const PHP_BINDIR;
use const PHP_MAJOR_VERSION;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use const PHP_SAPI;
use const PHP_VERSION;
use function array_map;
use function array_merge;
<<<<<<< HEAD
use function defined;
use function escapeshellarg;
use function explode;
use function extension_loaded;
use function getenv;
use function ini_get;
use function is_readable;
=======
use function assert;
use function escapeshellarg;
use function explode;
use function extension_loaded;
use function in_array;
use function ini_get;
use function is_array;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function parse_ini_file;
use function php_ini_loaded_file;
use function php_ini_scanned_files;
use function phpversion;
use function sprintf;
<<<<<<< HEAD
use function strpos;

/**
 * Utility class for HHVM/PHP environment handling.
 */
final class Runtime
{
    /**
     * @var string
     */
    private static $binary;

    /**
=======
use function strrpos;
use function version_compare;
use function xdebug_info;

final class Runtime
{
    /**
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * Returns true when Xdebug or PCOV is available or
     * the runtime used is PHPDBG.
     */
    public function canCollectCodeCoverage(): bool
    {
<<<<<<< HEAD
        return $this->hasXdebug() || $this->hasPCOV() || $this->hasPHPDBGCodeCoverage();
=======
        if ($this->hasPHPDBGCodeCoverage()) {
            return true;
        }

        if ($this->hasPCOV()) {
            return true;
        }

        if (!$this->hasXdebug()) {
            return false;
        }

        $xdebugVersion = phpversion('xdebug');

        assert($xdebugVersion !== false);

        if (version_compare($xdebugVersion, '3', '<')) {
            return true;
        }

        $xdebugMode = xdebug_info('mode');

        assert(is_array($xdebugMode));

        if (in_array('coverage', $xdebugMode, true)) {
            return true;
        }

        return false;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns true when Zend OPcache is loaded, enabled,
     * and is configured to discard comments.
     */
    public function discardsComments(): bool
    {
        if (!$this->isOpcacheActive()) {
            return false;
        }

        if (ini_get('opcache.save_comments') !== '0') {
            return false;
        }

        return true;
    }

    /**
     * Returns true when Zend OPcache is loaded, enabled,
     * and is configured to perform just-in-time compilation.
     */
    public function performsJustInTimeCompilation(): bool
    {
<<<<<<< HEAD
        if (PHP_MAJOR_VERSION < 8) {
            return false;
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if (!$this->isOpcacheActive()) {
            return false;
        }

<<<<<<< HEAD
        if (strpos(ini_get('opcache.jit'), '0') === 0) {
=======
        if (ini_get('opcache.jit_buffer_size') === '0') {
            return false;
        }

        $jit = (string) ini_get('opcache.jit');

        if (($jit === 'disable') || ($jit === 'off')) {
            return false;
        }

        if (strrpos($jit, '0') === 3) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            return false;
        }

        return true;
    }

    /**
<<<<<<< HEAD
     * Returns the path to the binary of the current runtime.
     * Appends ' --php' to the path when the runtime is HHVM.
     */
    public function getBinary(): string
    {
        // HHVM
        if (self::$binary === null && $this->isHHVM()) {
            // @codeCoverageIgnoreStart
            if ((self::$binary = getenv('PHP_BINARY')) === false) {
                self::$binary = PHP_BINARY;
            }

            self::$binary = escapeshellarg(self::$binary) . ' --php' .
                ' -d hhvm.php7.all=1';
            // @codeCoverageIgnoreEnd
        }

        if (self::$binary === null && PHP_BINARY !== '') {
            self::$binary = escapeshellarg(PHP_BINARY);
        }

        if (self::$binary === null) {
            // @codeCoverageIgnoreStart
            $possibleBinaryLocations = [
                PHP_BINDIR . '/php',
                PHP_BINDIR . '/php-cli.exe',
                PHP_BINDIR . '/php.exe',
            ];

            foreach ($possibleBinaryLocations as $binary) {
                if (is_readable($binary)) {
                    self::$binary = escapeshellarg($binary);

                    break;
                }
            }
            // @codeCoverageIgnoreEnd
        }

        if (self::$binary === null) {
            // @codeCoverageIgnoreStart
            self::$binary = 'php';
            // @codeCoverageIgnoreEnd
        }

        return self::$binary;
=======
     * Returns the raw path to the binary of the current runtime.
     *
     * @deprecated
     */
    public function getRawBinary(): string
    {
        return PHP_BINARY;
    }

    /**
     * Returns the escaped path to the binary of the current runtime.
     *
     * @deprecated
     */
    public function getBinary(): string
    {
        return escapeshellarg(PHP_BINARY);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function getNameWithVersion(): string
    {
        return $this->getName() . ' ' . $this->getVersion();
    }

    public function getNameWithVersionAndCodeCoverageDriver(): string
    {
<<<<<<< HEAD
        if (!$this->canCollectCodeCoverage() || $this->hasPHPDBGCodeCoverage()) {
            return $this->getNameWithVersion();
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($this->hasPCOV()) {
            return sprintf(
                '%s with PCOV %s',
                $this->getNameWithVersion(),
<<<<<<< HEAD
                phpversion('pcov')
=======
                phpversion('pcov'),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        if ($this->hasXdebug()) {
            return sprintf(
                '%s with Xdebug %s',
                $this->getNameWithVersion(),
<<<<<<< HEAD
                phpversion('xdebug')
            );
        }
=======
                phpversion('xdebug'),
            );
        }

        return $this->getNameWithVersion();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function getName(): string
    {
<<<<<<< HEAD
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return 'HHVM';
            // @codeCoverageIgnoreEnd
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($this->isPHPDBG()) {
            // @codeCoverageIgnoreStart
            return 'PHPDBG';
            // @codeCoverageIgnoreEnd
        }

        return 'PHP';
    }

    public function getVendorUrl(): string
    {
<<<<<<< HEAD
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return 'http://hhvm.com/';
            // @codeCoverageIgnoreEnd
        }

        return 'https://secure.php.net/';
=======
        return 'https://www.php.net/';
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function getVersion(): string
    {
<<<<<<< HEAD
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return HHVM_VERSION;
            // @codeCoverageIgnoreEnd
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return PHP_VERSION;
    }

    /**
     * Returns true when the runtime used is PHP and Xdebug is loaded.
     */
    public function hasXdebug(): bool
    {
<<<<<<< HEAD
        return ($this->isPHP() || $this->isHHVM()) && extension_loaded('xdebug');
    }

    /**
     * Returns true when the runtime used is HHVM.
     */
    public function isHHVM(): bool
    {
        return defined('HHVM_VERSION');
=======
        return $this->isPHP() && extension_loaded('xdebug');
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns true when the runtime used is PHP without the PHPDBG SAPI.
     */
    public function isPHP(): bool
    {
<<<<<<< HEAD
        return !$this->isHHVM() && !$this->isPHPDBG();
=======
        return !$this->isPHPDBG();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns true when the runtime used is PHP with the PHPDBG SAPI.
     */
    public function isPHPDBG(): bool
    {
<<<<<<< HEAD
        return PHP_SAPI === 'phpdbg' && !$this->isHHVM();
=======
        return PHP_SAPI === 'phpdbg';
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns true when the runtime used is PHP with the PHPDBG SAPI
     * and the phpdbg_*_oplog() functions are available (PHP >= 7.0).
     */
    public function hasPHPDBGCodeCoverage(): bool
    {
        return $this->isPHPDBG();
    }

    /**
     * Returns true when the runtime used is PHP with PCOV loaded and enabled.
     */
    public function hasPCOV(): bool
    {
        return $this->isPHP() && extension_loaded('pcov') && ini_get('pcov.enabled');
    }

    /**
     * Parses the loaded php.ini file (if any) as well as all
     * additional php.ini files from the additional ini dir for
     * a list of all configuration settings loaded from files
     * at startup. Then checks for each php.ini setting passed
     * via the `$values` parameter whether this setting has
     * been changed at runtime. Returns an array of strings
     * where each string has the format `key=value` denoting
     * the name of a changed php.ini setting with its new value.
     *
<<<<<<< HEAD
     * @return string[]
=======
     * @param list<string> $values
     *
     * @return array<string, string>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function getCurrentSettings(array $values): array
    {
        $diff  = [];
        $files = [];

        if ($file = php_ini_loaded_file()) {
            $files[] = $file;
        }

        if ($scanned = php_ini_scanned_files()) {
            $files = array_merge(
                $files,
                array_map(
                    'trim',
<<<<<<< HEAD
                    explode(",\n", $scanned)
                )
=======
                    explode(",\n", $scanned),
                ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        foreach ($files as $ini) {
            $config = parse_ini_file($ini, true);

            foreach ($values as $value) {
                $set = ini_get($value);

                if (empty($set)) {
                    continue;
                }

                if ((!isset($config[$value]) || ($set !== $config[$value]))) {
                    $diff[$value] = sprintf('%s=%s', $value, $set);
                }
            }
        }

        return $diff;
    }

    private function isOpcacheActive(): bool
    {
        if (!extension_loaded('Zend OPcache')) {
            return false;
        }

        if ((PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') && ini_get('opcache.enable_cli') === '1') {
            return true;
        }

        if (PHP_SAPI !== 'cli' && PHP_SAPI !== 'phpdbg' && ini_get('opcache.enable') === '1') {
            return true;
        }

        return false;
    }
}
