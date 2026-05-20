<?php declare(strict_types=1);
/*
 * This file is part of sebastian/code-unit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeUnit;

use function array_merge;
use function count;
use Countable;
use IteratorAggregate;

<<<<<<< HEAD
final class CodeUnitCollection implements Countable, IteratorAggregate
{
    /**
     * @psalm-var list<CodeUnit>
     */
    private $codeUnits = [];

    /**
     * @psalm-param list<CodeUnit> $items
     */
    public static function fromArray(array $items): self
    {
        $collection = new self;

        foreach ($items as $item) {
            $collection->add($item);
        }

        return $collection;
    }

    public static function fromList(CodeUnit ...$items): self
    {
        return self::fromArray($items);
    }

    private function __construct()
    {
    }

    /**
     * @psalm-return list<CodeUnit>
=======
/**
 * @template-implements IteratorAggregate<int, CodeUnit>
 *
 * @immutable
 */
final readonly class CodeUnitCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<CodeUnit>
     */
    private array $codeUnits;

    public static function fromList(CodeUnit ...$codeUnits): self
    {
        // @phpstan-ignore argument.type
        return new self($codeUnits);
    }

    /**
     * @param list<CodeUnit> $codeUnits
     */
    private function __construct(array $codeUnits)
    {
        $this->codeUnits = $codeUnits;
    }

    /**
     * @return list<CodeUnit>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function asArray(): array
    {
        return $this->codeUnits;
    }

    public function getIterator(): CodeUnitCollectionIterator
    {
        return new CodeUnitCollectionIterator($this);
    }

    public function count(): int
    {
        return count($this->codeUnits);
    }

    public function isEmpty(): bool
    {
<<<<<<< HEAD
        return empty($this->codeUnits);
=======
        return $this->codeUnits === [];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function mergeWith(self $other): self
    {
<<<<<<< HEAD
        return self::fromArray(
            array_merge(
                $this->asArray(),
                $other->asArray()
            )
        );
    }

    private function add(CodeUnit $item): void
    {
        $this->codeUnits[] = $item;
    }
=======
        return new self(
            array_merge(
                $this->asArray(),
                $other->asArray(),
            ),
        );
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
