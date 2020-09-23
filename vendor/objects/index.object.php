<?php
    class index {


        private function login() {

        }
        
        private function register() {
            // "first-name=&last-name=&email=&password=&re-password=&action="
            if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
                /* Sanitize */
                $first_name = $_POST['first-name'];
                $last_name = $_POST['last-name'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $repass = $_POST['re-password'];
                
                /* Validation Inputs*/
            }
        }
        private function reset_password() {

        }
    }


    if($_SERVER['REQUEST_METHOD'] == "POST") {
        var_dump($_POST);
    }else {
        echo "Failed";
    }