<?php declare(strict_types=1);

namespace Mabe\Enum\Cl;

use AssertionError;
use BackedEnum;
use TypeError;
use ValueError;

/**
 * Abstract base class for emulated integer backed enumerations.
 *
 * @copyright 2022, Marc Bennewitz
 * @license http://github.com/marc-mabe/php-enum-cl/blob/main/LICENSE.txt New BSD License
 * @link http://github.com/marc-mabe/php-enum-cl for the canonical source repository
 *
 * @psalm-immutable
 */
abstract class EmulatedIntEnum //implements BackedEnum
{
    use EmulatedBackedEnumTrait;

    /**
     * The value of the current case
     *
     * @var int
     * @readonly
     */
    public $value;

    /**
     * @param int $value
     * @throws ValueError     If the given value is not defined in the enumeration
     * @throws TypeError      On argument type not matching enumeration type
     * @throws AssertionError On ambiguous case constant values or invalid case constant types
     */
    final public static function from(string|int $value): static
    {
        return static::_from(static::class, $value);
    }

    /**
     * @param int $value
     * @throws TypeError      On argument type not matching enumeration type
     * @throws AssertionError On ambiguous case constant values or invalid case constant types
     */
    final public static function tryFrom(string|int $value): ?static
    {
        return static::_tryFrom(static::class, $value);
    }
}
