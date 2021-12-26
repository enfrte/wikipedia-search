<?php

// Read JSON
$inputJSON = file_get_contents('php://input');
$inputArray = json_decode($inputJSON, TRUE);
$search = $inputArray['search']; 

/* Standard POST form request body
if (empty($_POST['search'])) {
	die(json_encode('No search?'));
}

$search = $_POST['search'];
*/

//$url = 'https://fi.wikipedia.org/w/api.php?action=query&format=json&list=search&srsearch='.$search.'&srwhat=text';
$url = 'https://io.wikipedia.org/w/api.php?action=query&format=json&list=search&srsearch='.$search.'&srwhat=text';

$result = file_get_contents($url);

echo json_encode($result);

?>

