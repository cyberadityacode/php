<?php
require 'dynamic_configuration.php';

use conf\ConfigMe;

$configObj = new ConfigMe();
$configObj->timezone = 'Asia/Kolkata';

echo $configObj->timezone;

?>