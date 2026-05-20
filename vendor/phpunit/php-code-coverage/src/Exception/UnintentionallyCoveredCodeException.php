<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage;

<<<<<<< HEAD
=======
use function rtrim;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use RuntimeException;

final class UnintentionallyCoveredCodeException extends RuntimeException implements Exception
{
    /**
<<<<<<< HEAD
     * @var array
     */
    private $unintentionallyCoveredUnits;

=======
     * @var list<string>
     */
    private readonly array $unintentionallyCoveredUnits;

    /**
     * @param list<string> $unintentionallyCoveredUnits
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct(array $unintentionallyCoveredUnits)
    {
        $this->unintentionallyCoveredUnits = $unintentionallyCoveredUnits;

        parent::__construct($this->toString());
    }

<<<<<<< HEAD
=======
    /**
     * @return list<string>
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function getUnintentionallyCoveredUnits(): array
    {
        return $this->unintentionallyCoveredUnits;
    }

    private function toString(): string
    {
        $message = '';

        foreach ($this->unintentionallyCoveredUnits as $unit) {
            $message .= '- ' . $unit . "\n";
        }

<<<<<<< HEAD
        return $message;
=======
        return rtrim($message);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
