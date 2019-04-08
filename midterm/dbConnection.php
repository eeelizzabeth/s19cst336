<?php
    function getDatabaseConnection($dbname = 'cinder')
    {
        $host = 'localhost'; //cloud9
        $username = 'root';
        $password = '';
        
        try{
            //create db connection
            $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            
            //display errors when accessing tables
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Problems connecting to database!";
            exit();
        }
        
        return $dbConn;
    }
?>