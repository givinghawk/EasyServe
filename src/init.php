<?php
if (!is_file(__DIR__ . '/../content/index.html')) {
    $errorController->throwError('The file <code class="text-red-400 font-mono bg-gray-700 rounded p-1">index.html</code> was not found. Please make sure you have created this file.');
    die();
}