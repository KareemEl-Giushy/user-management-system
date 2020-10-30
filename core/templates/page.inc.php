<?php
    class page {
        
        public $icon = '';

        public function __construct($i = 'favicon.png') {
            $this->icon = $i;
        }

        public function header($title = 'Index - Defualt') {
            echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>' . $title . '</title>
                    <link rel="icon" type="image/png" href="' . $this->icon . '"/>
                    <link rel="stylesheet" href="layout/css/all.min.css">
                    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
                    <link rel="stylesheet" href="layout/css/style.css">
                </head>
                <body> ';
        }

        public function footer() {
            echo '
                <footer>
                    <!-- javascipt -->
                    <script src="layout/js/jquery-3.5.1.min.js"></script>
                    <script src="layout/js/bootstrap.bundle.min.js"></script>
                    <script src="layout/js/main.js"></script>
                </footer>
            </body>
            </html>';
        }
    }