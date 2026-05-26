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

use function sprintf;
<<<<<<< HEAD
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Throwable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class ExceptionCode extends Constraint
{
    /**
     * @var int|string
     */
    private $expectedCode;

    /**
     * @param int|string $expected
     */
    public function __construct($expected)
=======
use PHPUnit\Util\Exporter;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ExceptionCode extends Constraint
{
    private readonly int|string $expectedCode;

    public function __construct(int|string $expected)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $this->expectedCode = $expected;
    }

    public function toString(): string
    {
<<<<<<< HEAD
        return 'exception code is ';
=======
        return 'exception code is ' . $this->expectedCode;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param Throwable $other
     */
    protected function matches($other): bool
    {
        return (string) $other->getCode() === (string) $this->expectedCode;
=======
     */
    protected function matches(mixed $other): bool
    {
        return (string) $other === (string) $this->expectedCode;
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
    {
        return sprintf(
            '%s is equal to expected exception code %s',
            $this->exporter()->export($other->getCode()),
            $this->exporter()->export($this->expectedCode),
=======
     */
    protected function failureDescription(mixed $other): string
    {
        return sprintf(
            '%s is equal to expected exception code %s',
            Exporter::export($other),
            Exporter::export($this->expectedCode),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
