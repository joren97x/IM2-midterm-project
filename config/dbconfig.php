<?php
    Class Database{
        private $server = 'localhost';
        private $username = 'root';
        private $pwrd = '';
        private $db_name = 'dbim23b';

        private $conn = null;
        private $state;
        private $errmsg;

        public function __construct(){
            try{
                 $this->conn = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db_name, $this->username, $this->pwrd);
                //  $this->conn = new PDO("mysql:host= localhost;dbname=dbim23b", $this->username, $this->pwrd);
                 $this->conn->exec("set names utf8");
                $this->state = true;
            }catch(PDOException $exception){
                $this->errmsg =  "Connection error: " . $exception->getMessage();
                $this->state = false;
            }
        }
        
        public function getDb(){
            return $this->conn;
        }
        public function getState(){
                return $this->state;
        }
        public function getErrorMsg(){
            return $this->$errmsg;
        }
        public function  dbClose(){
            $this->conn->close();
        }
    }
?>