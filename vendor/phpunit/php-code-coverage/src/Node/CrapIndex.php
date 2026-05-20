<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Node;

use function sprintf;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class CrapIndex
{
<<<<<<< HEAD
    /**
     * @var int
     */
    private $cyclomaticComplexity;

    /**
     * @var float
     */
    private $codeCoverage;
=======
    private readonly int $cyclomaticComplexity;
    private readonly float $codeCoverage;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(int $cyclomaticComplexity, float $codeCoverage)
    {
        $this->cyclomaticComplexity = $cyclomaticComplexity;
        $this->codeCoverage         = $codeCoverage;
    }

    public function asString(): string
    {
        if ($this->codeCoverage === 0.0) {
            return (string) ($this->cyclomaticComplexity ** 2 + $this->cyclomaticComplexity);
        }

        if ($this->codeCoverage >= 95) {
            return (string) $this->cyclomaticComplexity;
        }

        return sprintf(
            '%01.2F',
<<<<<<< HEAD
            $this->cyclomaticComplexity ** 2 * (1 - $this->codeCoverage / 100) ** 3 + $this->cyclomaticComplexity
=======
            $this->cyclomaticComplexity ** 2 * (1 - $this->codeCoverage / 100) ** 3 + $this->cyclomaticComplexity,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
