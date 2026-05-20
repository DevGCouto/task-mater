<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Report;

<<<<<<< HEAD
use function dirname;
use function file_put_contents;
use function serialize;
use function strpos;
=======
use const PHP_EOL;
use function serialize;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Driver\WriteOperationFailedException;
use SebastianBergmann\CodeCoverage\Util\Filesystem;

final class PHP
{
<<<<<<< HEAD
=======
    /**
     * @param null|non-empty-string $target
     *
     * @throws WriteOperationFailedException
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function process(CodeCoverage $coverage, ?string $target = null): string
    {
        $coverage->clearCache();

        $buffer = "<?php
return \unserialize(<<<'END_OF_COVERAGE_SERIALIZATION'" . PHP_EOL . serialize($coverage) . PHP_EOL . 'END_OF_COVERAGE_SERIALIZATION' . PHP_EOL . ');';

        if ($target !== null) {
<<<<<<< HEAD
            if (!strpos($target, '://') !== false) {
                Filesystem::createDirectory(dirname($target));
            }

            if (@file_put_contents($target, $buffer) === false) {
                throw new WriteOperationFailedException($target);
            }
=======
            Filesystem::write($target, $buffer);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $buffer;
    }
}
