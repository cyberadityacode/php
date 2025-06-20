<?php

class Database{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "supercrud";

    private $mysqli = "";
    private $result = array();
    private $conn = false;

    public function __construct(){
        if(!$this->conn){
            $this->mysqli = new mysqli($this->db_host, $this->db_user,$this->db_pass,$this->db_name);

            if($this->mysqli->connect_error){
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }
        }else{
            return true;
        }
    }

    // function to insert into the database
    public function insert(){}

    // function to update row in database
    public function update(){}

    // function to delete table or row(s) from the database
    public function delete(){}

    // function to select from the Database
    public function select(){}

    // close connection
    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }else{
            return false;
        }
    }
    
}

?>