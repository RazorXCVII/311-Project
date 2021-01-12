<head>
  <meta charset="utf-8">
  <title>Seventh Heaven</title>
</head>

<?php

require 'connection.php';

$user_id = $_GET['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$updateuser = "UPDATE customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' WHERE userid = '$user_id'";

$is_updated = mysqli_query($conn, $updateuser);

if($is_updated){
    echo "Update Successfull!";
  }
else {
    echo "Failed to Update!";
}

?>
