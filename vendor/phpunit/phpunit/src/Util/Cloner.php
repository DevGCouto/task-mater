<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

use Throwable;

/**
<<<<<<< HEAD
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Cloner
{
    /**
     * @psalm-template OriginalType
     *
     * @psalm-param OriginalType $original
     *
     * @psalm-return OriginalType
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class Cloner
{
    /**
     * @template OriginalType of object
     *
     * @param OriginalType $original
     *
     * @return OriginalType
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public static function clone(object $original): object
    {
        try {
            return clone $original;
<<<<<<< HEAD
        } catch (Throwable $t) {
=======

            /** @phpstan-ignore catch.neverThrown */
        } catch (Throwable) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            return $original;
        }
    }
}
