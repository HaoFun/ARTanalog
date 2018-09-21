<?php

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route, $output = 'active')
    {
        if (str_is($route . '*', request()->route()->getName())) {
            return $output;
        }
    }
}