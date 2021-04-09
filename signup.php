<?php
require_once "connect.php";
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signup Page</title>
  </head>
  <body>
    <h1>Signup Page</h1>
    <form method="post">
      Name <input type="text" name="name"><BR><BR>
      Username <input type="text" name="un"><br><Br>
      Password <input type="password" name="pw"><br><Br>
      <input type="submit" name="signup" value="Sign In">
    </form>
    <a href = "login.php" style="display:block;text-decoration:none">Login Page</a>
    <?php
      if(isset($_POST['signup'])){
        $name = $_POST['name'];
        $un = $_POST['un'];
        $pw = $_POST['pw'];
        $ins = "INSERT INTO users (name,username,password) VALUES ('$name','$un','$pw')";
        if(mysqli_query($mysqli,$ins)){
          echo "<br><Br><p style='color:green;font-size:20'>Account Created</p>";
        }
        else{
          echo "<br><Br><p style='color:red;font-size:20'>Error Inserting the Record</p>.$mysqli->error";
        }
      }
    ?>
  </body>
</html>
