<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use function array_keys;
use function get_object_vars;
<<<<<<< HEAD
use PHPUnit\Util\Filter;
=======
use function is_int;
use function sprintf;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use RuntimeException;
use Throwable;

/**
 * Base class for all PHPUnit Framework exceptions.
 *
 * Ensures that exceptions thrown during a test run do not leave stray
 * references behind.
 *
 * Every Exception contains a stack trace. Each stack frame contains the 'args'
 * of the called function. The function arguments can contain references to
 * instantiated objects. The references prevent the objects from being
 * destructed (until test results are eventually printed), so memory cannot be
 * freed up.
 *
 * With enabled process isolation, test results are serialized in the child
 * process and unserialized in the parent process. The stack trace of Exceptions
 * may contain objects that cannot be serialized or unserialized (e.g., PDO
 * connections). Unserializing user-space objects from the child process into
 * the parent would break the intended encapsulation of process isolation.
 *
 * @see http://fabien.potencier.org/article/9/php-serialization-stack-traces-and-exceptions
 *
<<<<<<< HEAD
=======
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class Exception extends RuntimeException implements \PHPUnit\Exception
{
    /**
<<<<<<< HEAD
     * @var array
     */
    protected $serializableTrace;

    public function __construct($message = '', $code = 0, ?Throwable $previous = null)
    {
=======
     * @var list<array{file?: string, line?: int, function: string}>
     */
    protected array $serializableTrace;

    public function __construct(string $message = '', int|string $code = 0, ?Throwable $previous = null)
    {
        /**
         * @see https://github.com/sebastianbergmann/phpunit/issues/5965
         */
        if (!is_int($code)) {
            $message .= sprintf(
                ' (exception code: %s)',
                $code,
            );

            $code = 0;
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        parent::__construct($message, $code, $previous);

        $this->serializableTrace = $this->getTrace();

        foreach (array_keys($this->serializableTrace) as $key) {
            unset($this->serializableTrace[$key]['args']);
        }
    }

<<<<<<< HEAD
    public function __toString(): string
    {
        $string = TestFailure::exceptionToString($this);

        if ($trace = Filter::getFilteredStacktrace($this)) {
            $string .= "\n" . $trace;
        }

        return $string;
    }

    public function __sleep(): array
    {
        return array_keys(get_object_vars($this));
    }

=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __serialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * Returns the serializable trace (without 'args').
<<<<<<< HEAD
=======
     *
     * @return list<array{file?: string, line?: int, function: string}>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function getSerializableTrace(): array
    {
        return $this->serializableTrace;
    }
}
