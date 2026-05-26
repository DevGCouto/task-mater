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

use function sprintf;
use DOMElement;
use DOMNode;
use SebastianBergmann\CodeCoverage\Util\Percentage;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class Totals
{
<<<<<<< HEAD
    /**
     * @var DOMNode
     */
    private $container;

    /**
     * @var DOMElement
     */
    private $linesNode;

    /**
     * @var DOMElement
     */
    private $methodsNode;

    /**
     * @var DOMElement
     */
    private $functionsNode;

    /**
     * @var DOMElement
     */
    private $classesNode;

    /**
     * @var DOMElement
     */
    private $traitsNode;
=======
    private readonly DOMNode $container;
    private readonly DOMElement $linesNode;
    private readonly DOMElement $methodsNode;
    private readonly DOMElement $functionsNode;
    private readonly DOMElement $classesNode;
    private readonly DOMElement $traitsNode;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(DOMElement $container)
    {
        $this->container = $container;
        $dom             = $container->ownerDocument;

        $this->linesNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'lines'
=======
            'lines',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->methodsNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'methods'
=======
            'methods',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->functionsNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'functions'
=======
            'functions',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->classesNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'classes'
=======
            'classes',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->traitsNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
<<<<<<< HEAD
            'traits'
=======
            'traits',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $container->appendChild($this->linesNode);
        $container->appendChild($this->methodsNode);
        $container->appendChild($this->functionsNode);
        $container->appendChild($this->classesNode);
        $container->appendChild($this->traitsNode);
    }

    public function container(): DOMNode
    {
        return $this->container;
    }

    public function setNumLines(int $loc, int $cloc, int $ncloc, int $executable, int $executed): void
    {
        $this->linesNode->setAttribute('total', (string) $loc);
        $this->linesNode->setAttribute('comments', (string) $cloc);
        $this->linesNode->setAttribute('code', (string) $ncloc);
        $this->linesNode->setAttribute('executable', (string) $executable);
        $this->linesNode->setAttribute('executed', (string) $executed);
        $this->linesNode->setAttribute(
            'percent',
<<<<<<< HEAD
            $executable === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($executed, $executable)->asFloat())
=======
            $executable === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($executed, $executable)->asFloat()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    public function setNumClasses(int $count, int $tested): void
    {
        $this->classesNode->setAttribute('count', (string) $count);
        $this->classesNode->setAttribute('tested', (string) $tested);
        $this->classesNode->setAttribute(
            'percent',
<<<<<<< HEAD
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat())
=======
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    public function setNumTraits(int $count, int $tested): void
    {
        $this->traitsNode->setAttribute('count', (string) $count);
        $this->traitsNode->setAttribute('tested', (string) $tested);
        $this->traitsNode->setAttribute(
            'percent',
<<<<<<< HEAD
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat())
=======
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    public function setNumMethods(int $count, int $tested): void
    {
        $this->methodsNode->setAttribute('count', (string) $count);
        $this->methodsNode->setAttribute('tested', (string) $tested);
        $this->methodsNode->setAttribute(
            'percent',
<<<<<<< HEAD
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat())
=======
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }

    public function setNumFunctions(int $count, int $tested): void
    {
        $this->functionsNode->setAttribute('count', (string) $count);
        $this->functionsNode->setAttribute('tested', (string) $tested);
        $this->functionsNode->setAttribute(
            'percent',
<<<<<<< HEAD
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat())
=======
            $count === 0 ? '0' : sprintf('%01.2F', Percentage::fromFractionAndTotal($tested, $count)->asFloat()),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
