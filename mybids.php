<?php
require_once "connect.php";
session_start();
?>
<h1>My Bids</h1>
<?php
$id = $_SESSION['id'];
$sql = "SELECT * FROM items i, users u WHERE i.user_id = $id and i.user_id = u.id";
$result = $mysqli->query($sql);
if($result){
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $itemid = $row['id'];
      echo "<p>Item Name: ".$row['name']."</p>";
      echo "<p>Description: ".$row['description']."</p>";
      echo "<p>Owner Name: ".$row['owner']."</p>";
      echo "<p>Closing Date: ".$row['closing_date']."</p>";
      echo "<p>Opening Amount: ".$row['opening_amount']."</p>";
      echo "<p>Current Bid: ".$row['amount']."</p>";
      echo "<p>Current Bid Date: ".$row['bidDate']."</p>";?>
      <form method="post">
        <input type="submit" name="cancel" value="Delete" style="background-color:red">
      </form>
    <?php
    }
  }
  else{
    echo "<p style='color:red;font-size:20'>No Bits Placed </p>";
  }
}
if(isset($_POST['cancel'])){
  $sql = "DELETE FROM items WHERE user_id = $itemid";
  if(mysqli_query($mysqli,$sql)){
    echo "<br><Br><p style='color:green;font-size:20'>Item Deleted from Auction</p>";
    header('Location:mybids.php');
  }
  else{
    echo "<br><Br><p style='color:red;font-size:20'>Error Inserting the Record</p>.$mysqli->error";
  }
}
?>
<br>
<p><a href = index.php>Back</a></p>
