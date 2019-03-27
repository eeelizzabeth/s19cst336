<?php
    session_start();
    
    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    
    switch($httpMethod)
    {
        case "OPTIONS";
        //Allows anyone to hit your API, not just this c9
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
        
        case
        
    }
?>