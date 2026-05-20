<?php declare(strict_types=1);
/*
 * This file is part of sebastian/comparator.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Comparator;

<<<<<<< HEAD
=======
use function assert;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use Exception;

/**
 * Compares Exception instances for equality.
 */
<<<<<<< HEAD
class ExceptionComparator extends ObjectComparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
     * @return bool
     */
    public function accepts($expected, $actual)
=======
final class ExceptionComparator extends ObjectComparator
{
    public function accepts(mixed $expected, mixed $actual): bool
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $expected instanceof Exception && $actual instanceof Exception;
    }

    /**
<<<<<<< HEAD
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
     * @param object $object
     *
     * @return array
     */
    protected function toArray($object)
    {
=======
     * @return array<mixed>
     */
    protected function toArray(object $object): array
    {
        assert($object instanceof Exception);

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $array = parent::toArray($object);

        unset(
            $array['file'],
            $array['line'],
            $array['trace'],
            $array['string'],
<<<<<<< HEAD
            $array['xdebug_message']
=======
            $array['xdebug_message'],
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );

        return $array;
    }
}
