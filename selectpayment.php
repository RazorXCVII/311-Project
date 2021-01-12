Select your desired payment method:

<form action="order.php?id=<?=$_GET['id']?>" method="post">
  Credit or Debit Card: <input type="submit" name="card" value="C">
</form>
<form action="order.php?id=<?=$_GET['id']?>" method="post">
  Mobile Banking: <input type="submit" name="mbank" value="m">
</form>
<form action="order.php?id=<?=$_GET['id']?>" method="post">
  Store Wallet: <input type="submit" name="wallet" value="w">
</form>
