<?php
require_once "connect.php";
session_start();
$id = $_SESSION['bidid'];
if(isset($_POST['bid'])){
  $sql = "SELECT * FROM items WHERE id = $id";
  $result = $mysqli->query($sql);
  if($result){
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        echo "<p>Item Name: ".$row['name']."</p>";
        echo "<p>Description: ".$row['description']."</p>";
        echo "<p>Owner Name: ".$row['owner']."</p>";
        echo "<p>Closing Date: ".$row['closing_date']."</p>";
        echo "<p>Opening Amount: ".$row['opening_amount']."</p>";
        echo "<p>Current Bid: ".$row['amount']."</p>";
        echo "<p>Current Bid Date: ".$row['bidDate']."</p>";?>
        <form method="post">
          Enter Amount <input type="text" name="amnt"><br><Br>
          <input type="submit" value="Place Bid" name="place">
        </form>
        <a href = index.php>Back</a>
      <?php
      }
    }
  }
}
if(isset($_POST['place'])){
  $amnt = $_POST['amnt'];
  $sql = "SELECT opening_amount,amount FROM items WHERE id = $id";
  $result = $mysqli->query($sql);
  if($result){
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $open = $row['opening_amount'];
        $cur = $row['amount'];
      }
    }
  }
  if($amnt>$open && $amnt>$cur){
    date_default_timezone_set("Asia/Kolkata");
    $da = date("Y-m-d H:i:sa");
    $sql = "UPDATE items SET amount = $amnt, bidDate = '$da' WHERE id = $id ";
    if(mysqli_query($mysqli,$sql)){
      echo "<br><Br><p style='color:green;font-size:20'>Bid Placed</p>";?>
        <a href = index.php>Finish</a>
    <?php }
    else{
      echo "<br><Br><p style='color:red;font-size:20'>Error Inserting the Record</p>.$mysqli->error";
    }
  }
  else{
    echo "<br><Br><p style='color:red;font-size:20'>Bid placed should be more than opening amount</p> ";?>
    <a href = index.php>Back</a>
  <?php
if(isset($_SESSION['bidid'])){
  unset($_SESSION['bidid']);
}

}
}
?>
