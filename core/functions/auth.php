<?php
require_once 'connect.inc.php';

    class auth extends database {

        function startSession() {
            if(session_status() <= 1) {
                session_start();
            }
        }
        
        function redirect($url = "index.php") {
            if(!isset($_SESSION['user-email'])) {
                header("location: $url");
                exit();
            }
        }

        function register($fname, $lname, $email, $password) {
            if( !$this->user_exist($email, $password) ) {
                $stmt = $this->conn->prepare("INSERT INTO users(first_name, last_name, email, `password`) VALUES (:fname, :lname, :email, :pass)");
                $stmt->execute([
                    'fname' => $fname,
                    "lname" => $lname,
                    'email' => $email,
                    "pass" => $password,
                ]);
                return $stmt->rowCount();
            }else {
                return'This Email Is Already Exists';
            }
        }

        function login($email, $password) {
            if($this->user_exist($email)){
                $stmt = $this->conn->prepare("SELECT email, `password` FROM users WHERE email = ? AND `password` = ? AND deleted = 0");
                $stmt->execute([
                    $email,
                    $password
                ]);
                return $stmt->rowCount();
            }else {
                return "There Is No User With This Email Address";
            }
        }

        function user_exist($email) {
            $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $crows = $stmt->rowCount();
            
            if($crows > 0) {
                return true;
            }else {
                return false;
            }

        }
        
        function rememberme($reqval, $email) {
            if($reqval == 'on') {

                setcookie('email', $email, time() + 7*24*30*30, '/');

            }elseif($reqval == "expire") {
                setcookie('email', '', time() - 3600, '/');
            }
        }

        function userinfo($email) {
            if($this->user_exist($email)) {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND deleted = 0");
                $stmt->execute([$email]);
                $info = $stmt->fetch(PDO::FETCH_ASSOC);
                unset($info['password']);
                return $info;
            }
        }

        function logout() {
            session_start();
            session_unset();
            session_destroy();
        }

    }

    // End The Class
