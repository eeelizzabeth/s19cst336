<?php
    require "dbConnection.php";
    $conn = getDatabaseConnection("gallery");
    
    //enter email into the database
    $sql = "INSERT INTO images (email_address) VALUES ('" . $_GET["email"] . "')";

    var_dump($_GET);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    echo "Added!"


?>