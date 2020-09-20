<?php
    class index {


        private function login() {

        }
        private function register() {
            // "first-name=&last-name=&email=&password=&re-password="
            if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
                $first_name = $_POST['first-name'];
                $last_name = $_POST['last-name'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $repass = $_POST['re-password'];
                /* */
            }
        }
        private function reset_password() {

        }
    }