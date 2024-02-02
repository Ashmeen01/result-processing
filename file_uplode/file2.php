<?php

// Specify the path to your CSV file
$csvFilePath = 'your_file.csv';

// Open the CSV file for reading
if (($handle = fopen($csvFilePath, 'r')) !== false) {
    
    // Iterate through each row in the CSV file
    while (($data = fgetcsv($handle)) !== false) {
        // $data is an array containing the values of the current row
        print_r($data);
    }

    // Close the file handle
    fclose($handle);
} else {
    // Handle error if unable to open the file
    echo "Error opening file.";
}
?>
