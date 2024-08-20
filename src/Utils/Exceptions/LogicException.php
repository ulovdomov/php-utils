<?php declare(strict_types = 1);

namespace UlovDomov\Exceptions;

use Throwable;

final class LogicException extends \LogicException
{
    public static function create(string $message): self
    {
        return new self($message);
    }

    public static function createForNullValue(string $nameOfVariable): self
    {
        return new self(\sprintf('Variable `%s` must not be null.', $nameOfVariable));
    }

    public static function createForInvalidValue(string $nameOfVariable): self
    {
        return new self(\sprintf('Variable `%s` contains invalid value.', $nameOfVariable));
    }

    public static function createFromPrevious(Throwable $e): self
    {
        return new self($e->getMessage(), $e->getCode(), $e);
    }

    public static function createForInvalidEnumValue(string $value): self
    {
        return new self(\sprintf('Enum value: `%s` does not exist', $value));
    }
}
