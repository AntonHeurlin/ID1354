<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <title>TastyRecipes!</title>
    <link rel="stylesheet"
          type="text/css"
          href="../../resources/css/reset.css">
    <link rel="stylesheet"
          type="text/css"
          href="../../resources/css/style.css">
    <link rel="stylesheet"
          type="text/css"
          href="../../resources/css/loginstyle.css">
</head>
<body>
  <?php include 'resources/fragments/header.php' ?>
  <?php include 'resources/fragments/nav.php' ?>
  <div>
    <h2>Login Form</h2>

<form method="POST" action="Login">
  <div class="pancake_img">
    <img src="../../resources/css/AmericanPancake.jpg" class="w3-border w3-padding" alt="Alps" style="border-radius:8px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  </div>

  <div class="container">
    <label for="uname">Username</label>
    <input type="text" placeholder="Enter Username" id="nickName" name="nickName" required>
    <label for="psw">Password</label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required >
    <div class="buttondiv">
    <button type="submit"><u>Login</u></button>
    </div>
  </div>
</form>
</div>

</body>
</html>
