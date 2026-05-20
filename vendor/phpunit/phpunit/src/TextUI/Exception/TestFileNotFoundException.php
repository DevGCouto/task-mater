<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI;

use function sprintf;
use RuntimeException;

/**
<<<<<<< HEAD
 * @internal This interface is not covered by the backward compatibility promise for PHPUnit
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 */
final class TestFileNotFoundException extends RuntimeException implements Exception
{
    public function __construct(string $path)
    {
        parent::__construct(
            sprintf(
                'Test file "%s" not found',
                $path,
            ),
        );
    }
}
