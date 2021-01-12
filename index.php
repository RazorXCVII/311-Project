<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Seventh Heaven</title>
  </head>
  <body>
    WELCOME TO SEVENTH HEAVEN!<br>


    <form action="signup.php" method="post">
      New Customer? => <input type="submit" name="signup" value="Register">
    </form>


    <form action="login.php" method="post">
      Returning Customer? => <input type="submit" name="login" value="Login">
    </form>


    <form action="showgamelist.php?id=<?='default'?>" method="post">
      Browse avalable games! => <input type="submit" name="Showlist" value="Show Games">
    </form>
  </body>
</html>
