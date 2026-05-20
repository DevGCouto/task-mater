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

use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
<<<<<<< HEAD
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Traversable;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class TraversableContainsOnly extends Constraint
{
<<<<<<< HEAD
    /**
     * @var Constraint
     */
    private $constraint;

    /**
     * @var string
     */
    private $type;

    /**
=======
    private readonly Constraint $constraint;
    private readonly string $type;

    /**
     * @param 'array'|'bool'|'boolean'|'callable'|'double'|'float'|'int'|'integer'|'iterable'|'null'|'numeric'|'object'|'real'|'resource (closed)'|'resource'|'scalar'|'string'|class-string $type
     *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * @throws Exception
     */
    public function __construct(string $type, bool $isNativeType = true)
    {
        if ($isNativeType) {
            $this->constraint = new IsType($type);
        } else {
<<<<<<< HEAD
            $this->constraint = new IsInstanceOf(
                $type,
            );
=======
            $this->constraint = new IsInstanceOf($type);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        $this->type = $type;
    }

    /**
     * Evaluates the constraint for parameter $other.
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
<<<<<<< HEAD
     * @param mixed|Traversable $other
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function evaluate($other, string $description = '', bool $returnResult = false): ?bool
=======
     * @throws ExpectationFailedException
     */
    public function evaluate(mixed $other, string $description = '', bool $returnResult = false): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $success = true;

        foreach ($other as $item) {
            if (!$this->constraint->evaluate($item, '', true)) {
                $success = false;

                break;
            }
        }

<<<<<<< HEAD
        if ($returnResult) {
            return $success;
        }

        if (!$success) {
            $this->fail($other, $description);
        }

        return null;
=======
        if (!$success && !$returnResult) {
            $this->fail($other, $description);
        }

        return $success;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'contains only values of type "' . $this->type . '"';
    }
}
