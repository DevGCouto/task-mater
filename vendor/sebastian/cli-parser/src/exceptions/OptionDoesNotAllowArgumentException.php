<?php declare(strict_types=1);
/*
 * This file is part of sebastian/cli-parser.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CliParser;

use function sprintf;
use RuntimeException;

final class OptionDoesNotAllowArgumentException extends RuntimeException implements Exception
{
    public function __construct(string $option)
    {
        parent::__construct(
            sprintf(
                'Option "%s" does not allow an argument',
<<<<<<< HEAD
                $option
            )
=======
                $option,
            ),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        );
    }
}
