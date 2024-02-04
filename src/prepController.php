<?php
/*
    * Prep Controller
    * 
    * This file contains the PrepController class
    * 
    * For the full copyright and license information, please view
    * the LICENSE file that was distributed with this source code.
*/

class PrepController
{
    public function serveMarkdown($markdown, $title = 'EasyServe')
    {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>$title</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js'></script>
    <script>hljs.highlightAll();</script>
  </head>
  <body>
  <div class='px-4 py-5 my-5 text-center'>
    <h1 class='display-5 fw-bold text-body-emphasis'>$title</h1>
  </div>
    <div id='content' class='container'>
        $markdown
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
  </body>
</html>
";
    }
}