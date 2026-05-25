<?php

use App\Models\Content;

if (!function_exists('content')) {
    function content(string $key, string $default = ''): string
    {
        $content = Content::where('key', $key)->first();
        return $content?->value ?? $default;
    }
}
