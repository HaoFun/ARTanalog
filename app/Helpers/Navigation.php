<?php

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route, $output = 'active')
    {
        if (\Illuminate\Support\Facades\Route::currentRouteName() === $route) {
            return $output;
        }
    }
}