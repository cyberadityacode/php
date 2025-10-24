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

// CSV handling

$csvLine = 'John,Doe,30,Software Engineer,San Francisco';

[$firstName, $lastName,$age, $jobTitle, $city] = str_getcsv($csvLine);

echo "<br />Firstname: $firstName, City: $city";

$userProfile = [
    'full_name' => "$firstName $lastName",
    'age' =>$age,
    'profession' =>$jobTitle,
    'location' =>$city
];

if(is_array($userProfile)){
    echo "<pre>";
    print_r($userProfile);
    echo json_encode($userProfile); //or convert into json for frontend handling.
}

/* 
str_getcsv and explode does similar work, but str_getcsv also trims space.
*/

