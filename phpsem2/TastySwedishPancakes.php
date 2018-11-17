<?php
require_once 'Entry.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <title>TastyRecipes!</title>
    <link rel="stylesheet"
          type="text/css"
          href="css/reset.css">
    <link rel="stylesheet"
          type="text/css"
          href="css/style.css">
    <link rel="stylesheet"
          type="text/css"
          href="css/loginstyle.css">
</head>
<body>
  <?php include 'resources/header.php' ?>
  <?php include 'resources/nav.php' ?>
<div>
  <h2>RECIPE FOR DELICIOUS SWEDISH PANCAKES!</h2>
  <div>
    <div class="pancake_img">
      <img src="https://images.pexels.com/photos/916263/pexels-photo-916263.jpeg?auto=compress&cs=tinysrgb&h=350" class="w3-border w3-padding" alt="Alps">
    </div>
    <p class="title">Ingredients<br></p>
    <p class="text">
      300g plain flour<br>
      1/2 teaspoon salt<br>
      1 teaspoon caster sugar<br>
      600ml milk<br>
      3 egg<br>
      1 knob of butter, melted<br>
      butter or oil for frying<br></p>
    <p class="title">Preparations<br></p>
    <p class="text">
      1. In a large mixing bowl, whisk together the flour and the eggs. Gradually add in the milk and water, stirring to combine. Add the salt and butter; beat until smooth.<br><br>
      2. Heat a lightly oiled griddle or frying pan over medium high heat. Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake. Tilt the pan with a circular motion so that the batter coats the surface evenly.<br><br>
      3. Cook the pancake for about 2 minutes, until the bottom is light brown. Loosen with a spatula, turn and cook the other side.<br><br>
      4. Serve hot with your favourite toppings, such as whipped cream and raspberry jam. Enjoy!<br><br>
    </p>
      <div class="section group">
          <h2 class="col span_1_of_4">Reviews!</h2>
      </div>
      <div class="section group">
          <div class="col span_4_of_4">

            <?php
            $filename2 = __DIR__ . '/reviewsSwedishPancake.txt';

            $entries = explode(";\n", file_get_contents($filename2));
            for ($i = count($entries) - 1; $i >= 0; $i--) {
                $entry = unserialize($entries[$i]);
                if ($entry instanceof Entry and ! $entry->isDeleted()) {
                    echo("<div class='commentsection'>");
                    echo ("<p class='author'>" . "[" . $entry->getNickName() . " commented, " . $entry->getTimestamp() . "]:</p>");
                    echo("<p class='entry'>" . "--");
                    echo(nl2br($entry->getMsg()));
                    if(isset($_SESSION['uname'])){
                    if ($entry->getNickName() === $_SESSION['uname']) {
                        echo("<form class='input' action='delete-entry.php' method='post'>");
                        echo("<input type='hidden' name='timestamp' value='" .
                        $entry->getTimestamp() . "'/>");
                        echo("<input type='hidden' name='deleterecipe' value='SwedishPancake'/>");
                        echo("<input type='submit' value='Delete this Comment'/>");
                        echo("</form>");
                      }
                    }
                    echo ("</p></div>");

                  }
              }
              ?>
      <?php
      if(isset($_SESSION['uname'])){
        ?>
        <form action="store-entry.php" method='post'>
                <div class="col span_2_of_4">
                    <label for="entry"><?php echo $_SESSION['uname'] ?>, write a comment if you wish!</label>
                </div>
                    <textarea id= "entry" rows = 5 name='msg' placeholder="Write your comment here."></textarea>
                <div>
                    <input type="hidden" name="recipesite" value="SwedishPancake"/>
                    <input type="submit" value="Send Comment"/>
                </div>
        </form>
      <?php } ?>

          </div>
      </div>
      </div>
</html>
