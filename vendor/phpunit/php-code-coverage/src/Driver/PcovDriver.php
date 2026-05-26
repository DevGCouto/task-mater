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

use const pcov\inclusive;
use function array_intersect;
use function extension_loaded;
use function pcov\clear;
use function pcov\collect;
use function pcov\start;
use function pcov\stop;
use function pcov\waiting;
use function phpversion;
<<<<<<< HEAD
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\RawCodeCoverageData;
=======
use SebastianBergmann\CodeCoverage\Data\RawCodeCoverageData;
use SebastianBergmann\CodeCoverage\Filter;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class PcovDriver extends Driver
{
<<<<<<< HEAD
    /**
     * @var Filter
     */
    private $filter;
=======
    private readonly Filter $filter;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    /**
     * @throws PcovNotAvailableException
     */
    public function __construct(Filter $filter)
    {
<<<<<<< HEAD
        if (!extension_loaded('pcov')) {
            throw new PcovNotAvailableException;
        }
=======
        $this->ensurePcovIsAvailable();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $this->filter = $filter;
    }

    public function start(): void
    {
        start();
    }

    public function stop(): RawCodeCoverageData
    {
        stop();

        $filesToCollectCoverageFor = waiting();
        $collected                 = [];

        if ($filesToCollectCoverageFor) {
            if (!$this->filter->isEmpty()) {
                $filesToCollectCoverageFor = array_intersect($filesToCollectCoverageFor, $this->filter->files());
            }

            $collected = collect(inclusive, $filesToCollectCoverageFor);

            clear();
        }

        return RawCodeCoverageData::fromXdebugWithoutPathCoverage($collected);
    }

    public function nameAndVersion(): string
    {
        return 'PCOV ' . phpversion('pcov');
    }
<<<<<<< HEAD
=======

    public function isPcov(): true
    {
        return true;
    }

    /**
     * @throws PcovNotAvailableException
     */
    private function ensurePcovIsAvailable(): void
    {
        if (!extension_loaded('pcov')) {
            throw new PcovNotAvailableException;
        }
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
