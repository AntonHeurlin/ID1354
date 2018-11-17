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
    <h2>Login Form</h2>

<form method="POST" action="test.php">
  <div class="pancake_img">
    <img src="https://t3.ftcdn.net/jpg/01/05/86/76/240_F_105867649_L6LKPGIjdKSWufMzaTlTO5IQPezdnFoy.jpg" class="w3-border w3-padding" alt="Alps" style="border-radius:8px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  </div>

  <div class="container">
    <label for="uname">Username</label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="psw">Password</label>
    <input type="password" placeholder="Enter Password" name="psw" required >
    <div class="buttondiv">
    <button type="submit"><u>Login</u></button>
    </div>
  </div>
</form>
</div>

</body>
</html>
