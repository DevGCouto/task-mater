<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

<<<<<<< HEAD
use function get_class;
use function gettype;
use function is_object;
use function sprintf;

/**
=======
use function get_debug_type;
use function sprintf;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class IncompatibleReturnValueException extends \PHPUnit\Framework\Exception implements Exception
{
<<<<<<< HEAD
    /**
     * @param mixed $value
     */
    public function __construct(ConfigurableMethod $method, $value)
=======
    public function __construct(ConfigurableMethod $method, mixed $value)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        parent::__construct(
            sprintf(
                'Method %s may not return value of type %s, its declared return type is "%s"',
<<<<<<< HEAD
                $method->getName(),
                is_object($value) ? get_class($value) : gettype($value),
                $method->getReturnTypeDeclaration(),
=======
                $method->name(),
                get_debug_type($value),
                $method->returnTypeDeclaration(),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            ),
        );
    }
}
