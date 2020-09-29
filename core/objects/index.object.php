<?php
include '../functions/input_handler.inc.php';
include '../functions/connect.inc.php';

    class index {


        public function login() {

        }
        
        public function register() {
            // "first-name=&last-name=&email=&password=&re-password=&action="
            if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
                /* Sanitize */
                // $first_name     = filter_var($_POST['first-name'], FILTER_SANITIZE_SPECIAL_CHARS);
                // $last_name      = filter_var($_POST['last-name'], FILTER_SANITIZE_SPECIAL_CHARS);
                // $email          = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                // $pass           = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                // $repass         = filter_var($_POST['re-password'], FILTER_SANITIZE_STRING);
                $inp = new input_handler();

                $first_name     =  trim( $inp->sanitize($_POST['first-name'], 'st') );
                $last_name      =  trim( $inp->sanitize($_POST['last-name'], 'st') );
                $email          =  trim( $inp->sanitize($_POST['email'], 'email') );
                $pass           =  trim( $inp->sanitize($_POST['password'], 'st') );
                $repass         =  trim( $inp->sanitize($_POST['re-password'], 'st') );
                
                /* Inputs Validation*/
                var_dump( $inp->validate($first_name, ['empty']) );
                var_dump( $inp->validate($last_name, ['empty']) );
                var_dump( $inp->validate($email, ['empty', 'email']) );
                var_dump( $inp->validate($pass, ['empty', 'len']) );
                var_dump( $inp->validate($repass, ['empty', 'len', 're'], $pass) );
            }
        }
        
        public function reset_password() {

        }
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