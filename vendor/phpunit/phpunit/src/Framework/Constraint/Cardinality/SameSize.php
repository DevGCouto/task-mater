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
=======
use Countable;
use PHPUnit\Framework\Exception;

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class SameSize extends Count
{
<<<<<<< HEAD
    public function __construct(iterable $expected)
=======
    /**
     * @param Countable|iterable<mixed> $expected
     *
     * @throws Exception
     */
    public function __construct(Countable|iterable $expected)
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        parent::__construct((int) $this->getCountOf($expected));
    }
}
