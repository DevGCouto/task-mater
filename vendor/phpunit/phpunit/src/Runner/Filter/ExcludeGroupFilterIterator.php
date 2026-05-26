<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Filter;

use function in_array;

/**
<<<<<<< HEAD
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ExcludeGroupFilterIterator extends GroupFilterIterator
{
<<<<<<< HEAD
    protected function doAccept(string $hash): bool
    {
        return !in_array($hash, $this->groupTests, true);
=======
    /**
     * @param non-empty-string       $id
     * @param list<non-empty-string> $groupTests
     */
    protected function doAccept(string $id, array $groupTests): bool
    {
        return !in_array($id, $groupTests, true);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
