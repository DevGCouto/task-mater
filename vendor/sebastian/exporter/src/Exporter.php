<?php declare(strict_types=1);
/*
 * This file is part of sebastian/exporter.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Exporter;

<<<<<<< HEAD
use function bin2hex;
use function count;
use function function_exists;
use function get_class;
=======
use const COUNT_RECURSIVE;
use function assert;
use function bin2hex;
use function count;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function get_resource_type;
use function gettype;
use function implode;
use function ini_get;
use function ini_set;
use function is_array;
<<<<<<< HEAD
=======
use function is_bool;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function is_float;
use function is_object;
use function is_resource;
use function is_string;
use function mb_strlen;
use function mb_substr;
use function preg_match;
<<<<<<< HEAD
use function spl_object_hash;
use function sprintf;
use function str_repeat;
use function str_replace;
use function strlen;
use function substr;
use function var_export;
use SebastianBergmann\RecursionContext\Context;
use SplObjectStorage;

/**
 * A nifty utility for visualizing PHP variables.
 *
 * <code>
 * <?php
 * use SebastianBergmann\Exporter\Exporter;
 *
 * $exporter = new Exporter;
 * print $exporter->export(new Exception);
 * </code>
 */
class Exporter
{
    /**
=======
use function spl_object_id;
use function sprintf;
use function str_repeat;
use function str_replace;
use function strtr;
use function var_export;
use BackedEnum;
use Google\Protobuf\Internal\Message;
use ReflectionClass;
use ReflectionObject;
use SebastianBergmann\RecursionContext\Context as RecursionContext;
use SplObjectStorage;
use stdClass;
use UnitEnum;

final readonly class Exporter
{
    /**
     * @var non-negative-int
     */
    private int $shortenArraysLongerThan;

    /**
     * @var positive-int
     */
    private int $maxLengthForStrings;

    /**
     * @param non-negative-int $shortenArraysLongerThan
     * @param positive-int     $maxLengthForStrings
     */
    public function __construct(int $shortenArraysLongerThan = 0, int $maxLengthForStrings = 40)
    {
        $this->shortenArraysLongerThan = $shortenArraysLongerThan;
        $this->maxLengthForStrings     = $maxLengthForStrings;
    }

    /**
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     * Exports a value as a string.
     *
     * The output of this method is similar to the output of print_r(), but
     * improved in various aspects:
     *
     *  - NULL is rendered as "null" (instead of "")
     *  - TRUE is rendered as "true" (instead of "1")
     *  - FALSE is rendered as "false" (instead of "")
     *  - Strings are always quoted with single quotes
     *  - Carriage returns and newlines are normalized to \n
     *  - Recursion and repeated rendering is treated properly
<<<<<<< HEAD
     *
     * @param int $indentation The indentation level of the 2nd+ line
     *
     * @return string
     */
    public function export($value, $indentation = 0)
=======
     */
    public function export(mixed $value, int $indentation = 0): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        return $this->recursiveExport($value, $indentation);
    }

    /**
     * @param array<mixed> $data
<<<<<<< HEAD
     * @param Context      $context
     *
     * @return string
     */
    public function shortenedRecursiveExport(&$data, ?Context $context = null)
    {
        $result   = [];
        $exporter = new self();

        if (!$context) {
            $context = new Context;
        }

        $array = $data;
        $context->add($data);

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if ($context->contains($data[$key]) !== false) {
                    $result[] = '*RECURSION*';
                } else {
                    $result[] = sprintf(
                        'array(%s)',
                        $this->shortenedRecursiveExport($data[$key], $context)
                    );
                }
            } else {
                $result[] = $exporter->shortenedExport($value);
            }
        }

        return implode(', ', $result);
