<?php
require_once "connect.php";
session_start();
if(isset($_SESSION['id'])){
if(isset($_POST['add'])){
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $owner = $_POST['owner'];
  $date = $_POST['date'];
  $open = $_POST['open'];
  $id = $_SESSION['id'];
  $sql = "INSERT INTO items (name,description,owner,closing_date,opening_amount,user_id) VALUES ('$name','$desc','$owner','$date',$open,$id)";
  if(mysqli_query($mysqli,$sql)){
    echo "<br><Br><p style='color:green;font-size:20'>Item Added in Auction</p>";
  }
  else{
    echo "<br><Br><p style='color:red;font-size:20'>Error Updating the Record</p>.$mysqli->error";
  }
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Bid</title>
  </head>
  <body>
    <h1> Add New item to Bid </h1>
    <form method="post">
      Item Name <input type="text" name="name"><br><br>
      Description <textarea name="desc" rows="8" columns="100"></textarea><br><br>
      Owner Name <input type="text" name="owner"><br><br>
      Closing Date <input type="datetime-local" name="date"><br><br>
      Opening Amount <input type="number" name="open"><br><br>
      <input type="submit" name="add" value="Add Item">
    </form>
    <a href = "index.php" style="display:block;text-decoration:none">Back</a><br>
<?php
}
else{
  echo "Access Denied";
}
?>
  </body>
</html>
