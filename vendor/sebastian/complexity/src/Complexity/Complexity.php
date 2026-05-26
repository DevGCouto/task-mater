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
/**
 * @psalm-immutable
 */
final class Complexity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $cyclomaticComplexity;

=======
use function str_contains;

/**
 * @immutable
 */
final readonly class Complexity
{
    /**
     * @var non-empty-string
     */
    private string $name;

    /**
     * @var positive-int
     */
    private int $cyclomaticComplexity;

    /**
     * @param non-empty-string $name
     * @param positive-int     $cyclomaticComplexity
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct(string $name, int $cyclomaticComplexity)
    {
        $this->name                 = $name;
        $this->cyclomaticComplexity = $cyclomaticComplexity;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function name(): string
    {
        return $this->name;
    }

<<<<<<< HEAD
=======
    /**
     * @return positive-int
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function cyclomaticComplexity(): int
    {
        return $this->cyclomaticComplexity;
    }
<<<<<<< HEAD
=======

    public function isFunction(): bool
    {
        return !$this->isMethod();
    }

    public function isMethod(): bool
    {
        return str_contains($this->name, '::');
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
