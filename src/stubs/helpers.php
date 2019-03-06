<?php

if (!function_exists('flash')) {
    function flash($message)
    {
        session()->flash('flash', $message);
    }
}
