<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style2.css" />
    <title>search</title>
  </head>
  <body>
    <?php
        session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?>
    <div class="login-wrapper">
      <form action="show.php" class="form" method="get">
        <h2>Search Mentor</h2>
        <div class="input-group">
          <input type="text" name="mname" id="loginUser" required  />
          <label for="loginUser">Mentor Name</label>
        </div>
        
        <input type="submit" value="Show" class="submit-btn" />
        <a href="teacher.php" style="color: red">Go Back</a>
      </form>
    </div>
  </body>
</html>