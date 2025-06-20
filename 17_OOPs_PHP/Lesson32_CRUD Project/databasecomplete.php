<?php

class Database {
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "supercrud";

    private $mysqli = "";
    private $result = array();
    private $conn = false;

    public function __construct() {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }

    // Insert record into database
    public function insert($table, $params = array()) {
        if ($this->tableExists($table)) {
            $columns = implode(',', array_keys($params));
            $values = implode("','", array_values($params));

            $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Update record in database
    public function update($table, $params = array(), $where = null) {
        if ($this->tableExists($table)) {
            $args = [];
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }

            $sql = "UPDATE $table SET " . implode(', ', $args);
            if ($where != null) {
                $sql .= " WHERE $where";
            }

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Delete rows or entire table
    public function delete($table, $where = null) {
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Select data from table
    public function select($table, $rows = "*", $where = null, $order = null, $limit = null) {
        if ($this->tableExists($table)) {
            $sql = "SELECT $rows FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                $sql .= " LIMIT $limit";
            }

            $query = $this->mysqli->query($sql);

            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Check if table exists
    private function tableExists($table) {
        $sql = "SHOW TABLES FROM `$this->db_name` LIKE '$table'";
        $tableInDB = $this->mysqli->query($sql);
        if ($tableInDB) {
            if ($tableInDB->num_rows === 1) {
                return true;
            } else {
                array_push($this->result, "$table does not exist in database $this->db_name");
                return false;
            }
        }
    }

    // Return result data
    public function getResult() {
        $val = $this->result;
        $this->result = array(); // Reset after fetch
        return $val;
    }

    // Close connection
    public function __destruct() {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }
}
?>
