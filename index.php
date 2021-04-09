<?php
require_once "connect.php";
session_start();
if(!isset($_SESSION['id'])){?>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
    </head>
    <body>
      <h1>Welcome to Auction</h1>
      <a href = "login.php" style="display:block;text-decoration:none">Login</a><br><br>
      <a href = "signup.php" style="display:block;text-decoration:none">Signup</a>
    </body>
  </html>

<?php
}

else{?>
  <a href = "logout.php" style="float:right; display:block;text-decoration:none">Logout</a>
  <h1> Welcome to Auction <?=$_SESSION['name']?></h1>
  <a href = "mybids.php" style="display:block;text-decoration:none">View My Bids</a><br>
  <a href = "addbid.php" style="display:block;text-decoration:none">Add New Bids</a>
  <h2>Available Bids</h2>
<?php
$i = $_SESSION['id'];
//echo $i;
$sql = "SELECT * from items WHERE user_id != $i ";
$result = $mysqli->query($sql);
if($result){?>
  <table style="text-align: center" width=100% border = 1px>
    <tr>
      <th>Item Name</th>
      <th>Description</th>
      <th>Owner</th>
      <th>Closing Date</th>
      <th>Opening Amount</th>
      <th>Current Amount</th>
      <th>Current Bid Time</th>
    </tr>
  <?php
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      date_default_timezone_set("Asia/Kolkata");
      if($row['closing_date'] > date("Y-m-d H:i:sa")){
      $_SESSION['bidid'] = $row['id'];
      echo "<tr><td>";
      echo $row['name'];
      echo "</td><td>";
      echo $row['description'];
      echo "</td><td>";
      echo $row['owner'];
      echo "</td><td>";
      echo $row['closing_date'];
      echo "</td><td>";
      echo $row['opening_amount'];
      echo "</td><td>";
      echo $row['amount'];
      echo "</td><td>";
      echo $row['bidDate'];
      echo "</td><td>";?>
      <form method="post" action="placebids.php">
        <input type="submit" value="Place My Bid" name="bid">
      </form
    <?php
      echo "</td></tr>";
    }
    }
  }
}
else{
  echo "<p style='font-size:20;color:red'>No Bids Placed</p>";
}
}
?>
