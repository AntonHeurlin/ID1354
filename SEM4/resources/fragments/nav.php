<nav>
  <ul>
    <li><a href="FirstPage">Home</a></li>
    <li><a href="#">Recipes</a>
      <ul class="dropdown">
        <li><a href="AmericanPancakeDirect">American Pancakes</a></li>
        <li><a href="SwedishPancakeDirect">Swedish Pancakes</a></li>
      </ul>
    </li>
    <li><a href="CalendarDirect">TastyCalender</a></li>
    <li><a href="LoginDirect">LOG IN</a></li>
    <li class="phpsession">      <?php
    session_start();
        if($this->session->get('username') != null){
          if($this->session->get('username') == 'Fel'){
            echo 'INVALID USER';
          }
          else{
            echo 'active user:';
            echo $this->session->get('username');
          }
        }
        else{
          echo 'STATUS: NOT LOGGED ON';
        }?></li>
    <?php
    if($this->session->get('username') != null){
      if($this->session->get('username') != 'Fel'){
        ?>
          <li class="phpsession-logout"><a href="Logout">LOG OUT</a></li>
      <?php  }}
      ?>
  </ul>
  <p id="session_username" hidden><?php echo $this->session->get('username') ?></p>
</nav>
