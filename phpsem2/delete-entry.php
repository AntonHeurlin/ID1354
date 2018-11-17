<?php

/**
 * Deletes the specified entry.
 */
require_once 'Entry.php';

$filename1 = __DIR__ . '/reviewsAmericanPancake.txt';
$filename2 = __DIR__ . '/reviewsSwedishPancake.txt';

session_start();
if (!empty($_POST['timestamp']) && $_POST['deleterecipe'] == 'AmericanPancake') {
    $entries = explode(";\n", file_get_contents($filename1));
    for ($i = count($entries) - 1; $i >= 0; $i--) {
        $entry = unserialize($entries[$i]);
        if ($entry instanceof Entry and ($entry->getTimestamp() == $_POST['timestamp'])) {
            $entry->setDeleted(true);
            $entries[$i] = serialize($entry);
            break;
        }
    }
    //lista ur hur file_put_contents fungerar!
    file_put_contents($filename1, implode(";\n", $entries));
    Header("Location: TastyAmericanPancakes.php");
}
if (!empty($_POST['timestamp']) && $_POST['deleterecipe'] == 'SwedishPancake') {
    $entries = explode(";\n", file_get_contents($filename2));
    for ($i = count($entries) - 1; $i >= 0; $i--) {
        $entry = unserialize($entries[$i]);
        if ($entry instanceof Entry and ($entry->getTimestamp() == $_POST['timestamp'])) {
            $entry->setDeleted(true);
            $entries[$i] = serialize($entry);
            break;
        }
    }
    //lista ur hur file_put_contents fungerar!
    file_put_contents($filename2, implode(";\n", $entries));
    Header("Location: TastySwedishPancakes.php");
}

?>
