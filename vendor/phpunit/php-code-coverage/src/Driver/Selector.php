<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Driver;

<<<<<<< HEAD
use function phpversion;
use function version_compare;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\NoCodeCoverageDriverAvailableException;
use SebastianBergmann\CodeCoverage\NoCodeCoverageDriverWithPathCoverageSupportAvailableException;
use SebastianBergmann\Environment\Runtime;

final class Selector
{
    /**
     * @throws NoCodeCoverageDriverAvailableException
     * @throws PcovNotAvailableException
<<<<<<< HEAD
     * @throws PhpdbgNotAvailableException
     * @throws Xdebug2NotEnabledException
     * @throws Xdebug3NotEnabledException
     * @throws XdebugNotAvailableException
=======
     * @throws XdebugNotAvailableException
     * @throws XdebugNotEnabledException
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function forLineCoverage(Filter $filter): Driver
    {
        $runtime = new Runtime;

<<<<<<< HEAD
        if ($runtime->hasPHPDBGCodeCoverage()) {
            return new PhpdbgDriver;
        }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($runtime->hasPCOV()) {
            return new PcovDriver($filter);
        }

        if ($runtime->hasXdebug()) {
<<<<<<< HEAD
            if (version_compare(phpversion('xdebug'), '3', '>=')) {
                $driver = new Xdebug3Driver($filter);
            } else {
                $driver = new Xdebug2Driver($filter);
            }
=======
            $driver = new XdebugDriver($filter);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

            $driver->enableDeadCodeDetection();

            return $driver;
        }

        throw new NoCodeCoverageDriverAvailableException;
    }

    /**
     * @throws NoCodeCoverageDriverWithPathCoverageSupportAvailableException
<<<<<<< HEAD
     * @throws Xdebug2NotEnabledException
     * @throws Xdebug3NotEnabledException
     * @throws XdebugNotAvailableException
=======
     * @throws XdebugNotAvailableException
     * @throws XdebugNotEnabledException
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function forLineAndPathCoverage(Filter $filter): Driver
    {
        if ((new Runtime)->hasXdebug()) {
<<<<<<< HEAD
            if (version_compare(phpversion('xdebug'), '3', '>=')) {
                $driver = new Xdebug3Driver($filter);
            } else {
                $driver = new Xdebug2Driver($filter);
            }
=======
            $driver = new XdebugDriver($filter);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

            $driver->enableDeadCodeDetection();
            $driver->enableBranchAndPathCoverage();

            return $driver;
        }

        throw new NoCodeCoverageDriverWithPathCoverageSupportAvailableException;
    }
}
