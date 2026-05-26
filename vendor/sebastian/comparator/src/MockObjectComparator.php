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
use PHPUnit\Framework\MockObject\MockObject;
=======
use function array_keys;
use function assert;
use function str_starts_with;
use PHPUnit\Framework\MockObject\Stub;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * Compares PHPUnit\Framework\MockObject\MockObject instances for equality.
 */
<<<<<<< HEAD
class MockObjectComparator extends ObjectComparator
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
    {
        return $expected instanceof MockObject && $actual instanceof MockObject;
    }

    /**
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
     * @param object $object
     *
     * @return array
     */
    protected function toArray($object)
    {
        $array = parent::toArray($object);

        unset($array['__phpunit_invocationMocker']);
=======
final class MockObjectComparator extends ObjectComparator
{
    public function accepts(mixed $expected, mixed $actual): bool
    {
        return $expected instanceof Stub && $actual instanceof Stub;
    }

    /**
     * @return array<mixed>
     */
    protected function toArray(object $object): array
    {
        assert($object instanceof Stub);

        $array = parent::toArray($object);

        foreach (array_keys($array) as $key) {
            if (!str_starts_with($key, '__phpunit_')) {
                continue;
            }

            unset($array[$key]);
        }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        return $array;
    }
}
