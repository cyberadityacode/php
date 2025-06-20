<?php
class DBWakeup {
    private $connection;

    public function __construct($conn =null){
        // Accept a PDO object or create one
        if($conn instanceof PDO){

            $this->connection = $conn;
        }
        else{
            $this->connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
        }
    }
    public function getConnection() {
        return $this->connection;
    }

    public function __sleep(){
        return []; //don't serialize connection
    }

    public function __wakeup(){
        $this->connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
        echo "Database connection re-established in __wakeup()\n";
    }
}

// Create object
$dbObj = new DBWakeup();

// Serialize
$serialized = serialize($dbObj);
echo "Serialized DBWakeup:\n$serialized\n\n";

// Unserialize
$unserializedObj = unserialize($serialized);

// Check if connection works
$conn = $unserializedObj->getConnection();
if ($conn instanceof PDO) {
    echo "Connection is active and ready to use.\n";
}

?>
