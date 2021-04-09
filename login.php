<?php
require_once "connect.php";
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <h1>Login</h1>
    <form method = "post">
      Username: <input type="text" name="un"><br><br>
      Password: <input type="password" name="pw"><Br><Br>
      <input type = "submit" name="login" value="Login">
    </form>
    <?php
    if(isset($_POST['login'])){
      //session_destroy();
      $un = $_POST['un'];
      $pw = $_POST['pw'];
      $sql = "SELECT id,name from users WHERE username = '$un' AND password = '$pw' ";
      $result = $mysqli->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
          }
          header('Location: index.php');
      }
      else{
        echo "<p style='font-size:20;color:red'>Invalid Credentials</p>";
      }
    }
    ?>
    <a href = "signup.php" style="display:block;text-decoration:none">Sign in</a>
  </body>
</html>
