<?php
if (!function_exists('bws_require_once')) {
    function bws_require_once($path = '')
    {
        $path = get_template_directory() . $path;
        file_exists($path) ? require_once($path) : null;
    }
}

// setup theme
bws_require_once('/inc/setup-theme.php');
bws_require_once('/inc/customizer.php');
