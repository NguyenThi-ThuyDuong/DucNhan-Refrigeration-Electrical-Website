<?php
// ALWAYS ensure working directory is set to root directory of project for every request
chdir(__DIR__);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filePath = __DIR__ . $uri;

// Handle directories like /sota/ or /sota by routing to index.php inside that directory
if (is_dir($filePath)) {
    $filePath = rtrim($filePath, '/') . '/index.php';
}

if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    if (str_ends_with($filePath, '.php')) {
        $_SERVER['SCRIPT_NAME'] = str_replace('\\', '/', substr($filePath, strlen(__DIR__)));
        $_SERVER['SCRIPT_FILENAME'] = $filePath;
        chdir(dirname($filePath));
        require $filePath;
        chdir(__DIR__); // Reset back to root after executing sub-script
        return true;
    }
    return false; // Serve static file directly
}

$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
