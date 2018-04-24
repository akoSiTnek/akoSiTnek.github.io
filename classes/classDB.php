<?php

  class dbConnection {
        protected $db_conn;
        public $db_name = "peso";
        public $db_user = "root";
        public $db_pass = '';
        public $db_host = 'localhost';

        function connect(){
          try {
              $this->db_conn = new PDO ("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);
              // $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
              $result = $this->db_conn;
              return $result;
              }
              catch (PDOException $e)
              {
                return $e->getMessage();
              }
        }
  }

// $go = new dbConnection();
// echo $go->connect('tnek','tnek1','127.0.0.1','11:00','12-2-2002');
?>
