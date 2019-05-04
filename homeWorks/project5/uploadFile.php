<?php 
// http://php.net/manual/en/features.file-upload.multiple.php
    require "dbConnection.php";
    $conn = getDatabaseConnection("gallery");

    $file_ary = reArrayFiles($_FILES['fileName']);

    foreach ($file_ary as $file) {
        if ($file["error"] > 0) {
          echo "Error: " . $file["error"] . "<br>";
        }
        else {
          echo "Upload: " . $file["name"] . "<br>";
          echo "Type: " . $file["type"] . "<br>";
          echo "Size: " . ($file["size"] / 1024) . " KB<br>";
          echo "Stored in: " . $file["tmp_name"] . "<br><br>";
          
          insertImage($file["tmp_name"]);
        }  
        // print 'File Name: ' . $file['name'];
        // print 'File Type: ' . $file['type'];
        // print 'File Size: ' . $file['size'];
    }
    

    function reArrayFiles(&$file_post) {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_ary;
    }
    
    function insertImage($file_img)
    {
        $image = addslashes(file_get_contents($_FILES[$file_img]['tmp_name'])); //SQL Injection defence!
        $image_name = addslashes($_FILES[$file_img]['name']);
        $sql = "INSERT INTO `images` (`email`, `image`, `image_name`) 
                VALUES (" . $_GET["email"] . "," . $_GET["comment"] . ", '{$image}', '{$image_name}')";
        if (!mysql_query($sql)) { // Error handling
            echo "Something went wrong! :("; 
        }
    }
?>