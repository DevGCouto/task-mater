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

<<<<<<< HEAD
use function get_class;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function sprintf;
use PHPUnit\Util\Filter;
use Throwable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
<<<<<<< HEAD
 */
final class Exception extends Constraint
{
    /**
     * @var string
     */
    private $className;
=======
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Exception extends Constraint
{
    private readonly string $className;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'exception of type "%s"',
            $this->className,
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
=======
     */
    protected function matches(mixed $other): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $other instanceof $this->className;
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
<<<<<<< HEAD
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
    {
        if ($other !== null) {
            $message = '';

            if ($other instanceof Throwable) {
                $message = '. Message was: "' . $other->getMessage() . '" at'
                    . "\n" . Filter::getFilteredStacktrace($other);
            }

            return sprintf(
                'exception of type "%s" matches expected exception "%s"%s',
                get_class($other),
                $this->className,
                $message,
            );
        }

        return sprintf(
            'exception of type "%s" is thrown',
            $this->className,
=======
     * @throws \PHPUnit\Framework\Exception
     */
    protected function failureDescription(mixed $other): string
    {
        if ($other === null) {
            return sprintf(
                'exception of type "%s" is thrown',
                $this->className,
            );
        }

        $message = '';

        if ($other instanceof Throwable) {
            $message = '. Message was: "' . $other->getMessage() . '" at'
                . "\n" . Filter::stackTraceFromThrowableAsString($other);
        }

        return sprintf(
            'exception of type "%s" matches expected exception "%s"%s',
            $other::class,
            $this->className,
            $message,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
