<?php 
    class Database {
        private $dsn = "mysql:host=localhost;dbname=db_user_system";
        private $user = "root";
        private $pass = "";
        private $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];
        public $conn;

        public function __construct() {
            try {
                $this->conn = new PDO($this->dsn, $this->user, $this->pass, $this->options);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // echo "Connected Successfully";
            
            }catch(PDOException $e) {
                echo "Failed To Connect " . $e->getmessage();
            }

            return $this->conn;
        }
    
    }