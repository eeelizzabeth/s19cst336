<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection("cinder");
    
    $user = $_GET["user_id"];
    $other_user = $_GET["match_user_id"];
    $sql = "SELECT user_id, match_user_id FROM match";
    
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>