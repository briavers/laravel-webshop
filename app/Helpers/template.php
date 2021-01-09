<?php

if (!function_exists('__u')) {
    function __u(string $key, $params = [], $locale = null): string
    {
        return ucfirst(__($key, $params, $locale));
    }
}
if (!function_exists('__um')) {
    function __um(string $key, int $amount, $params = [], $locale = null): string
    {
        return ucfirst(trans_choice($key, $amount, $params, $locale));
    }
}

if (!function_exists('money')) {
    function money(?float $amount): string
    {
        return '€' . number_format($amount, 2);
    }
}
