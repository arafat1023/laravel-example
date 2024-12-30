<?php
function loadEnv($file = '.env')
{
    if (!file_exists($file)) {
        throw new Exception("Environment file not found: $file");
    }

    $env = parse_ini_file($file, true);

    if ($env === false) {
        throw new Exception("Failed to parse environment file: $file");
    }

    return $env;
}
?>
