<?php declare(strict_types=1);
/*
 * This file is part of sebastian/complexity.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Complexity;

use function assert;
use function is_array;
use PhpParser\Node;
<<<<<<< HEAD
=======
use PhpParser\Node\Expr\New_;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PhpParser\Node\Name;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
<<<<<<< HEAD
use PhpParser\Node\Stmt\Trait_;
use PhpParser\NodeTraverser;
=======
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use PhpParser\NodeVisitorAbstract;

final class ComplexityCalculatingVisitor extends NodeVisitorAbstract
{
    /**
<<<<<<< HEAD
     * @psalm-var list<Complexity>
     */
    private $result = [];

    /**
     * @var bool
     */
    private $shortCircuitTraversal;
=======
     * @var list<Complexity>
     */
    private array $result = [];
    private bool $shortCircuitTraversal;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(bool $shortCircuitTraversal)
    {
        $this->shortCircuitTraversal = $shortCircuitTraversal;
    }

    public function enterNode(Node $node): ?int
    {
        if (!$node instanceof ClassMethod && !$node instanceof Function_) {
            return null;
        }

        if ($node instanceof ClassMethod) {
<<<<<<< HEAD
=======
            if ($node->getAttribute('parent') instanceof Interface_) {
                return null;
            }

            if ($node->isAbstract()) {
                return null;
            }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $name = $this->classMethodName($node);
        } else {
            $name = $this->functionName($node);
        }

        $statements = $node->getStmts();

        assert(is_array($statements));

        $this->result[] = new Complexity(
            $name,
<<<<<<< HEAD
            $this->cyclomaticComplexity($statements)
        );

        if ($this->shortCircuitTraversal) {
            return NodeTraverser::DONT_TRAVERSE_CHILDREN;
=======
            $this->cyclomaticComplexity($statements),
        );

        if ($this->shortCircuitTraversal) {
            return NodeVisitor::DONT_TRAVERSE_CHILDREN;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return null;
    }

    public function result(): ComplexityCollection
    {
        return ComplexityCollection::fromList(...$this->result);
    }

    /**
     * @param Stmt[] $statements
<<<<<<< HEAD
=======
     *
     * @return positive-int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    private function cyclomaticComplexity(array $statements): int
    {
        $traverser = new NodeTraverser;

        $cyclomaticComplexityCalculatingVisitor = new CyclomaticComplexityCalculatingVisitor;

        $traverser->addVisitor($cyclomaticComplexityCalculatingVisitor);

        /* @noinspection UnusedFunctionResultInspection */
        $traverser->traverse($statements);

        return $cyclomaticComplexityCalculatingVisitor->cyclomaticComplexity();
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function classMethodName(ClassMethod $node): string
    {
        $parent = $node->getAttribute('parent');

        assert($parent instanceof Class_ || $parent instanceof Trait_);
<<<<<<< HEAD
=======

        if ($parent->getAttribute('parent') instanceof New_) {
            return 'anonymous class';
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        assert(isset($parent->namespacedName));
        assert($parent->namespacedName instanceof Name);

        return $parent->namespacedName->toString() . '::' . $node->name->toString();
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function functionName(Function_ $node): string
    {
        assert(isset($node->namespacedName));
        assert($node->namespacedName instanceof Name);

<<<<<<< HEAD
        return $node->namespacedName->toString();
=======
        $functionName = $node->namespacedName->toString();

        assert($functionName !== '');

        return $functionName;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
