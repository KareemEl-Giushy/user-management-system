<?php
require_once 'connect.inc.php';

    class auth extends database {

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

        function user_exist($email) {
            $stmt = $this->conn->prepare("SELECT email, `password` FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $crows = $stmt->rowCount();
            
            if($crows > 0) {
                return true;
            }else {
                return false;
            }

        }

    }

    // End The Class
