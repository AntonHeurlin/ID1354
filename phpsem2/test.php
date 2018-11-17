<?php


$accountfile = "users.txt";
$content = file_get_contents($accountfile);
$content = explode(":", $content);

foreach($content as $values){
   $loginInfo = explode(",", $values);
   $username = $loginInfo[0];
   $password = $loginInfo[1];
    if($_POST['uname'] == $username && $_POST['psw'] == $password){
        session_start();
        $_SESSION['uname'] = $username;
        header('Location: TastyIndex.php');
    }
}    
?>
