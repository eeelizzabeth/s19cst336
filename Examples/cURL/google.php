<?php
// curl -X "GET" "https://api.spotify.com/v1/search?q=Sia&type=artist" 
//         -H "Accept: application/json" 
//         -H "Content-Type: application/json" 
//         -H "Authorization: Bearer 
//         BQCHug5Wqnad8JeghoL6sYyuAlWxahNKBYuS_z4Mzu1fAGTOOfowkdUyglBdM6ofkmRoSIfNXaz8sKEFrAI4v7GS69DPEWPMWm0bhQq_zm-5HdiE207UYSuv-cwSK6yxcfQz3A8oNh9cjSLkd_F0ndVK6m2lFfGmxeraZw"
$apiKey = "BQCHug5Wqnad8JeghoL6sYyuAlWxahNKBYuS_z4Mzu1fAGTOOfowkdUyglBdM6ofkmRoSIfNXaz8sKEFrAI4v7GS69DPEWPMWm0bhQq_zm-5HdiE207UYSuv-cwSK6yxcfQz3A8oNh9cjSLkd_F0ndVK6m2lFfGmxeraZw";
$query = "Sia";
$type = "artist";
//step1 - setup the CURL session
$cSession = curl_init();

//step2 - setup the CURL options
curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/search?q=$query&type=$type");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

// add headers to the HTTP command
curl_setopt($cSession, CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));

//step3 
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

// turn string to an array
$musicData = json_decode($results);

//dereference an index in the array and gives you a song
$playlist = $musicData->playlists->items[0];

//step5
echo json_encode($playlist);

?>