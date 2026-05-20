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

use function count;
<<<<<<< HEAD
use function is_array;
use function iterator_count;
use function sprintf;
use Countable;
=======
use function is_countable;
use function iterator_count;
use function sprintf;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use EmptyIterator;
use Generator;
use Iterator;
use IteratorAggregate;
use PHPUnit\Framework\Exception;
<<<<<<< HEAD
=======
use PHPUnit\Framework\GeneratorNotSupportedException;
use SebastianBergmann\RecursionContext\Context;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use Traversable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
class Count extends Constraint
{
<<<<<<< HEAD
    /**
     * @var int
     */
    private $expectedCount;
=======
    private readonly int $expectedCount;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function __construct(int $expected)
    {
        $this->expectedCount = $expected;
    }

    public function toString(): string
    {
        return sprintf(
            'count matches %d',
            $this->expectedCount,
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @throws Exception
     */
<<<<<<< HEAD
    protected function matches($other): bool
=======
    protected function matches(mixed $other): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->expectedCount === $this->getCountOf($other);
    }

    /**
     * @throws Exception
     */
<<<<<<< HEAD
    protected function getCountOf($other): ?int
    {
        if ($other instanceof Countable || is_array($other)) {
=======
    protected function getCountOf(mixed $other): ?int
    {
        if (is_countable($other)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            return count($other);
        }

        if ($other instanceof EmptyIterator) {
            return 0;
        }

        if ($other instanceof Traversable) {
<<<<<<< HEAD
            while ($other instanceof IteratorAggregate) {
=======
            $context = new Context;

            while ($other instanceof IteratorAggregate) {
                if ($context->contains($other) !== false) {
                    throw new Exception('IteratorAggregate::getIterator() returned an object that was already seen');
                }

                $context->add($other);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                try {
                    $other = $other->getIterator();
                } catch (\Exception $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e,
                    );
                }
            }

            $iterator = $other;

            if ($iterator instanceof Generator) {
<<<<<<< HEAD
                return $this->getCountOfGenerator($iterator);
=======
                throw new GeneratorNotSupportedException;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }

            if (!$iterator instanceof Iterator) {
                return iterator_count($iterator);
            }

            $key   = $iterator->key();
            $count = iterator_count($iterator);

            // Manually rewind $iterator to previous key, since iterator_count
            // moves pointer.
            if ($key !== null) {
                $iterator->rewind();

                while ($iterator->valid() && $key !== $iterator->key()) {
                    $iterator->next();
                }
            }

            return $count;
        }

        return null;
    }

    /**
<<<<<<< HEAD
     * Returns the total number of iterations from a generator.
     * This will fully exhaust the generator.
     */
    protected function getCountOfGenerator(Generator $generator): int
    {
        for ($count = 0; $generator->valid(); $generator->next()) {
            $count++;
        }

        return $count;
    }

    /**
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
<<<<<<< HEAD
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
=======
     * @throws Exception
     */
    protected function failureDescription(mixed $other): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return sprintf(
            'actual size %d matches expected size %d',
            (int) $this->getCountOf($other),
            $this->expectedCount,
        );
    }
}
