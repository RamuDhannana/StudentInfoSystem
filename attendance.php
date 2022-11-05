<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style2.css" />
    <title>Attendance</title>
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
      <form method="post" action="updateattendance.php" enctype="multipart/form-data" class="form" >
        <h2>Add Students Attendance</h2>
        <div class="input-group">
          <input type="file" name="excel_file" accept=".csv">
          <label for="loginUser">Select Csv File To Upload</label>
        </div>
        <input type="submit" name="import" value="Upload" class="submit-btn" /><br>
        <a href='teacher.php'> Go To Menu</a>
      </form>
    </div>
  </body>
</html>