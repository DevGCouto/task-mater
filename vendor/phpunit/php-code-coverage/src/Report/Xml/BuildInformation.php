<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Report\Xml;

<<<<<<< HEAD
use function constant;
use function phpversion;
use DateTimeImmutable;
use DOMElement;
=======
use function assert;
use function phpversion;
use DateTimeImmutable;
use DOMElement;
use SebastianBergmann\CodeCoverage\CodeCoverage;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use SebastianBergmann\Environment\Runtime;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class BuildInformation
{
<<<<<<< HEAD
    /**
     * @var DOMElement
     */
    private $contextNode;
=======
    private readonly DOMElement $contextNode;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(DOMElement $contextNode)
    {
        $this->contextNode = $contextNode;
    }

<<<<<<< HEAD
    public function setRuntimeInformation(Runtime $runtime): void
=======
    public function setRuntimeInformation(Runtime $runtime, CodeCoverage $coverage): void
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $runtimeNode = $this->nodeByName('runtime');

        $runtimeNode->setAttribute('name', $runtime->getName());
        $runtimeNode->setAttribute('version', $runtime->getVersion());
        $runtimeNode->setAttribute('url', $runtime->getVendorUrl());

        $driverNode = $this->nodeByName('driver');

<<<<<<< HEAD
        if ($runtime->hasPHPDBGCodeCoverage()) {
            $driverNode->setAttribute('name', 'phpdbg');
            $driverNode->setAttribute('version', constant('PHPDBG_VERSION'));
        }

        if ($runtime->hasXdebug()) {
            $driverNode->setAttribute('name', 'xdebug');
            $driverNode->setAttribute('version', phpversion('xdebug'));
        }

        if ($runtime->hasPCOV()) {
            $driverNode->setAttribute('name', 'pcov');
            $driverNode->setAttribute('version', phpversion('pcov'));
=======
        if ($coverage->driverIsPcov()) {
            $driverNode->setAttribute('name', 'pcov');
            $driverNode->setAttribute('version', phpversion('pcov'));
        } elseif ($coverage->driverIsXdebug()) {
            $driverNode->setAttribute('name', 'xdebug');
            $driverNode->setAttribute('version', phpversion('xdebug'));
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }
    }

    public function setBuildTime(DateTimeImmutable $date): void
    {
        $this->contextNode->setAttribute('time', $date->format('D M j G:i:s T Y'));
    }

    public function setGeneratorVersions(string $phpUnitVersion, string $coverageVersion): void
    {
        $this->contextNode->setAttribute('phpunit', $phpUnitVersion);
        $this->contextNode->setAttribute('coverage', $coverageVersion);
    }

    private function nodeByName(string $name): DOMElement
    {
        $node = $this->contextNode->getElementsByTagNameNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            $name
=======
            $name,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        )->item(0);

        if (!$node) {
            $node = $this->contextNode->appendChild(
                $this->contextNode->ownerDocument->createElementNS(
                    'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
                    $name
                )
            );
        }

=======
                    $name,
                ),
            );
        }

        assert($node instanceof DOMElement);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $node;
    }
}
