<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-text-template.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Template;

<<<<<<< HEAD
use function array_merge;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
=======
use function array_keys;
use function array_merge;
use function file_get_contents;
use function file_put_contents;
use function is_file;
use function is_string;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
use function sprintf;
use function str_replace;

final class Template
{
    /**
<<<<<<< HEAD
     * @var string
     */
    private $template = '';

    /**
     * @var string
     */
    private $openDelimiter;

    /**
     * @var string
     */
    private $closeDelimiter;

    /**
     * @var array
     */
    private $values = [];

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $file = '', string $openDelimiter = '{', string $closeDelimiter = '}')
    {
        $this->setFile($file);

=======
     * @var non-empty-string
     */
    private readonly string $template;

    /**
     * @var non-empty-string
     */
    private readonly string $openDelimiter;

    /**
     * @var non-empty-string
     */
    private readonly string $closeDelimiter;

    /**
     * @var array<string,string>
     */
    private array $values = [];

    /**
     * @param non-empty-string $templateFile
     * @param non-empty-string $openDelimiter
     * @param non-empty-string $closeDelimiter
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $templateFile, string $openDelimiter = '{', string $closeDelimiter = '}')
    {
        $this->template       = $this->loadTemplateFile($templateFile);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $this->openDelimiter  = $openDelimiter;
        $this->closeDelimiter = $closeDelimiter;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     */
    public function setFile(string $file): void
    {
        $distFile = $file . '.dist';

        if (file_exists($file)) {
            $this->template = file_get_contents($file);
        } elseif (file_exists($distFile)) {
            $this->template = file_get_contents($distFile);
        } else {
            throw new InvalidArgumentException(
                sprintf(
                    'Failed to load template "%s"',
                    $file
                )
            );
        }
    }

=======
     * @param array<string,string> $values
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function setVar(array $values, bool $merge = true): void
    {
        if (!$merge || empty($this->values)) {
            $this->values = $values;
<<<<<<< HEAD
        } else {
            $this->values = array_merge($this->values, $values);
        }
=======

            return;
        }

        $this->values = array_merge($this->values, $values);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    }

    public function render(): string
    {
        $keys = [];

<<<<<<< HEAD
        foreach ($this->values as $key => $value) {
=======
        foreach (array_keys($this->values) as $key) {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $keys[] = $this->openDelimiter . $key . $this->closeDelimiter;
        }

        return str_replace($keys, $this->values, $this->template);
    }

    /**
     * @codeCoverageIgnore
     */
    public function renderTo(string $target): void
    {
<<<<<<< HEAD
        if (!file_put_contents($target, $this->render())) {
            throw new RuntimeException(
                sprintf(
                    'Writing rendered result to "%s" failed',
                    $target
                )
            );
        }
    }
=======
        if (!@file_put_contents($target, $this->render())) {
            throw new RuntimeException(
                sprintf(
                    'Writing rendered result to "%s" failed',
                    $target,
                ),
            );
        }
    }

    /**
     * @param non-empty-string $file
     *
     * @throws InvalidArgumentException
     *
     * @return non-empty-string
     */
    private function loadTemplateFile(string $file): string
    {
        if (is_file($file)) {
            $template = file_get_contents($file);

            if (is_string($template) && !empty($template)) {
                return $template;
            }
        }

        $distFile = $file . '.dist';

        if (is_file($distFile)) {
            $template = file_get_contents($distFile);

            if (is_string($template) && !empty($template)) {
                return $template;
            }
        }

        throw new InvalidArgumentException(
            sprintf(
                'Failed to load template "%s"',
                $file,
            ),
        );
    }
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
}
