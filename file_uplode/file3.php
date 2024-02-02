<?php
$conn = new mysqli("localhost", "root", "", "result_processing_db");

if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['tmp_name'];
    $file = fopen($filename, "r");

    if ($_FILES['file']['size'] > 0) {
        while ($target = fgetcsv($file, 1000, ",")) {
          print_r($target);
        }
        fclose($file); // Close the file handle after processing
    } else {
        echo "File failed to upload or is empty.";
    }
} else {
    echo "File upload not detected.";
}
?>


<form action="file3.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload" accept=".csv">
</form>
