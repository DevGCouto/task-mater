<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-timer.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Timer;

use function array_pop;
use function hrtime;

final class Timer
{
    /**
<<<<<<< HEAD
     * @psalm-var list<float>
     */
    private $startTimes = [];
=======
     * @var list<float>
     */
    private array $startTimes = [];
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

    public function start(): void
    {
        $this->startTimes[] = (float) hrtime(true);
    }

    /**
     * @throws NoActiveTimerException
     */
    public function stop(): Duration
    {
        if (empty($this->startTimes)) {
            throw new NoActiveTimerException(
<<<<<<< HEAD
                'Timer::start() has to be called before Timer::stop()'
=======
                'Timer::start() has to be called before Timer::stop()',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return Duration::fromNanoseconds((float) hrtime(true) - array_pop($this->startTimes));
    }
}
