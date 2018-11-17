<nav>
  <ul>
    <li><a href="http://localhost/tastyrecipes/phpsem2/TastyIndex.php">Home</a></li>
    <li><a href="#">Recipes</a>
      <ul class="dropdown">
        <li><a href="http://localhost/tastyrecipes/phpsem2/TastyAmericanPancakes.php">American Pancakes</a></li>
        <li><a href="http://localhost/tastyrecipes/phpsem2/TastySwedishPancakes.php">Swedish Pancakes</a></li>
      </ul>
    </li>
    <li><a href="http://localhost/tastyrecipes/phpsem2/TastyCalendar.php">TastyCalender</a></li>
    <li><a href="http://localhost/tastyrecipes/phpsem2/TastyLogin.php">LOG IN</a></li>
    <li class="phpsession">      <?php
    session_start();
        if(isset($_SESSION['uname'])){
          echo 'active user:';
          echo $_SESSION['uname'];
        }?></li>
    <?php
    if(isset($_SESSION['uname'])){
        ?>
          <li class="phpsession-logout"><a href="http://localhost/tastyrecipes/phpsem2/TastyLogout.php">LOG OUT</a></li>
      <?php  }
      ?>
  </ul>
</nav>
