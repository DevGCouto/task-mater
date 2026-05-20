<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\StaticAnalysis;

<<<<<<< HEAD
use function array_merge;
use function assert;
use function range;
use function strpos;
=======
use function assert;
use function str_contains;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PhpParser\Node;
use PhpParser\Node\Attribute;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
<<<<<<< HEAD
=======
use PhpParser\Node\Stmt\Enum_;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\NodeVisitorAbstract;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class IgnoredLinesFindingVisitor extends NodeVisitorAbstract
{
    /**
<<<<<<< HEAD
     * @psalm-var list<int>
     */
    private $ignoredLines = [];

    /**
     * @var bool
     */
    private $useAnnotationsForIgnoringCode;

    /**
     * @var bool
     */
    private $ignoreDeprecated;
=======
     * @var array<int>
     */
    private array $ignoredLines = [];
    private readonly bool $useAnnotationsForIgnoringCode;
    private readonly bool $ignoreDeprecated;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(bool $useAnnotationsForIgnoringCode, bool $ignoreDeprecated)
    {
        $this->useAnnotationsForIgnoringCode = $useAnnotationsForIgnoringCode;
        $this->ignoreDeprecated              = $ignoreDeprecated;
    }

    public function enterNode(Node $node): void
    {
        if (!$node instanceof Class_ &&
            !$node instanceof Trait_ &&
            !$node instanceof Interface_ &&
<<<<<<< HEAD
=======
            !$node instanceof Enum_ &&
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            !$node instanceof ClassMethod &&
            !$node instanceof Function_ &&
            !$node instanceof Attribute) {
            return;
        }

        if ($node instanceof Class_ && $node->isAnonymous()) {
            return;
        }

        if ($node instanceof Class_ ||
            $node instanceof Trait_ ||
            $node instanceof Interface_ ||
            $node instanceof Attribute) {
            $this->ignoredLines[] = $node->getStartLine();

            assert($node->name !== null);

            // Workaround for https://github.com/nikic/PHP-Parser/issues/886
            $this->ignoredLines[] = $node->name->getStartLine();
        }

        if (!$this->useAnnotationsForIgnoringCode) {
            return;
        }

        if ($node instanceof Interface_) {
            return;
        }

<<<<<<< HEAD
=======
        if ($node instanceof Attribute &&
            $node->name->toString() === 'PHPUnit\Framework\Attributes\CodeCoverageIgnore') {
            $attributeGroup = $node->getAttribute('parent');
            $attributedNode = $attributeGroup->getAttribute('parent');

            for ($line = $attributedNode->getStartLine(); $line <= $attributedNode->getEndLine(); $line++) {
                $this->ignoredLines[] = $line;
            }

            return;
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->processDocComment($node);
    }

    /**
<<<<<<< HEAD
     * @psalm-return list<int>
=======
     * @return array<int>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function ignoredLines(): array
    {
        return $this->ignoredLines;
    }

    private function processDocComment(Node $node): void
    {
        $docComment = $node->getDocComment();

        if ($docComment === null) {
            return;
        }

<<<<<<< HEAD
        if (strpos($docComment->getText(), '@codeCoverageIgnore') !== false) {
            $this->ignoredLines = array_merge(
                $this->ignoredLines,
                range($node->getStartLine(), $node->getEndLine())
            );
        }

        if ($this->ignoreDeprecated && strpos($docComment->getText(), '@deprecated') !== false) {
            $this->ignoredLines = array_merge(
                $this->ignoredLines,
                range($node->getStartLine(), $node->getEndLine())
            );
=======
        if (str_contains($docComment->getText(), '@codeCoverageIgnore')) {
            for ($line = $node->getStartLine(); $line <= $node->getEndLine(); $line++) {
                $this->ignoredLines[] = $line;
            }
        }

        if ($this->ignoreDeprecated && str_contains($docComment->getText(), '@deprecated')) {
            for ($line = $node->getStartLine(); $line <= $node->getEndLine(); $line++) {
                $this->ignoredLines[] = $line;
            }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }
    }
}
