<?php declare(strict_types = 1);

namespace UlovDomov\Exceptions;

use UlovDomov\Http\StatusCode;

final class ValidationException extends \RuntimeException
{
    public static function create(string $message): self
    {
        return new self($message, StatusCode::BadRequest->value);
    }

    public static function createForNotFoundKey(string|int $key): self
    {
        return self::create(\sprintf('Key `%s` not exists in data', $key));
    }

    public static function createForNullValue(string|int $key): self
    {
        return self::create(\sprintf('Value for key `%s` can not be null', $key));
    }

    public static function createForInvalidValue(string|int $key, string $type): self
    {
        return self::create(\sprintf('Invalid value for key `%s`, correct type is `%s`', $key, $type));
    }
}
