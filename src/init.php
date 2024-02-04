<?php

if (!is_dir(__DIR__ . '/../'.$content_dir.'')) {
    $errorController->throwError('The folder <code class="text-red-400 font-mono bg-gray-700 rounded p-1">'.$content_dir.'</code> was not found. Please make sure you have created this folder or configured the folder correctly.');
    die();
}