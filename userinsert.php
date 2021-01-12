<head>
  <meta charset="utf-8">
  <title>Seventh Heaven</title>
</head>

<?php

require 'connection.php';

if(isset($_POST['userid']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])){
  $userid = $_POST['userid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $insertuser = "INSERT INTO customer VALUES('$userid', '$firstname', '$lastname', '$email', '$password')";

  $is_inserted = mysqli_query($conn, $insertuser);

  if($is_inserted){
    echo "Registration Successfull!";
  }
  else {
    echo "Failed to register!";
  }

}
?>

<form action="index.php" method="post">
  Return Back to Homepage: <input type="submit" name="home" value="Home">
</form>
