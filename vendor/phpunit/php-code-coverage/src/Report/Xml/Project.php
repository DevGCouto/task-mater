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

use DOMDocument;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class Project extends Node
{
    public function __construct(string $directory)
    {
        $this->init();
        $this->setProjectSourceDirectory($directory);
    }

    public function projectSourceDirectory(): string
    {
        return $this->contextNode()->getAttribute('source');
    }

    public function buildInformation(): BuildInformation
    {
        $buildNode = $this->dom()->getElementsByTagNameNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'build'
=======
            'build',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        )->item(0);

        if (!$buildNode) {
            $buildNode = $this->dom()->documentElement->appendChild(
                $this->dom()->createElementNS(
                    'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
                    'build'
                )
=======
                    'build',
                ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return new BuildInformation($buildNode);
    }

    public function tests(): Tests
    {
        $testsNode = $this->contextNode()->getElementsByTagNameNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'tests'
=======
            'tests',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        )->item(0);

        if (!$testsNode) {
            $testsNode = $this->contextNode()->appendChild(
                $this->dom()->createElementNS(
                    'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
                    'tests'
                )
=======
                    'tests',
                ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return new Tests($testsNode);
    }

    public function asDom(): DOMDocument
    {
        return $this->dom();
    }

    private function init(): void
    {
        $dom = new DOMDocument;
        $dom->loadXML('<?xml version="1.0" ?><phpunit xmlns="https://schema.phpunit.de/coverage/1.0"><build/><project/></phpunit>');

        $this->setContextNode(
            $dom->getElementsByTagNameNS(
                'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
                'project'
            )->item(0)
=======
                'project',
            )->item(0),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    private function setProjectSourceDirectory(string $name): void
    {
        $this->contextNode()->setAttribute('source', $name);
    }
}
