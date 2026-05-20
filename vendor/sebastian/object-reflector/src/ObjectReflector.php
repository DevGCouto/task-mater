<?php declare(strict_types=1);
/*
 * This file is part of sebastian/object-reflector.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\ObjectReflector;

use function count;
use function explode;
<<<<<<< HEAD
use function get_class;
use function is_object;

class ObjectReflector
{
    /**
     * @param object $object
     *
     * @throws InvalidArgumentException
     */
    public function getAttributes($object): array
    {
        if (!is_object($object)) {
            throw new InvalidArgumentException;
        }

        $attributes = [];
        $className  = get_class($object);
=======

final class ObjectReflector
{
    /**
     * @return array<string, mixed>
     */
    public function getProperties(object $object): array
    {
        $properties = [];
        $className  = $object::class;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        foreach ((array) $object as $name => $value) {
            $name = explode("\0", (string) $name);

            if (count($name) === 1) {
                $name = $name[0];
<<<<<<< HEAD
            } else {
                if ($name[1] !== $className) {
                    $name = $name[1] . '::' . $name[2];
                } else {
                    $name = $name[2];
                }
            }

            $attributes[$name] = $value;
        }

        return $attributes;
=======
            } elseif ($name[1] !== $className) {
                $name = $name[1] . '::' . $name[2];
            } else {
                $name = $name[2];
            }

            $properties[$name] = $value;
        }

        return $properties;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
