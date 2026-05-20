<?php declare(strict_types=1);
/*
 * This file is part of sebastian/type.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Type;

<<<<<<< HEAD
final class Parameter
{
    /**
     * @psalm-var non-empty-string
     */
    private $name;

    /**
     * @var Type
     */
    private $type;

    /**
     * @psalm-param non-empty-string $name
=======
/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for this library
 */
final readonly class Parameter
{
    /**
     * @var non-empty-string
     */
    private string $name;
    private Type $type;

    /**
     * @param non-empty-string $name
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
     */
    public function __construct(string $name, Type $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

<<<<<<< HEAD
=======
    /**
     * @return non-empty-string
     */
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function name(): string
    {
        return $this->name;
    }

    public function type(): Type
    {
        return $this->type;
    }
}
