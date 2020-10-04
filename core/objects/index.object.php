<?php
include '../functions/input_handler.inc.php';
include '../functions/auth.php';
include '../templates/msg.inc.php';

    class index {


        public function login() {
            // "email=&password=&action="
            $inp = new input_handler();
            /* Sanitization */
            $email = trim( $inp->sanitize($_POST['email'], 'email') );
            $password = trim( $inp->sanitize($_POST['password'], 'st') );

            /* Validation */
            $err = [];
            if(!empty( $inp->validate($email, ['empty', 'email']) )) {
                $err[] = "Please Enter A Valid Email Address";
            }

            if(!empty( $inp->validate($password, ['empty']) )) {
                $err[] = "Password Can't Be Empty";
            }

            $alert = new msg();
            if(empty($err)) {
                $hpass = sha1($password);
                $user = new auth();
                $msg = $user->login($email, $hpass);

                if($msg > 0) {
                    $user->startSession();
                    // User Exists Redirect Him To Home Page
                    // User In our database and his password and email is correct
                    $_SESSION['user-email'] = $email;
                    $rem = ( isset($_POST['rem']) && !empty($_POST['rem']) ) ? trim( $inp->sanitize($_POST['rem'], 'st') ) : 'expire';
                    $user->rememberme($rem, $email);

                }elseif($msg == 0) {
                    // user credintials is wrong
                    echo $alert->alert('danger', "Incorrect Email Or Password", 'fas fa-exclamation-triangle');
               
                }else {
                    echo $alert->alert('danger', $msg, 'fas fa-exclamation-triangle');
                }
            }else {
                foreach($err as $er) {
                    echo $alert->alert('danger', $er, 'fas fa-exclamation-triangle');
                }
            }
        }
        
        public function register() {
            // "first-name=&last-name=&email=&password=&re-password=&action="
            if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
                /* Sanitize */
                $inp = new input_handler();

                $first_name     =  trim( $inp->sanitize($_POST['first-name'], 'st') );
                $last_name      =  trim( $inp->sanitize($_POST['last-name'], 'st') );
                $email          =  trim( $inp->sanitize($_POST['email'], 'email') );
                $pass           =  trim( $inp->sanitize($_POST['password'], 'st') );
                $repass         =  trim( $inp->sanitize($_POST['re-password'], 'st') );
                
                /* Inputs Validation*/
                $err = [];
                if( !empty($inp->validate($first_name, ['empty'])) ) {

                    $err[] = 'First Name Can\'t Be Empty';
                }

                if( !empty($inp->validate($last_name, ['empty'])) ) {

                    $err[] = 'Last Name Can\'t Be Empty';
                }
                
                if( !empty($inp->validate($email, ['empty', 'email'])) ) {

                    $err[] = 'Please Enter A Valid Email Address';
                }
                
                if( !empty($inp->validate($pass, ['empty', 'len'])) ) {

                    $err[] = 'Please Enter A 7 characters long Password';
                }
                
                if( !empty($inp->validate($repass, ['empty', 'len', 're'], $pass)) ) {

                    $err[] = 'Please Write The Same Password';
                }

                // Register Data
                $alert = new msg();
                if(empty($err)){
                    $hpass = sha1($pass);
                    $user = new auth();
                    $msg = $user->register(
                        $first_name,
                        $last_name,
                        $email,
                        $hpass,
                    );
                    if($msg <= 0) {
                        //Register Failure
                        echo $alert->alert('danger', $msg, 'fas fa-exclamation-triangle');

                    }
                    
                }else {
                    foreach ($err as $er) {
                        echo $alert->alert('danger', $er, 'fas fa-exclamation-triangle');
                    }
                }

            }
        }
        
        public function reset_password() {
            // email=&action=
            /* Sanitize */
            $inp = new input_handler();

            $email = $inp->sanitize($_POST['email'], 'email');

            /* Validate */
            $err = [];
            if(!empty( $inp->validate($email, ['empty', 'email']) )) {
                $err[] = 'Please Enter A Valid Email Address';
            }

            $alert = new msg();
            if(empty($err)) {
                $user = new auth();
                $msg = $user->reset_password($email);
                echo $msg;
                
            }else {
                foreach($err as $er) {
                    echo $alert->alert('danger', $er, 'fas fa-exclamation-triangle');
                }
            }

        }

        // End Class INDEX
    }

    /* Requests Handling */
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        // var_dump($_POST);
        $act = new index();
        
        if($_POST['action'] == 'register') {
            $act->register();
        }
        
        if($_POST['action'] == 'login'){
            $act->login();
        }

        if($_POST['action'] == 'resetpass'){
            $act->reset_password();
        }

    }else {
        echo "Failed";
    }