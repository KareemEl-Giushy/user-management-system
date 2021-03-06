<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="layout/css/all.min.css">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<?php
    include 'core/functions/Auth.php';
    include 'core/functions/input_handler.inc.php';

    ob_start();
    $user = new Auth();
    $user->startSession();
    if( isset($_SESSION['user-email']) && !empty($_SESSION['user-email']) ){
        header('location: index.php');
        exit();
    }elseif( !isset($_GET['email']) && !isset($_GET['token']) ) {
        header('location: index.php');
        exit();
    }
    
    $inp = new input_handler();
    // Sanitize
    $email = $inp->sanitize($_GET['email'], 'email');
    $token = $inp->sanitize($_GET['token'], 'st');

    // Validate
    if( !empty($inp->validate($email, ['empty', 'email', 'nos'])) ) {
        header('location: index.php');
        exit();
    }
    if( !empty($inp->validate($token, ['empty'])) ) {
        header('location: index.php');
        exit();
    }
    if(!$user->user_exist($email)){
        header('location: index.php');
        exit();
    }
    if(!$user->check_token_reset($email, $token)){
        header('location: index.php');
        exit();
    }
    // echo $email . "<br>" . $token;

    // submitting data
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if the field exists
        if(!isset($_POST['password']) && !isset($_POST['rpassword'])){
            header('location: index.php');
            exit();
        }

        // sanitize
        $password = $inp->sanitize($_POST['password'], 'st');
        $repassword = $inp-> Sanitize($_POST['rpassword'], 'st');

        // validate
        $err = [];
        if( !empty($inp->validate($password, ['empty', 'len'])) ){
            $err[] = 'Invalid Password';
        }
        if( !empty($inp->validate($repassword, ['empty', 'len', 're'], $password)) ) {
            $err[] = 'Bad Confirmation';
        }
        
        
        if(empty($err)) {
            $hpass = sha1($password);
            $crows = $user->change_pass($email, $hpass);
            if($crows > 0) {
                // Display Message
                echo "<div class='alert alert-success text-center'><strong>Success</strong><div class='text-center'><a href='index.php'>Go To Login</a></div></div>";
                exit();
            }else {
                // Error Message
                echo '<div class="alert alert-danger text-center"><strong>Error</strong></div>';
                exit();
            }
        }else {
          echo '<div class="alert alert-danger text-center"><strong>Error</strong></div>';
          exit();
        }
    } ?>
<body>
    <div class="container">
    <div class="row justify-content-center wrapper">
            <div class="col col-lg-8 my-auto">
                <div class="card-group login-shadow row">
                    <div class="col p-0">
                        <div class="card rounded-left">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Reset Your Password</h2>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="login-form">
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="New-Password" required>
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="rpassword" id="rpassword" class="form-control rounded-0" placeholder="Confirm New-Password" required>
                                    </div>
                                    <div class="form-group w-100 text-center">
                                        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                    <div class="form-group text-center m-0">
                                        <a href="index.php" class='text-primary'>Go Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascripts -->
    <script src="layout/js/jquery-3.5.1.min.js"></script>
    <script src='layout/js/reset-pass.js'></script>
</body>
</html>