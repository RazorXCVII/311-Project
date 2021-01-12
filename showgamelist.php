<title>Seventh Heaven</title>
<form action="index.php" method="post">
  Home: <input type="submit" name="home" value="Home">
</form>

SORT:
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  <input type="submit" name="alphaasc" value="A to Z">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  <input type="submit" name="alphadesc" value="Z to A">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  <input type="submit" name="priceasc" value="Price<">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  <input type="submit" name="pricedesc" value="Price>">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  <input type="submit" name="yearasc" value="Oldest Release">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  <input type="submit" name="yeardesc" value="Newest Release">
</form>

SEARCH:
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  By Title: <input type="text" name="title" required>
  <input type="submit" name="titlesearch" value="Go">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  By Developer: <input type="text" name="developer" required>
  <input type="submit" name="devsearch" value="Go">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  By Publisher: <input type="text" name="publisher" required>
  <input type="submit" name="pubsearch" value="Go">
</form>
<form action="sortshowgamelist.php?id=<?=$_GET['id']?>" method="post">
  By Genre: <input type="text" name="genre" required>
  <input type="submit" name="gensearch" value="Go">
</form>


<?php

require "connection.php";

$showgames = "SELECT * FROM gamelist";
$get_list = mysqli_query($conn, $showgames);

if(mysqli_num_rows($get_list) > 0){

  echo '<table>
  <tr>
  <th>ID</th>
  <th>Title</th>
  <th>Developer</th>
  <th>Publisher</th>
  <th>Release Year</th>
  <th>Price</th>
  </tr>';

  while($row = mysqli_fetch_assoc($get_list)){
    echo '<tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['title'].'</td>
    <td>'.$row['developer'].'</td>
    <td>'.$row['publisher'].'</td>
    <td>'.$row['releaseyear'].'</td>
    <td>'.$row['price'].'</td>
    <td><a href="selectamount.php?id='.$row['id'].''.$_GET['id'].'">Add to Cart</a></td></tr>';
  }
}



?>
