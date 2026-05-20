<?php declare(strict_types=1);
/*
 * This file is part of sebastian/global-state.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\GlobalState;

use const PHP_EOL;
use function is_array;
use function is_scalar;
use function serialize;
use function sprintf;
use function var_export;

<<<<<<< HEAD
/**
 * Exports parts of a Snapshot as PHP code.
 */
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
final class CodeExporter
{
    public function constants(Snapshot $snapshot): string
    {
        $result = '';

        foreach ($snapshot->constants() as $name => $value) {
            $result .= sprintf(
                'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                $name,
                $name,
<<<<<<< HEAD
                $this->exportVariable($value)
=======
                $this->exportVariable($value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $result;
    }

    public function globalVariables(Snapshot $snapshot): string
    {
        $result = <<<'EOT'
call_user_func(
    function ()
    {
        foreach (array_keys($GLOBALS) as $key) {
            unset($GLOBALS[$key]);
        }
    }
);


EOT;

        foreach ($snapshot->globalVariables() as $name => $value) {
            $result .= sprintf(
                '$GLOBALS[%s] = %s;' . PHP_EOL,
                $this->exportVariable($name),
<<<<<<< HEAD
                $this->exportVariable($value)
=======
                $this->exportVariable($value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $result;
    }

    public function iniSettings(Snapshot $snapshot): string
    {
        $result = '';

        foreach ($snapshot->iniSettings() as $key => $value) {
            $result .= sprintf(
                '@ini_set(%s, %s);' . "\n",
                $this->exportVariable($key),
<<<<<<< HEAD
                $this->exportVariable($value)
=======
                $this->exportVariable($value),
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            );
        }

        return $result;
    }

<<<<<<< HEAD
    private function exportVariable($variable): string
=======
    private function exportVariable(mixed $variable): string
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    {
        if (is_scalar($variable) || null === $variable ||
            (is_array($variable) && $this->arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' . var_export(serialize($variable), true) . ')';
    }

<<<<<<< HEAD
=======
    /**
     * @param array<mixed> $array
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    private function arrayOnlyContainsScalars(array $array): bool
    {
        $result = true;

        foreach ($array as $element) {
            if (is_array($element)) {
                $result = $this->arrayOnlyContainsScalars($element);
            } elseif (!is_scalar($element) && null !== $element) {
                $result = false;
            }

            if ($result === false) {
                break;
            }
        }

        return $result;
    }
}
