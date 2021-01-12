<?php

require 'connection.php';

$user_id = $_GET['id'];

if(isset($_POST['card']) || isset($_POST['mbank']) || isset($_POST['wallet'])){
  if(isset($_POST['card'])){
    $payment = 'c';
  }
  elseif(isset($_POST['mbank'])){
    $payment = 'm';
  }
  elseif(isset($_POST['wallet'])){
    $payment = 'w';
  }

  $createorder = "INSERT INTO orderlist VALUES(DEFAULT, DEFAULT, '$payment', '$user_id')";
  $has_created = mysqli_query($conn, $createorder);

  if($has_created){
    echo "Order has successfully been created!";
    echo "<br>";
    echo "Continue to adding Games to your Cart for Purchase: "; ?>
    <form action="showgamelist.php?id=<?=$user_id?>" method="post">
      Purchase Games: <input type="submit" name="buygames" value="Buy">
    </form> <?php ;
  }
  else {
    echo "Failed to create Order";
  }
}

?>
