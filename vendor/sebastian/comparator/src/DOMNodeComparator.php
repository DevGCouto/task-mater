<?php declare(strict_types=1);
/*
 * This file is part of sebastian/comparator.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Comparator;

<<<<<<< HEAD
use function sprintf;
use function strtolower;
=======
use function assert;
use function mb_strtolower;
use function sprintf;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use DOMDocument;
use DOMNode;
use ValueError;

<<<<<<< HEAD
/**
 * Compares DOMNode instances for equality.
 */
class DOMNodeComparator extends ObjectComparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
     * @return bool
     */
    public function accepts($expected, $actual)
=======
final class DOMNodeComparator extends ObjectComparator
{
    public function accepts(mixed $expected, mixed $actual): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $expected instanceof DOMNode && $actual instanceof DOMNode;
    }

    /**
<<<<<<< HEAD
     * Asserts that two values are equal.
     *
     * @param mixed $expected     First value to compare
     * @param mixed $actual       Second value to compare
     * @param float $delta        Allowed numerical distance between two values to consider them equal
     * @param bool  $canonicalize Arrays are sorted before comparison when set to true
     * @param bool  $ignoreCase   Case is ignored when set to true
     * @param array $processed    List of already processed elements (used to prevent infinite recursion)
     *
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = [])/*: void*/
    {
=======
     * @param array<mixed> $processed
     *
     * @throws ComparisonFailure
     */
    public function assertEquals(mixed $expected, mixed $actual, float $delta = 0.0, bool $canonicalize = false, bool $ignoreCase = false, array &$processed = []): void
    {
        assert($expected instanceof DOMNode);
        assert($actual instanceof DOMNode);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $expectedAsString = $this->nodeToText($expected, true, $ignoreCase);
        $actualAsString   = $this->nodeToText($actual, true, $ignoreCase);

        if ($expectedAsString !== $actualAsString) {
            $type = $expected instanceof DOMDocument ? 'documents' : 'nodes';

            throw new ComparisonFailure(
                $expected,
                $actual,
                $expectedAsString,
                $actualAsString,
<<<<<<< HEAD
                false,
                sprintf("Failed asserting that two DOM %s are equal.\n", $type)
=======
                sprintf("Failed asserting that two DOM %s are equal.\n", $type),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }
    }

    /**
     * Returns the normalized, whitespace-cleaned, and indented textual
     * representation of a DOMNode.
     */
    private function nodeToText(DOMNode $node, bool $canonicalize, bool $ignoreCase): string
    {
        if ($canonicalize) {
            $document = new DOMDocument;

            try {
<<<<<<< HEAD
                @$document->loadXML($node->C14N());
            } catch (ValueError $e) {
=======
                $c14n = $node->C14N();

                assert(!empty($c14n));

                @$document->loadXML($c14n);
            } catch (ValueError) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }

            $node = $document;
        }

<<<<<<< HEAD
        $document = $node instanceof DOMDocument ? $node : $node->ownerDocument;
=======
        if ($node instanceof DOMDocument) {
            $document = $node;
        } else {
            $document = $node->ownerDocument;
        }

        assert($document instanceof DOMDocument);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        $document->formatOutput = true;
        $document->normalizeDocument();

<<<<<<< HEAD
        $text = $node instanceof DOMDocument ? $node->saveXML() : $document->saveXML($node);

        return $ignoreCase ? strtolower($text) : $text;
=======
        if ($node instanceof DOMDocument) {
            $text = $node->saveXML();
        } else {
            $text = $document->saveXML($node);
        }

        assert($text !== false);

        if ($ignoreCase) {
            return mb_strtolower($text, 'UTF-8');
        }

        return $text;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
