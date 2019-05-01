<?php

$apiKey = "12231192-0637c0b0b53c41728f5e42f7b";
$query = $_GET["q"];
$image_type = "photo";

//step1 - setup the CURL session
$cSession = curl_init();

//step2 - setup the CURL options
curl_setopt($cSession,CURLOPT_URL,"https://pixabay.com/api/?key=$apiKey&q=$query");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

//step3 
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

// turn string to an array
$imgData = json_decode($results);

//dereference an index in the array and gives you a song
$imglist = $imgData->imglist->items[0];

//step5
//echo json_encode($imglist);
//echo json_encode($results);
echo $results;


?>