=======
     * @param positive-int $maxLengthForStrings
     */
    public function shortenedRecursiveExport(array &$data, int $maxLengthForStrings = 40, ?RecursionContext $processed = null): string
    {
        if ($maxLengthForStrings === 40) {
            $maxLengthForStrings = $this->maxLengthForStrings;
        }

        if (!$processed) {
            $processed = new RecursionContext;
        }

        $overallCount = @count($data, COUNT_RECURSIVE);
        $counter      = 0;

        $export = $this->shortenedCountedRecursiveExport($data, $processed, $counter, $maxLengthForStrings);

        if ($this->shortenArraysLongerThan > 0 &&
            $overallCount > $this->shortenArraysLongerThan) {
            $export .= sprintf(', ...%d more elements', $overallCount - $this->shortenArraysLongerThan);
        }

        return $export;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    /**
     * Exports a value into a single-line string.
     *
     * The output of this method is similar to the output of
     * SebastianBergmann\Exporter\Exporter::export().
     *
     * Newlines are replaced by the visible string '\n'.
     * Contents of arrays and objects (if any) are replaced by '...'.
     *
<<<<<<< HEAD
     * @return string
     *
     * @see    SebastianBergmann\Exporter\Exporter::export
     */
    public function shortenedExport($value)
    {
        if (is_string($value)) {
            $string = str_replace("\n", '', $this->export($value));

            if (function_exists('mb_strlen')) {
                if (mb_strlen($string) > 40) {
                    $string = mb_substr($string, 0, 30) . '...' . mb_substr($string, -7);
                }
            } else {
                if (strlen($string) > 40) {
                    $string = substr($string, 0, 30) . '...' . substr($string, -7);
                }
=======
     * @param positive-int $maxLengthForStrings
     */
    public function shortenedExport(mixed $value, int $maxLengthForStrings = 40): string
    {
        if ($maxLengthForStrings === 40) {
            $maxLengthForStrings = $this->maxLengthForStrings;
        }

        if (is_string($value)) {
            $string = str_replace("\n", '', $this->exportString($value));

            if (mb_strlen($string) > $maxLengthForStrings) {
                return mb_substr($string, 0, $maxLengthForStrings - 10) . '...' . mb_substr($string, -7);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            }

            return $string;
        }

<<<<<<< HEAD
        if (is_object($value)) {
            return sprintf(
                '%s Object (%s)',
                get_class($value),
                count($this->toArray($value)) > 0 ? '...' : ''
=======
        if ($value instanceof BackedEnum) {
            return sprintf(
                '%s Enum (%s, %s)',
                $value::class,
                $value->name,
                $this->export($value->value),
            );
        }

        if ($value instanceof UnitEnum) {
            return sprintf(
                '%s Enum (%s)',
                $value::class,
                $value->name,
            );
        }

        if (is_object($value)) {
            return sprintf(
                '%s Object (%s)',
                $value::class,
                $this->countProperties($value) > 0 ? '...' : '',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        if (is_array($value)) {
            return sprintf(
<<<<<<< HEAD
                'Array (%s)',
                count($value) > 0 ? '...' : ''
=======
                '[%s]',
                count($value) > 0 ? '...' : '',
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $this->export($value);
    }

    /**
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
<<<<<<< HEAD
     * @return array
     */
    public function toArray($value)
=======
     * @return array<mixed>
     */
    public function toArray(mixed $value): array
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (!is_object($value)) {
            return (array) $value;
        }

        $array = [];

        foreach ((array) $value as $key => $val) {
            // Exception traces commonly reference hundreds to thousands of
            // objects currently loaded in memory. Including them in the result
            // has a severe negative performance impact.
            if ("\0Error\0trace" === $key || "\0Exception\0trace" === $key) {
                continue;
            }

            // properties are transformed to keys in the following way:
<<<<<<< HEAD
            // private   $property => "\0Classname\0property"
            // protected $property => "\0*\0property"
            // public    $property => "property"
            if (preg_match('/^\0.+\0(.+)$/', (string) $key, $matches)) {
=======
            // private   $propertyName => "\0ClassName\0propertyName"
            // protected $propertyName => "\0*\0propertyName"
            // public    $propertyName => "propertyName"
            if (preg_match('/\0.+\0(.+)/', (string) $key, $matches)) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
                $key = $matches[1];
            }

            // See https://github.com/php/php-src/commit/5721132
            if ($key === "\0gcdata") {
                continue;
            }

            $array[$key] = $val;
        }

<<<<<<< HEAD
        // Some internal classes like SplObjectStorage don't work with the
        // above (fast) mechanism nor with reflection in Zend.
        // Format the output similarly to print_r() in this case
        if ($value instanceof SplObjectStorage) {
            foreach ($value as $key => $val) {
                $array[spl_object_hash($val)] = [
                    'obj' => $val,
                    'inf' => $value->getInfo(),
                ];
            }
=======
        // Some internal classes like SplObjectStorage do not work with the
        // above (fast) mechanism nor with reflection in Zend.
        // Format the output similarly to print_r() in this case
        if ($value instanceof SplObjectStorage) {
            foreach ($value as $_value) {
                $array['Object #' . spl_object_id($_value)] = [
                    'obj' => $_value,
                    'inf' => $value->getInfo(),
                ];
            }

            $value->rewind();
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return $array;
    }

<<<<<<< HEAD
    /**
     * Recursive implementation of export.
     *
     * @param mixed                                       $value       The value to export
     * @param int                                         $indentation The indentation level of the 2nd+ line
     * @param \SebastianBergmann\RecursionContext\Context $processed   Previously processed objects
     *
     * @return string
     *
     * @see    SebastianBergmann\Exporter\Exporter::export
     */
    protected function recursiveExport(&$value, $indentation, $processed = null)
=======
    public function countProperties(object $value): int
    {
        if (!$this->canBeReflected($value)) {
            // @codeCoverageIgnoreStart
            return count($this->toArray($value));
            // @codeCoverageIgnoreEnd
        }

        if (!$value instanceof stdClass) {
            // using ReflectionClass prevents initialization of potential lazy objects
            return count((new ReflectionClass($value))->getProperties());
        }

        return count((new ReflectionObject($value))->getProperties());
    }

    /**
     * @param array<mixed> $data
     * @param positive-int $maxLengthForStrings
     */
    private function shortenedCountedRecursiveExport(array &$data, RecursionContext $processed, int &$counter, int $maxLengthForStrings): string
    {
        $result = [];

        $array = $data;

        /* @noinspection UnusedFunctionResultInspection */
        $processed->add($data);

        foreach ($array as $key => $value) {
            if ($this->shortenArraysLongerThan > 0 &&
                $counter > $this->shortenArraysLongerThan) {
                break;
            }

            if (is_array($value)) {
                assert(is_array($data[$key]) || is_object($data[$key]));

                if ($processed->contains($data[$key]) !== false) {
                    $result[] = '*RECURSION*';
                } else {
                    assert(is_array($data[$key]));

                    $result[] = '[' . $this->shortenedCountedRecursiveExport($data[$key], $processed, $counter, $maxLengthForStrings) . ']';
                }
            } else {
                $result[] = $this->shortenedExport($value, $maxLengthForStrings);
            }

            $counter++;
        }

        return implode(', ', $result);
    }

    private function recursiveExport(mixed &$value, int $indentation = 0, ?RecursionContext $processed = null): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if ($value === null) {
            return 'null';
        }

<<<<<<< HEAD
        if ($value === true) {
            return 'true';
        }

        if ($value === false) {
            return 'false';
        }

        if (is_float($value)) {
            $precisionBackup = ini_get('precision');

            ini_set('precision', '-1');

            try {
                $valueStr = @(string) $value;

                if ((string) @(int) $value === $valueStr) {
                    return $valueStr . '.0';
                }

                return $valueStr;
            } finally {
                ini_set('precision', $precisionBackup);
            }
=======
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_float($value)) {
            return $this->exportFloat($value);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        if (gettype($value) === 'resource (closed)') {
            return 'resource (closed)';
        }

        if (is_resource($value)) {
            return sprintf(
                'resource(%d) of type (%s)',
<<<<<<< HEAD
                $value,
                get_resource_type($value)
=======
                (int) $value,
                get_resource_type($value),
            );
        }

        if ($value instanceof BackedEnum) {
            return sprintf(
                '%s Enum #%d (%s, %s)',
                $value::class,
                spl_object_id($value),
                $value->name,
                $this->export($value->value),
            );
        }

        if ($value instanceof UnitEnum) {
            return sprintf(
                '%s Enum #%d (%s)',
                $value::class,
                spl_object_id($value),
                $value->name,
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        if (is_string($value)) {
<<<<<<< HEAD
            // Match for most non printable chars somewhat taking multibyte chars into account
            if (preg_match('/[^\x09-\x0d\x1b\x20-\xff]/', $value)) {
                return 'Binary String: 0x' . bin2hex($value);
            }

            return "'" .
            str_replace(
                '<lf>',
                "\n",
                str_replace(
                    ["\r\n", "\n\r", "\r", "\n"],
                    ['\r\n<lf>', '\n\r<lf>', '\r<lf>', '\n<lf>'],
                    $value
                )
            ) .
            "'";
        }

        $whitespace = str_repeat(' ', 4 * $indentation);

        if (!$processed) {
            $processed = new Context;
        }

        if (is_array($value)) {
            if (($key = $processed->contains($value)) !== false) {
                return 'Array &' . $key;
            }

            $array  = $value;
            $key    = $processed->add($value);
            $values = '';

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= sprintf(
                        '%s    %s => %s' . "\n",
                        $whitespace,
                        $this->recursiveExport($k, $indentation),
                        $this->recursiveExport($value[$k], $indentation + 1, $processed)
                    );
                }

                $values = "\n" . $values . $whitespace;
            }

            return sprintf('Array &%s (%s)', $key, $values);
        }

        if (is_object($value)) {
            $class = get_class($value);

            if ($hash = $processed->contains($value)) {
                return sprintf('%s Object &%s', $class, $hash);
            }

            $hash   = $processed->add($value);
            $values = '';
            $array  = $this->toArray($value);

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= sprintf(
                        '%s    %s => %s' . "\n",
                        $whitespace,
                        $this->recursiveExport($k, $indentation),
                        $this->recursiveExport($v, $indentation + 1, $processed)
                    );
                }

                $values = "\n" . $values . $whitespace;
            }

            return sprintf('%s Object &%s (%s)', $class, $hash, $values);
=======
            return $this->exportString($value);
        }

        if (!$processed) {
            $processed = new RecursionContext;
        }

        if (is_array($value)) {
            return $this->exportArray($value, $processed, $indentation);
        }

        if (is_object($value)) {
            return $this->exportObject($value, $processed, $indentation);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        }

        return var_export($value, true);
    }
<<<<<<< HEAD
=======

    private function exportFloat(float $value): string
    {
        $precisionBackup = ini_get('precision');

        ini_set('precision', '-1');

        $valueAsString = @(string) $value;

        ini_set('precision', $precisionBackup);

        if ((string) @(int) $value === $valueAsString) {
            return $valueAsString . '.0';
        }

        return $valueAsString;
    }

    private function exportString(string $value): string
    {
        // Match for most non-printable chars somewhat taking multibyte chars into account
        if (preg_match('/[^\x09-\x0d\x1b\x20-\xff]/', $value)) {
            return 'Binary String: 0x' . bin2hex($value);
        }

        return "'" .
            strtr(
                $value,
                [
                    "\r\n" => '\r\n' . "\n",
                    "\n\r" => '\n\r' . "\n",
                    "\r"   => '\r' . "\n",
                    "\n"   => '\n' . "\n",
                ],
            ) .
            "'";
    }

    /**
     * @param array<mixed> $value
     */
    private function exportArray(array &$value, RecursionContext $processed, int $indentation): string
    {
        if (($key = $processed->contains($value)) !== false) {
            return 'Array &' . $key;
        }

        $array  = $value;
        $key    = $processed->add($value);
        $values = '';

        if (count($array) > 0) {
            $whitespace = str_repeat(' ', 4 * $indentation);

            foreach ($array as $k => $v) {
                $values .=
                    $whitespace
                    . '    ' .
                    $this->recursiveExport($k, $indentation)
                    . ' => ' .
                    /** @phpstan-ignore offsetAccess.invalidOffset */
                    $this->recursiveExport($value[$k], $indentation + 1, $processed)
                    . ",\n";
            }

            $values = "\n" . $values . $whitespace;
        }

        return 'Array &' . (string) $key . ' [' . $values . ']';
    }

    private function exportObject(object $value, RecursionContext $processed, int $indentation): string
    {
        $class = $value::class;

        if ($processed->contains($value) !== false) {
            return $class . ' Object #' . spl_object_id($value);
        }

        $processed->add($value);

        $array  = $this->toArray($value);
        $buffer = '';

        if (count($array) > 0) {
            $whitespace = str_repeat(' ', 4 * $indentation);

            foreach ($array as $k => $v) {
                $buffer .=
                    $whitespace
                    . '    ' .
                    $this->recursiveExport($k, $indentation)
                    . ' => ' .
                    $this->recursiveExport($v, $indentation + 1, $processed)
                    . ",\n";
            }

            $buffer = "\n" . $buffer . $whitespace;
        }

        return $class . ' Object #' . spl_object_id($value) . ' (' . $buffer . ')';
    }

    private function canBeReflected(object $object): bool
    {
        /** @phpstan-ignore class.notFound */
        if ($object instanceof Message) {
            // @codeCoverageIgnoreStart
            return false;
            // @codeCoverageIgnoreEnd
        }

        return true;
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
