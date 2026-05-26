<?php declare(strict_types=1);
/*
 * This file is part of sebastian/recursion-context.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\RecursionContext;

use const PHP_INT_MAX;
use const PHP_INT_MIN;
use function array_key_exists;
use function array_pop;
use function array_slice;
use function count;
use function is_array;
<<<<<<< HEAD
use function is_object;
use function random_int;
use function spl_object_hash;
use SplObjectStorage;

/**
 * A context containing previously processed arrays and objects
 * when recursively processing a value.
 */
final class Context
{
    /**
     * @var array[]
     */
    private $arrays;

    /**
     * @var SplObjectStorage
     */
    private $objects;

    /**
     * Initialises the context.
     */
    public function __construct()
    {
        $this->arrays  = [];
=======
use function is_int;
use function random_int;
use function spl_object_id;
use SplObjectStorage;

final class Context
{
    /**
     * @var list<array<mixed>>
     */
    private array $arrays = [];

    /**
     * @var SplObjectStorage<object, null>
     */
    private SplObjectStorage $objects;

    public function __construct()
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->objects = new SplObjectStorage;
    }

    /**
     * @codeCoverageIgnore
     */
    public function __destruct()
    {
        foreach ($this->arrays as &$array) {
<<<<<<< HEAD
=======
            /* @phpstan-ignore function.alreadyNarrowedType */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            if (is_array($array)) {
                array_pop($array);
                array_pop($array);
            }
        }
    }

    /**
<<<<<<< HEAD
     * Adds a value to the context.
     *
     * @param array|object $value the value to add
     *
     * @throws InvalidArgumentException Thrown if $value is not an array or object
     *
     * @return bool|int|string the ID of the stored value, either as a string or integer
     *
     * @psalm-template T
     * @psalm-param T $value
     * @param-out T $value
     */
    public function add(&$value)
    {
        if (is_array($value)) {
            return $this->addArray($value);
        }

        if (is_object($value)) {
            return $this->addObject($value);
        }

        throw new InvalidArgumentException(
            'Only arrays and objects are supported'
        );
    }

    /**
     * Checks if the given value exists within the context.
     *
     * @param array|object $value the value to check
     *
     * @throws InvalidArgumentException Thrown if $value is not an array or object
     *
     * @return false|int|string the string or integer ID of the stored value if it has already been seen, or false if the value is not stored
     *
     * @psalm-template T
     * @psalm-param T $value
     * @param-out T $value
     */
    public function contains(&$value)
=======
     * @template T of object|array
     *
     * @param T $value
     *
     * @param-out T $value
     */
    public function add(array|object &$value): int
    {
        if (is_array($value)) {
            /* @phpstan-ignore paramOut.type */
            return $this->addArray($value);
        }

        return $this->addObject($value);
    }

    /**
     * @template T of object|array
     *
     * @param T $value
     *
     * @param-out T $value
     */
    public function contains(array|object &$value): false|int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (is_array($value)) {
            return $this->containsArray($value);
        }

<<<<<<< HEAD
        if (is_object($value)) {
            return $this->containsObject($value);
        }

        throw new InvalidArgumentException(
            'Only arrays and objects are supported'
        );
    }

    /**
     * @return bool|int
     */
    private function addArray(array &$array)
=======
        return $this->containsObject($value);
    }

    /**
     * @param array<mixed> $array
     */
    private function addArray(array &$array): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        $key = $this->containsArray($array);

        if ($key !== false) {
            return $key;
        }

        $key            = count($this->arrays);
        $this->arrays[] = &$array;

        if (!array_key_exists(PHP_INT_MAX, $array) && !array_key_exists(PHP_INT_MAX - 1, $array)) {
            $array[] = $key;
            $array[] = $this->objects;
<<<<<<< HEAD
        } else { /* cover the improbable case too */
            /* Note that array_slice (used in containsArray) will return the
             * last two values added *not necessarily* the highest integer
             * keys in the array, so the order of these writes to $array
             * is important, but the actual keys used is not. */
            do {
=======
        } else {
            /* Cover the improbable case, too.
             *
             * Note that array_slice() (used in containsArray()) will return the
             * last two values added, *not necessarily* the highest integer keys
             * in the array. Therefore, the order of these writes to $array is
             * important, but the actual keys used is not. */
            do {
                /** @noinspection PhpUnhandledExceptionInspection */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $key = random_int(PHP_INT_MIN, PHP_INT_MAX);
            } while (array_key_exists($key, $array));

            $array[$key] = $key;

            do {
<<<<<<< HEAD
=======
                /** @noinspection PhpUnhandledExceptionInspection */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $key = random_int(PHP_INT_MIN, PHP_INT_MAX);
            } while (array_key_exists($key, $array));

            $array[$key] = $this->objects;
        }

        return $key;
    }

<<<<<<< HEAD
    /**
     * @param object $object
     */
    private function addObject($object): string
=======
    private function addObject(object $object): int
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!$this->objects->offsetExists($object)) {
            $this->objects->offsetSet($object);
        }

<<<<<<< HEAD
        return spl_object_hash($object);
    }

    /**
     * @return false|int
     */
    private function containsArray(array &$array)
    {
        $end = array_slice($array, -2);

        return isset($end[1]) && $end[1] === $this->objects ? $end[0] : false;
    }

    /**
     * @param object $value
     *
     * @return false|string
     */
    private function containsObject($value)
    {
        if ($this->objects->offsetExists($value)) {
            return spl_object_hash($value);
=======
        return spl_object_id($object);
    }

    /**
     * @param array<mixed> $array
     */
    private function containsArray(array $array): false|int
    {
        $end = array_slice($array, -2);

        if (isset($end[1]) &&
            $end[1] === $this->objects &&
            is_int($end[0])) {
            return $end[0];
        }

        return false;
    }

    private function containsObject(object $value): false|int
    {
        if ($this->objects->offsetExists($value)) {
            return spl_object_id($value);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return false;
    }
}
