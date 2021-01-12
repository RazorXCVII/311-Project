<?php
require 'connection.php';

$code = $_GET['id'];
$user_id = substr($code,5);
$game = substr($code,0,5);
$game_id = (int) filter_var($game, FILTER_SANITIZE_NUMBER_INT);

if($user_id == "default"){
  echo "Please Login to add Games to Cart<br>";
  echo '<tr><td><a href="showgamelist.php?id=default">Return to Browsing Games</a></td></tr><br>';
  echo '<tr><td><a href="index.php?">Login or Register</a></td></tr>';
}
else {
  $latest_order = "SELECT id FROM orderlist ORDER BY id DESC LIMIT 1";
  $get_latestorder = mysqli_query($conn, $latest_order);
  $row = mysqli_fetch_assoc($get_latestorder);

  $order_id = $row['id'];
  $amount = $_POST['amount'];

  $insert_cart = "INSERT INTO purchase VALUES($order_id, $game_id, $amount)";
  $get_cart = mysqli_query($conn, $insert_cart);

    if($get_cart){

      $purchaselist = "SELECT * FROM purchase WHERE orderid = $order_id";
      $get_purchaselist = mysqli_query($conn, $purchaselist);

        if(mysqli_num_rows($get_purchaselist) > 0){
        echo "Your Cart: ";
        echo "<br>";
        echo '<table>
        <tr>
        <th>Order ID</th>
        <th>Game ID</th>
        <th>Amount</th>
        </tr>';

        while($row = mysqli_fetch_assoc($get_purchaselist)){
          echo '<tr>
          <td>'.$row['orderid'].'</td>
          <td>'.$row['productid'].'</td>
          <td>'.$row['amount'].'</td></tr>';
        }
      }
      ?>
      <form action="showgamelist.php?id=<?=$user_id?>" method="post">
        Add more Games to Cart: <input type="submit" name="addmore" value="Add">
      </form>
      <form action="endpurchasescreen.php?id=<?=$user_id?>" method="post">
        End Purchase: <input type="submit" name="end" value="End">
      </form> <?php ;
    }
}
?>
