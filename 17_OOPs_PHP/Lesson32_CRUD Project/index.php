<?php

include "database.php";

$obj = new Database();

$obj->insert('tasks', ['task_name'=>'value20june', 'status_id'=>'1', 'created_by'=>'1', 'updated_by'=>'1']);

echo "Insert ID: ";
print_r($obj->getResult());


?>