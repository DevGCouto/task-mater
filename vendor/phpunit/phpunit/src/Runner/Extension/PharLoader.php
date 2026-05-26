<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Extension;

use function count;
use function explode;
<<<<<<< HEAD
use function implode;
use function is_file;
use function strpos;
=======
use function extension_loaded;
use function implode;
use function is_file;
use function sprintf;
use function str_contains;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PharIo\Manifest\ApplicationName;
use PharIo\Manifest\Exception as ManifestException;
use PharIo\Manifest\ManifestLoader;
use PharIo\Version\Version as PharIoVersion;
<<<<<<< HEAD
use PHPUnit\Runner\Version;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class PharLoader
{
    /**
     * @psalm-return array{loadedExtensions: list<string>, notLoadedExtensions: list<string>}
     */
    public function loadPharExtensionsInDirectory(string $directory): array
    {
        $loadedExtensions    = [];
        $notLoadedExtensions = [];

        foreach ((new FileIteratorFacade)->getFilesAsArray($directory, '.phar') as $file) {
            if (!is_file('phar://' . $file . '/manifest.xml')) {
                $notLoadedExtensions[] = $file . ' is not an extension for PHPUnit';
=======
use PHPUnit\Event;
use PHPUnit\Runner\Version;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;
use Throwable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class PharLoader
{
    /**
     * @param non-empty-string $directory
     *
     * @return list<string>
     */
    public function loadPharExtensionsInDirectory(string $directory): array
    {
        $pharExtensionLoaded = extension_loaded('phar');
        $loadedExtensions    = [];

        foreach ((new FileIteratorFacade)->getFilesAsArray($directory, '.phar') as $file) {
            if (!$pharExtensionLoaded) {
                Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                    sprintf(
                        'Cannot load extension from %s because the PHAR extension is not available',
                        $file,
                    ),
                );

                continue;
            }

            if (!is_file('phar://' . $file . '/manifest.xml')) {
                Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                    sprintf(
                        '%s is not an extension for PHPUnit',
                        $file,
                    ),
                );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                continue;
            }

            try {
                $applicationName = new ApplicationName('phpunit/phpunit');
                $version         = new PharIoVersion($this->phpunitVersion());
                $manifest        = ManifestLoader::fromFile('phar://' . $file . '/manifest.xml');

                if (!$manifest->isExtensionFor($applicationName)) {
<<<<<<< HEAD
                    $notLoadedExtensions[] = $file . ' is not an extension for PHPUnit';
=======
                    Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                        sprintf(
                            '%s is not an extension for PHPUnit',
                            $file,
                        ),
                    );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                    continue;
                }

                if (!$manifest->isExtensionFor($applicationName, $version)) {
<<<<<<< HEAD
                    $notLoadedExtensions[] = $file . ' is not compatible with this version of PHPUnit';
=======
                    Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                        sprintf(
                            '%s is not compatible with PHPUnit %s',
                            $file,
                            Version::series(),
                        ),
                    );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                    continue;
                }
            } catch (ManifestException $e) {
<<<<<<< HEAD
                $notLoadedExtensions[] = $file . ': ' . $e->getMessage();
=======
                Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                    sprintf(
                        'Cannot load extension from %s: %s',
                        $file,
                        $e->getMessage(),
                    ),
                );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

                continue;
            }

<<<<<<< HEAD
            /**
             * @noinspection PhpIncludeInspection
             *
             * @psalm-suppress UnresolvableInclude
             */
            require $file;

            $loadedExtensions[] = $manifest->getName()->asString() . ' ' . $manifest->getVersion()->getVersionString();
        }

        return [
            'loadedExtensions'    => $loadedExtensions,
            'notLoadedExtensions' => $notLoadedExtensions,
        ];
=======
            try {
                @require $file;
            } catch (Throwable $t) {
                Event\Facade::emitter()->testRunnerTriggeredPhpunitWarning(
                    sprintf(
                        'Cannot load extension from %s: %s',
                        $file,
                        $t->getMessage(),
                    ),
                );

                continue;
            }

            $loadedExtensions[] = $manifest->getName()->asString() . ' ' . $manifest->getVersion()->getVersionString();

            Event\Facade::emitter()->testRunnerLoadedExtensionFromPhar(
                $file,
                $manifest->getName()->asString(),
                $manifest->getVersion()->getVersionString(),
            );
        }

        return $loadedExtensions;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    private function phpunitVersion(): string
    {
        $version = Version::id();

<<<<<<< HEAD
        if (strpos($version, '-') === false) {
=======
        if (!str_contains($version, '-')) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            return $version;
        }

        $parts = explode('.', explode('-', $version)[0]);

        if (count($parts) === 2) {
            $parts[] = 0;
        }

        return implode('.', $parts);
    }
}
