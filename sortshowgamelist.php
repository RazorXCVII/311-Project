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

if(isset($_POST['alphaasc']) || isset($_POST['alphadesc']) || isset($_POST['priceasc']) || isset($_POST['pricedesc']) || isset($_POST['yearasc']) || isset($_POST['yeardesc'])){
  $showgames1 = "SELECT * FROM gamelist ORDER BY title";
  $showgames2 = "SELECT * FROM gamelist ORDER BY title DESC";
  $showgames3 = "SELECT * FROM gamelist ORDER BY price";
  $showgames4 = "SELECT * FROM gamelist ORDER BY price DESC";
  $showgames5 = "SELECT * FROM gamelist ORDER BY releaseyear";
  $showgames6 = "SELECT * FROM gamelist ORDER BY releaseyear DESC";

  if(isset($_POST['alphaasc'])){
    $get_list = mysqli_query($conn, $showgames1);
  }
  elseif(isset($_POST['alphadesc'])){
    $get_list = mysqli_query($conn, $showgames2);
  }
  elseif(isset($_POST['priceasc'])){
    $get_list = mysqli_query($conn, $showgames3);
  }
  elseif(isset($_POST['pricedesc'])){
    $get_list = mysqli_query($conn, $showgames4);
  }
  elseif(isset($_POST['yearasc'])){
    $get_list = mysqli_query($conn, $showgames5);
  }
  elseif(isset($_POST['yeardesc'])){
    $get_list = mysqli_query($conn, $showgames6);
  }


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
}

elseif (isset($_POST['titlesearch']) || isset($_POST['devsearch']) || isset($_POST['pubsearch']) || isset($_POST['gensearch'])) {

  if(isset($_POST['titlesearch'])){
    $title = $_POST['title'];
    $showgames1 = "SELECT * FROM gamelist WHERE title LIKE '%$title%'";
    $get_list = mysqli_query($conn, $showgames1);
  }
  elseif(isset($_POST['devsearch'])){
    $developer = $_POST['developer'];
    $showgames2 = "SELECT * FROM gamelist WHERE developer LIKE '%$developer%'";
    $get_list = mysqli_query($conn, $showgames2);
  }
  elseif(isset($_POST['pubsearch'])){
    $publisher = $_POST['publisher'];
    $showgames3 = "SELECT * FROM gamelist WHERE publisher LIKE '%$publisher%'";
    $get_list = mysqli_query($conn, $showgames3);
  }
  elseif(isset($_POST['gensearch'])){
    $genre = $_POST['genre'];
    $showgames4 = "SELECT g.* FROM gamelist AS g, gamecategory AS c, genre AS r WHERE g.id = c.gameid AND r.id = c.genreid AND (r.name LIKE '%$genre%' OR r.id LIKE '%$genre%')";
    $get_list = mysqli_query($conn, $showgames4);
  }

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
}


?>
