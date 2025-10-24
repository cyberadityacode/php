<?php // phpcs:ignoreFile

$apiResponse = json_decode('{"user": "cyberaditya", "email": "adityadubey793@gmail.com", "plan": "premium"}', true);

echo "<pre>";
print_r($apiResponse);

// Extract specific fields

['user'=> $username, 'email'=>$email] = $apiResponse;

echo "Welcome $username , $email";

echo "<br />";

$timestamp = '2024-01-15 14:30:25';

[$datePart, $timePart] = explode(" ", $timestamp);

echo "Date Part is $datePart";
echo "<br />Time Part is $timePart";

// Now year, month and date should be separated.

[$year, $month, $day] = explode("-", $datePart);
echo "<br />Day: $day, Month: $month, Year: $year";

// Simarly, hour:minutes:seconds can be separated.

[$hour,$minute,$second] = explode(":", $timePart);
echo "<br />Hour:$hour,Minute:$minute,Second:$second";