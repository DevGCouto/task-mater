<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

use function is_array;
use function sprintf;
<<<<<<< HEAD
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use PHPUnit\Util\Exporter;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
abstract class TraversableContains extends Constraint
{
<<<<<<< HEAD
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
=======
    private readonly mixed $value;

    public function __construct(mixed $value)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->value = $value;
    }

    /**
     * Returns a string representation of the constraint.
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException
     */
    public function toString(): string
    {
        return 'contains ' . $this->exporter()->export($this->value);
=======
     */
    public function toString(): string
    {
        return 'contains ' . Exporter::export($this->value);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
<<<<<<< HEAD
     *
     * @param mixed $other evaluated value or object
     *
     * @throws InvalidArgumentException
     */
    protected function failureDescription($other): string
=======
     */
    protected function failureDescription(mixed $other): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return sprintf(
            '%s %s',
            is_array($other) ? 'an array' : 'a traversable',
            $this->toString(),
        );
    }

<<<<<<< HEAD
    protected function value()
=======
    protected function value(): mixed
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->value;
    }
}
