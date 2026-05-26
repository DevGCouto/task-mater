<?php declare(strict_types=1);
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Diff;

<<<<<<< HEAD
final class Diff
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var Chunk[]
     */
    private $chunks;

    /**
     * @param Chunk[] $chunks
=======
use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @template-implements IteratorAggregate<int, Chunk>
 */
final class Diff implements IteratorAggregate
{
    /**
     * @var non-empty-string
     */
    private string $from;

    /**
     * @var non-empty-string
     */
    private string $to;

    /**
     * @var list<Chunk>
     */
    private array $chunks;

    /**
     * @param non-empty-string $from
     * @param non-empty-string $to
     * @param list<Chunk>      $chunks
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function __construct(string $from, string $to, array $chunks = [])
    {
        $this->from   = $from;
        $this->to     = $to;
        $this->chunks = $chunks;
    }

<<<<<<< HEAD
    public function getFrom(): string
=======
    /**
     * @return non-empty-string
     */
    public function from(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->from;
    }

<<<<<<< HEAD
    public function getTo(): string
=======
    /**
     * @return non-empty-string
     */
    public function to(): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->to;
    }

    /**
<<<<<<< HEAD
     * @return Chunk[]
     */
    public function getChunks(): array
=======
     * @return list<Chunk>
     */
    public function chunks(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->chunks;
    }

    /**
<<<<<<< HEAD
     * @param Chunk[] $chunks
=======
     * @param list<Chunk> $chunks
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function setChunks(array $chunks): void
    {
        $this->chunks = $chunks;
    }
<<<<<<< HEAD
=======

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->chunks);
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
