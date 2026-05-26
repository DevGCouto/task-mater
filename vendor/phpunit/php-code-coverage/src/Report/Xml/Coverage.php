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

use DOMElement;
use SebastianBergmann\CodeCoverage\ReportAlreadyFinalizedException;
use XMLWriter;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class Coverage
{
<<<<<<< HEAD
    /**
     * @var XMLWriter
     */
    private $writer;

    /**
     * @var DOMElement
     */
    private $contextNode;

    /**
     * @var bool
     */
    private $finalized = false;
=======
    private readonly XMLWriter $writer;
    private readonly DOMElement $contextNode;
    private bool $finalized = false;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(DOMElement $context, string $line)
    {
        $this->contextNode = $context;

        $this->writer = new XMLWriter;
        $this->writer->openMemory();
        $this->writer->startElementNS(null, $context->nodeName, 'https://schema.phpunit.de/coverage/1.0');
        $this->writer->writeAttribute('nr', $line);
    }

    /**
     * @throws ReportAlreadyFinalizedException
     */
    public function addTest(string $test): void
    {
        if ($this->finalized) {
            throw new ReportAlreadyFinalizedException;
        }

        $this->writer->startElement('covered');
        $this->writer->writeAttribute('by', $test);
        $this->writer->endElement();
    }

    public function finalize(): void
    {
        $this->writer->endElement();

        $fragment = $this->contextNode->ownerDocument->createDocumentFragment();
        $fragment->appendXML($this->writer->outputMemory());

        $this->contextNode->parentNode->replaceChild(
            $fragment,
<<<<<<< HEAD
            $this->contextNode
=======
            $this->contextNode,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        $this->finalized = true;
    }
}
