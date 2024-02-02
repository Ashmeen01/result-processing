<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {

        // Specify the path to save the uploaded file
        $uploadPath = 'uploads/';

        // Create the 'uploads' directory if it doesn't exist
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Move the uploaded file to the specified directory
        $csvFilePath = $uploadPath . $_FILES['csvFile']['name'];
        move_uploaded_file($_FILES['csvFile']['tmp_name'], $csvFilePath);

        // Process the CSV file
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
    } else {
        // Handle error if no file was uploaded or an error occurred during upload
        echo "Error uploading file.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV File Upload</title>
</head>
<body>
    <form action="process_csv.php" method="post" enctype="multipart/form-data">
        <label for="csvFile">Choose a CSV file:</label>
        <input type="file" name="csvFile" id="csvFile" accept=".csv">
        <br>
        <input type="submit" value="Upload and Process">
    </form>
</body>
</html>
