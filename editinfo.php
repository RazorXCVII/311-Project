<?php
require 'connection.php';

$user_id = $_GET['id'];

$showuser = "SELECT * FROM customer WHERE userid = '$user_id'";
$get_user = mysqli_query($conn, $showuser);
$row = mysqli_fetch_assoc($get_user);
?>

<form action="updateuser.php?id=<?=$row['userid']?>" method="post">
  Enter User ID: <?=$row['userid']?><br>
  Enter First Name: <input type="text" name="firstname" value="<?=$row['firstname']?>"><br>
  Enter Last Name: <input type="text" name="lastname" value="<?=$row['lastname']?>"><br>
  Enter Email: <input type="email" name="email" value="<?=$row['email']?>"><br>
  Enter Password: <input type="password" name="password" value="<?=$row['password']?>"><br>
  <input type="submit" name="updateinfo" value="Update">
</form>
