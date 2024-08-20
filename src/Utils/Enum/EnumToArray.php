<?php declare(strict_types = 1);

namespace UlovDomov\Enum;

trait EnumToArray
{
    /**
     * @return array<string>
     */
    public static function names(): array
    {
        return \array_column(self::cases(), 'name');
    }

    /**
     * @return array<string|int>
     */
    public static function values(): array
    {
        return \array_column(self::cases(), 'value');
    }

    /**
     * @return array<string>
     */
    public static function array(): array
    {
        return \array_combine(self::values(), self::names());
    }
}
