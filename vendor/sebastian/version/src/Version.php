<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
/*
 * This file is part of sebastian/version.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

namespace SebastianBergmann;

final class Version
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $release;

    /**
     * @var string
     */
    private $version;

    public function __construct(string $release, string $path)
    {
        $this->release = $release;
        $this->path    = $path;
    }

    public function getVersion(): string
    {
        if ($this->version === null) {
            if (\substr_count($this->release, '.') + 1 === 3) {
                $this->version = $this->release;
            } else {
                $this->version = $this->release . '-dev';
            }

            $git = $this->getGitInformation($this->path);

            if ($git) {
                if (\substr_count($this->release, '.') + 1 === 3) {
                    $this->version = $git;
                } else {
                    $git = \explode('-', $git);

                    $this->version = $this->release . '-' . \end($git);
                }
            }
        }

=======
namespace SebastianBergmann;

use function end;
use function explode;
use function fclose;
use function is_dir;
use function is_resource;
use function proc_close;
use function proc_open;
use function stream_get_contents;
use function substr_count;
use function trim;

final readonly class Version
{
    /**
     * @var non-empty-string
     */
    private string $version;

    /**
     * @param non-empty-string $release
     * @param non-empty-string $path
     */
    public function __construct(string $release, string $path)
    {
        $this->version = $this->generate($release, $path);
    }

    /**
     * @return non-empty-string
     */
    public function asString(): string
    {
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        return $this->version;
    }

    /**
<<<<<<< HEAD
     * @return bool|string
     */
    private function getGitInformation(string $path)
    {
        if (!\is_dir($path . DIRECTORY_SEPARATOR . '.git')) {
            return false;
        }

        $process = \proc_open(
            'git describe --tags',
=======
     * @param non-empty-string $release
     * @param non-empty-string $path
     *
     * @return non-empty-string
     */
    private function generate(string $release, string $path): string
    {
        if (substr_count($release, '.') + 1 === 3) {
            $version = $release;
        } else {
            $version = $release . '-dev';
        }

        $git = $this->getGitInformation($path);

        if (!$git) {
            return $version;
        }

        if (substr_count($release, '.') + 1 === 3) {
            return $git;
        }

        $git = explode('-', $git);

        return $release . '-' . end($git);
    }

    /**
     * @param non-empty-string $path
     */
    private function getGitInformation(string $path): false|string
    {
        if (!is_dir($path . DIRECTORY_SEPARATOR . '.git')) {
            return false;
        }

        $process = proc_open(
            ['git', 'describe', '--tags'],
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            [
                1 => ['pipe', 'w'],
                2 => ['pipe', 'w'],
            ],
            $pipes,
<<<<<<< HEAD
            $path
        );

        if (!\is_resource($process)) {
            return false;
        }

        $result = \trim(\stream_get_contents($pipes[1]));

        \fclose($pipes[1]);
        \fclose($pipes[2]);

        $returnCode = \proc_close($process);
=======
            $path,
        );

        if (!is_resource($process)) {
            return false;
        }

        $result = trim((string) stream_get_contents($pipes[1]));

        fclose($pipes[1]);
        fclose($pipes[2]);

        $returnCode = proc_close($process);
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123

        if ($returnCode !== 0) {
            return false;
        }

        return $result;
    }
}
