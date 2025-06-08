<?php

// path to read my csv file
$csvFile = 'data.csv';

// open the file

$handle = fopen($csvFile, 'r');

if ($handle !== false) {
    echo "I got the file $csvFile";

    $data = [];
    $header = fgetcsv($handle);  //read the header row

    while (($row = fgetcsv($handle)) !== false) {
        $data[] = array_combine($header, $row);
    }

    fclose($handle);

    // show rows where status is active

    foreach ($data as $entry) {
        if (isset($entry['status']) && strtolower($entry['status']) === 'active') {
            print_r($entry);
        }
    }

}