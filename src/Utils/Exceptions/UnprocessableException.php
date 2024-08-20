<?php declare(strict_types = 1);

namespace UlovDomov\Exceptions;

use UlovDomov\Http\StatusCode;

final class UnprocessableException extends \RuntimeException
{
    public static function createBadRequest(string $message, \Throwable|null $previous = null): self
    {
        return new self($message, StatusCode::BadRequest->value, $previous);
    }

    public static function createForbidden(string $message, \Throwable|null $previous = null): self
    {
        return new self($message, StatusCode::Forbidden->value, $previous);
    }

    public static function createNotFound(string $message, \Throwable|null $previous = null): self
    {
        return new self($message, StatusCode::NotFound->value, $previous);
    }

    public static function createInternalServerError(string $message, \Throwable|null $previous = null): self
    {
        return new self($message, StatusCode::InternalServerError->value, $previous);
    }
}
