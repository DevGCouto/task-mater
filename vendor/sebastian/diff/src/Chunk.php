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
final class Chunk
{
    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $startRange;

    /**
     * @var int
     */
    private $end;

    /**
     * @var int
     */
    private $endRange;

    /**
     * @var Line[]
     */
    private $lines;

=======
use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @template-implements IteratorAggregate<int, Line>
 */
final class Chunk implements IteratorAggregate
{
    private int $start;
    private int $startRange;
    private int $end;
    private int $endRange;

    /**
     * @var list<Line>
     */
    private array $lines;

    /**
     * @param list<Line> $lines
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct(int $start = 0, int $startRange = 1, int $end = 0, int $endRange = 1, array $lines = [])
    {
        $this->start      = $start;
        $this->startRange = $startRange;
        $this->end        = $end;
        $this->endRange   = $endRange;
        $this->lines      = $lines;
    }

<<<<<<< HEAD
    public function getStart(): int
=======
    public function start(): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->start;
    }

<<<<<<< HEAD
    public function getStartRange(): int
=======
    public function startRange(): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->startRange;
    }

<<<<<<< HEAD
    public function getEnd(): int
=======
    public function end(): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->end;
    }

<<<<<<< HEAD
    public function getEndRange(): int
=======
    public function endRange(): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->endRange;
    }

    /**
<<<<<<< HEAD
     * @return Line[]
     */
    public function getLines(): array
=======
     * @return list<Line>
     */
    public function lines(): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->lines;
    }

    /**
<<<<<<< HEAD
     * @param Line[] $lines
=======
     * @param list<Line> $lines
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function setLines(array $lines): void
    {
        foreach ($lines as $line) {
            if (!$line instanceof Line) {
                throw new InvalidArgumentException;
            }
        }

        $this->lines = $lines;
    }
<<<<<<< HEAD
=======

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->lines);
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
