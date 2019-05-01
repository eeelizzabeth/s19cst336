<?php

    $dbname = "poll";
    $host = "localhost";
    
    $username = "root";
    $password = "";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $checked = $_GET["checked"];
    
    $sql = "UPDATE " . $checked . " FROM poll_response";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
// session_start();
// //TODO: Save incoming data into session


// if(!isset($_SESSION["progress"])){
//     $_SESSION["progress"] = 0;
// }

// echo json_encode($_SESSION)
?>