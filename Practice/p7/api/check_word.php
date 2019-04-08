<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
include '../dbConnection.php';
$conn = getDatabaseConnection("hangman");

$np = array();
$np[':wordId'] = $_GET["wordId"];

$sql = "SELECT word FROM words WHERE word_id = :wordId";

$stmt = $conn -> prepare($sql);  
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC);





$guessSoFar = $_GET["guessSoFar"];
$letter = $_GET["letter"];
$word = $record["word"];

$booleans = array();

$character = str_split($word);
foreach ($character as $char) {
    if (stripos($word , $char) === true || stripos($guessSoFar, $char) === true || $char === $letter) {
        array_push($booleans, 1);
    }
    else {
        array_push($booleans, 0);
    }
}

echo json_encode($booleans);

?>