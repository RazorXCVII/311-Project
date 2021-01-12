<?php
require "connection.php";

if(isset($_POST['userid']) && isset($_POST['password'])){

  $userid = $_POST['userid'];
  $password = $_POST['password'];

  $checkuser = "SELECT userid FROM customer WHERE userid = '$userid' AND password = '$password'";

  $exists = mysqli_query($conn, $checkuser);

  $row = mysqli_fetch_assoc($exists);

  if(mysqli_num_rows($exists) > 0){
    echo "Welcome to Seventh Heaven! ";
    echo $row['userid']; ?>
    <br>
    <form action="edituser.php?id=<?=$row['userid']?>" method="post">
      Manage Your Account: <input type="submit" name="manage" value="Manage">
    </form>
    <form action="selectpayment.php?id=<?=$row['userid']?>" method="post">
      Purchase Games: <input type="submit" name="buygames" value="Buy">
    </form> <?php ;
  }
  else {
    echo "Failed to Login!";
  }
}
?>
