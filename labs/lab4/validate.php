<?php
$user = $_GET["user"];
$validate = false;

$users = array();

foreach($users as $u)
{
    if($user === $u)
    {
        $validate = true;
    }
}

echo $validate

?>

