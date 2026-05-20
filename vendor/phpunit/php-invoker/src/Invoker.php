<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-invoker.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Invoker;

use const SIGALRM;
use function call_user_func_array;
<<<<<<< HEAD
=======
use function extension_loaded;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function function_exists;
use function pcntl_alarm;
use function pcntl_async_signals;
use function pcntl_signal;
use function sprintf;
use Throwable;

final class Invoker
{
    /**
<<<<<<< HEAD
     * @var int
     */
    private $timeout;

    /**
     * @throws Throwable
     */
    public function invoke(callable $callable, array $arguments, int $timeout)
    {
        if (!$this->canInvokeWithTimeout()) {
            throw new ProcessControlExtensionNotLoadedException(
                'The pcntl (process control) extension for PHP is required'
            );
=======
     * @param array<mixed> $arguments
     *
     * @throws Throwable
     */
    public function invoke(callable $callable, array $arguments, int $timeout): mixed
    {
        if (!$this->canInvokeWithTimeout()) {
            // @codeCoverageIgnoreStart
            throw new ProcessControlExtensionNotLoadedException;
            // @codeCoverageIgnoreEnd
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        pcntl_signal(
            SIGALRM,
<<<<<<< HEAD
            function (): void {
                throw new TimeoutException(
                    sprintf(
                        'Execution aborted after %d second%s',
                        $this->timeout,
                        $this->timeout === 1 ? '' : 's'
                    )
                );
            },
            true
        );

        $this->timeout = $timeout;

=======
            static function () use ($timeout): void
            {
                throw new TimeoutException(
                    sprintf(
                        'Execution aborted after %d second%s',
                        $timeout,
                        $timeout === 1 ? '' : 's',
                    ),
                );
            },
        );

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        pcntl_async_signals(true);
        pcntl_alarm($timeout);

        try {
            return call_user_func_array($callable, $arguments);
        } finally {
            pcntl_alarm(0);
        }
    }

    public function canInvokeWithTimeout(): bool
    {
<<<<<<< HEAD
        return function_exists('pcntl_signal') && function_exists('pcntl_async_signals') && function_exists('pcntl_alarm');
=======
        return extension_loaded('pcntl') && function_exists('pcntl_signal') && function_exists('pcntl_async_signals') && function_exists('pcntl_alarm');
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }
}
