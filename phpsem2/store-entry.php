<?php

/**
 * Stores a new entry in the conversation file.
 */
require_once 'Entry.php';


$filename1 = __DIR__ . '/reviewsAmericanPancake.txt';
$filename2 = __DIR__ . '/reviewsSwedishPancake.txt';

echo $_POST['recipesite'];

session_start();
if (!empty($_POST['msg']) && $_POST['recipesite'] == 'AmericanPancake') {
    $entry = new Entry($_SESSION['uname'], $_POST['msg']);
    file_put_contents($filename1, serialize($entry) . ";\n", FILE_APPEND);
    header("Location: TastyAmericanPancakes.php");
}
if (!empty($_POST['msg']) && $_POST['recipesite'] == 'SwedishPancake') {
    $entry = new Entry($_SESSION['uname'], $_POST['msg']);
    file_put_contents($filename2, serialize($entry) . ";\n", FILE_APPEND);
    header("Location: TastySwedishPancakes.php");
}
else{
  header("Location TastyLogin.php");
}

?>
