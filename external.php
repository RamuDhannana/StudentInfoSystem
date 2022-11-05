<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>External Marks</title>
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
  <div class="container">
    <div class="title">EXTERNAL Marks</div>
    <div class="content">
      <form action="updateexternal.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Stu_ID</span>
            <input type="text" placeholder="Enter Student ID" required name="stu_id">
          </div>
          <div class="input-box">
            <span class="details">Sub_ID</span>
            <input type="text" placeholder="Enter Subject ID" required name="sub_id">
          </div>
          <div class="input-box">
            <span class="details">External-Marks</span>
            <input type="text" placeholder="Enter External-Marks obtained" required name="marks">
          </div>
          <div class="input-box">
            <span class="details">Internal-marks</span>
            <input type="text" placeholder="Enter Internal-Marks obtained" required name="imarks">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div>
                  <a href="teacher.php">Go Back</a>
      </form>
    </div>
  </div>
</body>
</html>