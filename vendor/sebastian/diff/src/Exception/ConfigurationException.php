<?php declare(strict_types=1);
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Diff;

<<<<<<< HEAD
use function get_class;
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function gettype;
use function is_object;
use function sprintf;
use Exception;

final class ConfigurationException extends InvalidArgumentException
{
<<<<<<< HEAD
    public function __construct(
        string $option,
        string $expected,
        $value,
        int $code = 0,
        ?Exception $previous = null
    ) {
=======
    public function __construct(string $option, string $expected, mixed $value, int $code = 0, ?Exception $previous = null)
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        parent::__construct(
            sprintf(
                'Option "%s" must be %s, got "%s".',
                $option,
                $expected,
<<<<<<< HEAD
                is_object($value) ? get_class($value) : (null === $value ? '<null>' : gettype($value) . '#' . $value)
            ),
            $code,
            $previous
=======
                is_object($value) ? $value::class : (null === $value ? '<null>' : gettype($value) . '#' . $value),
            ),
            $code,
            $previous,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
