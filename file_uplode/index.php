<?php
$conn = new mysqli("localhost", "root", "", "result_processing_db");

if (isset($_FILES['btn_upload'])) {
    $filename = $_FILES['file']['tmp_name'];
    $file = fopen($filename, "r");

    if ($filename = $_FILES['file']['size'] >0) {
        
    
    while($target = fgetcsv($file, 1000, ",")){
        echo$target[0];
    echo$target[1];
    echo$target[2];
    echo$target[3];
    }
    
}else{
    echo"file fail to upload";
}
if (!$target) {
    echo"file fail.....";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        result processing
    </title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="">
            <button type="submit" name="btn_upload">Upload</button>
        </form>
    </div>
</body>
</html>