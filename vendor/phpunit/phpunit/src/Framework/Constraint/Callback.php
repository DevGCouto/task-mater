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
/**
 * @psalm-template CallbackInput of mixed
=======
use Closure;
use ReflectionFunction;

/**
 * @template CallbackInput of mixed
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class Callback extends Constraint
{
    /**
<<<<<<< HEAD
     * @var callable
     *
     * @psalm-var callable(CallbackInput $input): bool
     */
    private $callback;

    /** @psalm-param callable(CallbackInput $input): bool $callback */
=======
     * @var callable(CallbackInput): bool
     */
    private readonly mixed $callback;

    /**
     * @param callable(CallbackInput $input): bool $callback
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is accepted by specified callback';
    }

<<<<<<< HEAD
=======
    public function isVariadic(): bool
    {
        return (new ReflectionFunction(Closure::fromCallable($this->callback)))->isVariadic();
    }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    /**
     * Evaluates the constraint for parameter $value. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param mixed $other value or object to evaluate
     *
     * @psalm-param CallbackInput $other
     */
    protected function matches($other): bool
    {
=======
     * @param CallbackInput $other
     */
    protected function matches(mixed $other): bool
    {
        if ($this->isVariadic()) {
            return ($this->callback)(...$other);
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return ($this->callback)($other);
    }
}
