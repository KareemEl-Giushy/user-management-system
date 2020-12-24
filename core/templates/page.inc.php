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
                    <link rel="stylesheet" href="layout/css/datatables.min.css">
                    <link rel="stylesheet" href="layout/css/style.css">
                </head>
                <body> ';
        }

        public function navbar($username) {
            echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="home.php">User-System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="feedback.php"><i class="fas fa-comment-dots"></i> Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="notification.php"><i class="fas fa-bell"></i> Notification</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-cog"></i> Hi! ' . $username . '
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item px-3" href="#"><i class="fas fa-cogs fa-xs"></i> Settings</a>
                                <!--a class="dropdown-item px-3" href="#">Another action</a-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item px-3" href="logout.php"><i class="fas fa-sign-out-alt"></i> logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>';
        }

        public function footer($scripts = []) {
            echo '
                <footer>
                    <!-- javascipt -->
                    <script src="layout/js/jquery-3.5.1.min.js"></script>
                    <script src="layout/js/bootstrap.bundle.min.js"></script>
                    <script src="layout/js/datatables.min.js"></script>
                    ';
                    
            if(!empty($scripts)){
                foreach($scripts as $src){
                    echo "<script src='$src'></script>";
                }
            }
                    
            echo'
                </footer>
            </body>
            </html>';
        }

        // End Class
    }