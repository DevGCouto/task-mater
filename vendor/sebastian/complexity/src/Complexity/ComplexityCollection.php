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

<<<<<<< HEAD
use function count;
=======
use function array_filter;
use function array_merge;
use function array_reverse;
use function array_values;
use function count;
use function usort;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use Countable;
use IteratorAggregate;

/**
<<<<<<< HEAD
 * @psalm-immutable
 */
final class ComplexityCollection implements Countable, IteratorAggregate
{
    /**
     * @psalm-var list<Complexity>
     */
    private $items = [];
=======
 * @template-implements IteratorAggregate<int, Complexity>
 *
 * @psalm-immutable
 */
final readonly class ComplexityCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<Complexity>
     */
    private array $items;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public static function fromList(Complexity ...$items): self
    {
        return new self($items);
    }

    /**
<<<<<<< HEAD
     * @psalm-param list<Complexity> $items
=======
     * @param list<Complexity> $items
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    private function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
<<<<<<< HEAD
     * @psalm-return list<Complexity>
=======
     * @return list<Complexity>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function asArray(): array
    {
        return $this->items;
    }

    public function getIterator(): ComplexityCollectionIterator
    {
        return new ComplexityCollectionIterator($this);
    }

<<<<<<< HEAD
=======
    /**
     * @return non-negative-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function count(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

<<<<<<< HEAD
=======
    /**
     * @return non-negative-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function cyclomaticComplexity(): int
    {
        $cyclomaticComplexity = 0;

        foreach ($this as $item) {
            $cyclomaticComplexity += $item->cyclomaticComplexity();
        }

        return $cyclomaticComplexity;
    }
<<<<<<< HEAD
=======

    public function isFunction(): self
    {
        return new self(
            array_values(
                array_filter(
                    $this->items,
                    static fn (Complexity $complexity): bool => $complexity->isFunction(),
                ),
            ),
        );
    }

    public function isMethod(): self
    {
        return new self(
            array_values(
                array_filter(
                    $this->items,
                    static fn (Complexity $complexity): bool => $complexity->isMethod(),
                ),
            ),
        );
    }

    public function mergeWith(self $other): self
    {
        return new self(
            array_merge(
                $this->asArray(),
                $other->asArray(),
            ),
        );
    }

    public function sortByDescendingCyclomaticComplexity(): self
    {
        $items = $this->items;

        usort(
            $items,
            static function (Complexity $a, Complexity $b): int
            {
                return $a->cyclomaticComplexity() <=> $b->cyclomaticComplexity();
            },
        );

        return new self(array_reverse($items));
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
