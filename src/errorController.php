<?php
/*
    * For the full copyright and license information, please view
    * the LICENSE file that was distributed with this source code.
*/
class ErrorController
{
    public function __construct()
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            if (in_array($errno, [E_NOTICE, E_WARNING, E_DEPRECATED])) return;
            $log = fopen(__DIR__ . '/../application_error.log', 'a');
            fwrite($log, '[' . date('Y-m-d H:i:s') . '] ' . $errstr . ' in ' . $errfile . ' on line ' . $errline . PHP_EOL);
            fclose($log);
            // Error string reccomended by @Freezemage0
            $errorString = "Aw shucks your thingy doesn't work, contact the developer :(";
            $this->throwError($errorString);
            die();
        });

        set_exception_handler(function ($e) {
            $log = fopen(__DIR__ . '/../application_error.log', 'a');
            fwrite($log, '[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine() . PHP_EOL);
            fclose($log);
            // Error string reccomended by @Freezemage0
            $errorString = "Aw shucks your thingy doesn't work, contact the developer :(";
            $this->throwError($errorString);
            die();
        });
    }

    public function throwError($error)
    {
        $error_message = $error;
        echo '<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Error</title><link rel="stylesheet" href="JHGuYNTFGytkum.css"></head><body class="bg-zinc-900 flex justify-center items-center"><div class="bg-zinc-800 rounded-xl p-5"><div class="text-center"><h1 class="text-6xl text-white">Error</h1><p class="text-red-500 text-xl">' . $error_message . '</p><p class="text-white"><a href="https://github.com/givinghawk/EasyServe" class="text-sky-500 font-semibold">GitHub</a> | <a href="https://github.com/givinghawk/EasyServe/wiki" class="text-sky-500 font-semibold">Documentation</a> | <a href="https://github.com/givinghawk/EasyServe/issues" class="text-sky-500 font-semibold">Report an issue</a></p><p class="text-white font-semibold">EasyServe '.file_get_contents(__DIR__.'/../version.txt').'</p></div></div></body></html>';
        die();
    }

    function checkHtmlErrors($html)
    {
        libxml_use_internal_errors(true);

        $dom = new DOMDocument;
        $dom->loadHTML($html);

        $errors = libxml_get_errors();
        libxml_clear_errors();

        return $errors;
    }

    public function fileExists($path)
    {
        if (!is_file($path)) {
            $this->throwError('The page <code class="text-red-400 font-mono bg-gray-700 rounded p-1">' . $path . '</code> was not found.');
            return false;
        } else {
            return true;
        }
    }
}
