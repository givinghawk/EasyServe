<?php
require 'src/errorController.php';
require 'src/htmlErrorCheck.php';
require 'config.php';

$errorController = new ErrorController();

// General initialisation
require __DIR__ . '/src/init.php';

// Get the page from the URL
$page = $_GET['page'] ?? 'index';

// Remove trailing slash from the page
$page = rtrim($page, '/');

// Check if the page exists
if (!is_file(__DIR__ . '/content/' . $page . '.html')) {
    $errorController->throwError('The page <code class="text-red-400 font-mono bg-gray-700 rounded p-1">' . $page . '.html</code> was not found.');
    die();
}

// Check the page to see if its html is valid
$errs = $errorController->checkHtmlErrors(file_get_contents(__DIR__ . '/content/' . $page . '.html'));
if (count($errs) > 0) {
    $errorController->throwError('The page <code class="text-red-400 font-mono bg-gray-700 rounded p-1">' . $page . '.html</code> contains errors. Please check the <a href="https://validator.w3.org/#validate_by_input" class="text-red-400 font-mono bg-gray-700 rounded p-1">W3C Validator</a> for more information.<br><br>' . implode('<br>', array_map(function ($err) {
        return $err->message;
    }, $errs)));
    die();
}

// If the page exists, return its contents
echo file_get_contents(__DIR__ . '/content/' . $page . '.html');