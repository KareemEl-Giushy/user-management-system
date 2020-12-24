<?php
require_once 'connect.inc.php';

    class auth extends database {

        function startSession() {
            if(session_status() <= 1) {
                session_start();
            }
        }
        
        function redirect($url = "index.php") {
            if( !isset($_SESSION['user-email']) && empty($_SESSION['user-email']) ) {
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
                return 0;
            }
        }

        function reset_password($email, $token) {
            if($this->user_exist($email)) {
            
                $stmt = $this->conn->prepare("UPDATE users SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 15 MINUTE) WHERE email = :email");
                $stmt->execute([
                    'email' => $email,
                    'token' => $token
                ]);

                return $stmt->rowCount();
            }else {
                return "There Is No User With This Email Address";
            }
        }

        function check_token_reset($email, $token) {
            if($this->user_exist($email)) {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email AND token = :token AND token_expire > NOW() AND deleted = 0");
                $stmt->execute([
                    'email' => $email,
                    'token' => $token
                ]);

                if($stmt->rowcount() > 0) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        function change_pass($email, $newPass) {
            if($this->user_exist($email)) {
                $stmt = $this->conn->prepare("UPDATE users SET `password` = :newpassword WHERE email = :email AND deleted = 0");
                $stmt->execute([
                    'newpassword' => $newPass,
                    "email" => $email
                ]);

                return $stmt->rowCount();
            }
        }

        function user_exist($email) {
            $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = ? AND deleted = 0");
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

        function create_token($pre = "") {
            $token = uniqid();
            $token = $pre . str_shuffle($token);
            return $token;
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
