<?php declare(strict_types=1);
/*
 * This file is part of sebastian/lines-of-code.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\LinesOfCode;

/**
<<<<<<< HEAD
 * @psalm-immutable
 */
final class LinesOfCode
{
    /**
     * @var int
     */
    private $linesOfCode;

    /**
     * @var int
     */
    private $commentLinesOfCode;

    /**
     * @var int
     */
    private $nonCommentLinesOfCode;

    /**
     * @var int
     */
    private $logicalLinesOfCode;

    /**
=======
 * @immutable
 */
final readonly class LinesOfCode
{
    /**
     * @var non-negative-int
     */
    private int $linesOfCode;

    /**
     * @var non-negative-int
     */
    private int $commentLinesOfCode;

    /**
     * @var non-negative-int
     */
    private int $nonCommentLinesOfCode;

    /**
     * @var non-negative-int
     */
    private int $logicalLinesOfCode;

    /**
     * @param non-negative-int $linesOfCode
     * @param non-negative-int $commentLinesOfCode
     * @param non-negative-int $nonCommentLinesOfCode
     * @param non-negative-int $logicalLinesOfCode
     *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @throws IllogicalValuesException
     * @throws NegativeValueException
     */
    public function __construct(int $linesOfCode, int $commentLinesOfCode, int $nonCommentLinesOfCode, int $logicalLinesOfCode)
    {
<<<<<<< HEAD
=======
        /** @phpstan-ignore smaller.alwaysFalse */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($linesOfCode < 0) {
            throw new NegativeValueException('$linesOfCode must not be negative');
        }

<<<<<<< HEAD
=======
        /** @phpstan-ignore smaller.alwaysFalse */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($commentLinesOfCode < 0) {
            throw new NegativeValueException('$commentLinesOfCode must not be negative');
        }

<<<<<<< HEAD
=======
        /** @phpstan-ignore smaller.alwaysFalse */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($nonCommentLinesOfCode < 0) {
            throw new NegativeValueException('$nonCommentLinesOfCode must not be negative');
        }

<<<<<<< HEAD
=======
        /** @phpstan-ignore smaller.alwaysFalse */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($logicalLinesOfCode < 0) {
            throw new NegativeValueException('$logicalLinesOfCode must not be negative');
        }

        if ($linesOfCode - $commentLinesOfCode !== $nonCommentLinesOfCode) {
            throw new IllogicalValuesException('$linesOfCode !== $commentLinesOfCode + $nonCommentLinesOfCode');
        }

        $this->linesOfCode           = $linesOfCode;
        $this->commentLinesOfCode    = $commentLinesOfCode;
        $this->nonCommentLinesOfCode = $nonCommentLinesOfCode;
        $this->logicalLinesOfCode    = $logicalLinesOfCode;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-negative-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function linesOfCode(): int
    {
        return $this->linesOfCode;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-negative-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function commentLinesOfCode(): int
    {
        return $this->commentLinesOfCode;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-negative-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function nonCommentLinesOfCode(): int
    {
        return $this->nonCommentLinesOfCode;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-negative-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function logicalLinesOfCode(): int
    {
        return $this->logicalLinesOfCode;
    }

    public function plus(self $other): self
    {
        return new self(
            $this->linesOfCode() + $other->linesOfCode(),
            $this->commentLinesOfCode() + $other->commentLinesOfCode(),
            $this->nonCommentLinesOfCode() + $other->nonCommentLinesOfCode(),
            $this->logicalLinesOfCode() + $other->logicalLinesOfCode(),
        );
    }
}
