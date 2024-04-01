<?php

namespace Framework;

class Sanitization
{
    public static function sanitizeHTML($value)
    {
        $value = trim($value);
        return htmlspecialchars($value);
    }
}