<?php
require 'src/errorController.php';
require 'src/prepController.php';
require 'config.php';
require 'vendor/autoload.php';
$errorController = new ErrorController();
$prep = new PrepController();

// General initialisation
require __DIR__ . '/src/init.php';

// Get the page from the URL
$page = $_GET['page'] ?? 'index';

// Remove trailing slash from the page
$page = rtrim($page, '/');

// Check the page to see if its html is valid
$errs = $errorController->checkHtmlErrors(file_get_contents(__DIR__ . '/' . $content_dir . '/' . $page . '.html'));
if (count($errs) > 0) {
    $errorController->throwError('The page <code class="text-red-400 font-mono bg-gray-700 rounded p-1">' . $page . '.html</code> contains errors. Please check the <a href="https://validator.w3.org/#validate_by_input" class="text-red-400 font-mono bg-gray-700 rounded p-1">W3C Validator</a> for more information.<br><br>' . implode('<br>', array_map(function ($err) {
        return $err->message;
    }, $errs)));
    die();
}

if ($mode == 'md') {
    $Parsedown = new Parsedown();
    if ($errorController->fileExists(__DIR__.'/'.$content_dir . '/' . $page . '.md')) {
        $prep->serveMarkdown($Parsedown->text(file_get_contents(__DIR__ . '/' . $content_dir . '/' . $page . '.md')), ucfirst($page));
    } else {
        die();
    }
} else if ($mode == 'html') {
    if ($errorController->fileExists(__DIR__.'/'.$content_dir . '/' . $page . '.html')) {
        echo file_get_contents(__DIR__ . '/' . $content_dir . '/' . $page . '.html');
    } else {
        die();
    }
}
