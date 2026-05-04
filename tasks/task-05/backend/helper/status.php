<?php

class HttpStatus {
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;
    public const NO_CONTENT = 204;

    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const CONFLICT = 409;
    public const UNPROCESSABLE_ENTITY = 422;

    public const INTERNAL_SERVER_ERROR = 500;
    public const NOT_IMPLEMENTED = 501;
    public const SERVICE_UNAVAILABLE = 503;

    public static function getMessage(int $code): string {
        $messages = [
            200 => "Success",
            201 => "Resource Created Successfully",
            400 => "Bad Request - Please check your input",
            404 => "Resource Not Found",
            405 => "Method Not Allowed",
            500 => "Internal Server Error - Something went wrong on our side"
        ];
        return $messages[$code] ?? "Unknown Status";
    }
}
