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
use function json_decode;
use function json_last_error;
use function sprintf;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use const JSON_ERROR_CTRL_CHAR;
use const JSON_ERROR_DEPTH;
use const JSON_ERROR_NONE;
use const JSON_ERROR_STATE_MISMATCH;
use const JSON_ERROR_SYNTAX;
use const JSON_ERROR_UTF8;
use function is_string;
use function json_decode;
use function json_last_error;
use function sprintf;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class IsJson extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is valid JSON';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
<<<<<<< HEAD
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ($other === '') {
=======
     */
    protected function matches(mixed $other): bool
    {
        if (!is_string($other) || $other === '') {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            return false;
        }

        json_decode($other);

        if (json_last_error()) {
            return false;
        }

        return true;
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
<<<<<<< HEAD
     *
     * @param mixed $other evaluated value or object
     *
     * @throws InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
=======
     */
    protected function failureDescription(mixed $other): string
    {
        if (!is_string($other)) {
            return $this->valueToTypeStringFragment($other) . 'is valid JSON';
        }

>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        if ($other === '') {
            return 'an empty string is valid JSON';
        }

<<<<<<< HEAD
        json_decode($other);
        $error = (string) JsonMatchesErrorMessageProvider::determineJsonError(
            (string) json_last_error(),
        );

        return sprintf(
            '%s is valid JSON (%s)',
            $this->exporter()->shortenedExport($other),
            $error,
        );
    }
=======
        return sprintf(
            'a string is valid JSON (%s)',
            $this->determineJsonError($other),
        );
    }

    private function determineJsonError(string $json): string
    {
        json_decode($json);

        return match (json_last_error()) {
            JSON_ERROR_NONE           => '',
            JSON_ERROR_DEPTH          => 'Maximum stack depth exceeded',
            JSON_ERROR_STATE_MISMATCH => 'Underflow or the modes mismatch',
            JSON_ERROR_CTRL_CHAR      => 'Unexpected control character found',
            JSON_ERROR_SYNTAX         => 'Syntax error, malformed JSON',
            JSON_ERROR_UTF8           => 'Malformed UTF-8 characters, possibly incorrectly encoded',
            default                   => 'Unknown error',
        };
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
