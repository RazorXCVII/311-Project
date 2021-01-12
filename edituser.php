<?php

require 'connection.php';

$id = $_GET['id'];

$showuser = "SELECT * FROM customer WHERE userid = '$id'";
$get_user = mysqli_query($conn, $showuser);

if(mysqli_num_rows($get_user) > 0){

  while($row = mysqli_fetch_assoc($get_user)){
    echo '<table>
    <tr>
    <th>ID</th>
    <td>'.$row['userid'].'</td>
    </tr>
    <tr>
    <th>First Name</th>
    <td>'.$row['firstname'].'</td>
    </tr>
    <tr>
    <th>Last Name</th>
    <td>'.$row['lastname'].'</td>
    </tr>
    <tr>
    <th>Email ID</th>
    <td>'.$row['email'].'</td>
    </tr>
    <tr>
    <th>Password</th>
    <td>'.$row['password'].'</td>
    </tr>
    <tr>
    <td><a href="editinfo.php?id='.$row['userid'].'">Edit Information</a></td>
    </tr>';
  }
}


?>
