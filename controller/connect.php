<?php 
    class Connect{
        private $server = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db = 'shoope';
        public function connect(){
          $conn = new mysqli($this->server,$this->username,$this->password,$this->db);
          return $conn;
        }

    }
?>