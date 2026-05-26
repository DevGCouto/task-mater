<?php declare(strict_types=1);
/*
 * This file is part of sebastian/object-enumerator.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\ObjectEnumerator;

use function array_merge;
<<<<<<< HEAD
use function func_get_args;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function is_array;
use function is_object;
use SebastianBergmann\ObjectReflector\ObjectReflector;
use SebastianBergmann\RecursionContext\Context;

<<<<<<< HEAD
/**
 * Traverses array structures and object graphs
 * to enumerate all referenced objects.
 */
class Enumerator
{
    /**
     * Returns an array of all objects referenced either
     * directly or indirectly by a variable.
     *
     * @param array|object $variable
     *
     * @return object[]
     */
    public function enumerate($variable)
    {
        if (!is_array($variable) && !is_object($variable)) {
            throw new InvalidArgumentException;
        }

        if (isset(func_get_args()[1])) {
            if (!func_get_args()[1] instanceof Context) {
                throw new InvalidArgumentException;
            }

            $processed = func_get_args()[1];
        } else {
            $processed = new Context;
        }

=======
final class Enumerator
{
    /**
     * @param array<mixed>|object $variable
     *
     * @return list<object>
     */
    public function enumerate(array|object $variable, Context $processed = new Context): array
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $objects = [];

        if ($processed->contains($variable)) {
            return $objects;
        }

        $array = $variable;
<<<<<<< HEAD
        $processed->add($variable);

        if (is_array($variable)) {
=======

        /* @noinspection UnusedFunctionResultInspection */
        $processed->add($variable);

        if (is_array($variable)) {
            /** @phpstan-ignore foreach.nonIterable */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            foreach ($array as $element) {
                if (!is_array($element) && !is_object($element)) {
                    continue;
                }

<<<<<<< HEAD
                $objects = array_merge(
                    $objects,
                    $this->enumerate($element, $processed)
                );
            }
        } else {
            $objects[] = $variable;

            $reflector = new ObjectReflector;

            foreach ($reflector->getAttributes($variable) as $value) {
                if (!is_array($value) && !is_object($value)) {
                    continue;
                }

                $objects = array_merge(
                    $objects,
                    $this->enumerate($value, $processed)
                );
            }
=======
                /** @noinspection SlowArrayOperationsInLoopInspection */
                $objects = array_merge(
                    $objects,
                    $this->enumerate($element, $processed),
                );
            }

            return $objects;
        }

        $objects[] = $variable;

        foreach ((new ObjectReflector)->getProperties($variable) as $value) {
            if (!is_array($value) && !is_object($value)) {
                continue;
            }

            /** @noinspection SlowArrayOperationsInLoopInspection */
            $objects = array_merge(
                $objects,
                $this->enumerate($value, $processed),
            );
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $objects;
    }
}
