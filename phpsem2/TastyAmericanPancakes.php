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
    <h2>RECIPE FOR DELICIOUS AMERICAN PANCAKES!</h2>
    <div>
      <div class="pancake_img">
        <img src="https://t3.ftcdn.net/jpg/01/05/86/76/240_F_105867649_L6LKPGIjdKSWufMzaTlTO5IQPezdnFoy.jpg" class="w3-border w3-padding" alt="Alps" style="border-radius:8px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      </div>
      <p class="title">Ingredients<br></p>
      <p class="text">
        150g plain flour<br>
        1/2 teaspoon salt<br>
        1 tablespoon baking powder<br>
        1 teaspoon caster sugar<br>
        225ml milk<br>
        1 egg<br>
        1 knob of butter, melted<br>
        butter or oil for frying<br></p>
      <p class="title">Preparations<br></p>
      <p class="text">
        1. Sift together the flour, salt, baking powder and sugar. Make a well in the centre. Pour in the milk, then add the egg and melted butter. Beat well till the pancake batter is smooth.<br><br>
        2. Heat a frying pan over medium heat. Lightly grease with butter or vegetable oil. To test to see if the pan is hot enough, flick a bit of water on the pan. If it sizzles, it is ready. Ladle the pancake batter into the pan.<br><br>
        3. Cook each pancake till bubbles appear on the surface and the edges have gone slightly dry. Flip each pancake and cook for a minute or two on the reverse side, till golden brown.<br><br>
        4. Serve hot with your favourite toppings, such as maple syrup and fresh berries. Enjoy!<br><br>
      </p>
      <div class="section group">
          <h2 class="col span_1_of_4">Reviews!</h2>
      </div>
      <div class="section group">
          <div class="col span_4_of_4">

            <?php
            $filename = __DIR__ . '/reviewsAmericanPancake.txt';

            $entries = explode(";\n", file_get_contents($filename));
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
                        echo("<input type='hidden' name='deleterecipe' value='AmericanPancake'/>");
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
                    <input type="hidden" name="recipesite" value="AmericanPancake"/>
                    <input type="submit" value="Send Comment"/>
                </div>
        </form>
      <?php } ?>

          </div>
      </div>
      </div>

    </div>

  </div>
  </html>
