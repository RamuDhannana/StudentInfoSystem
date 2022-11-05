<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Mid-2 Marks</title>
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
    <div class="title">Mid-2 Marks</div>
    <div class="content">
      <form action="updatemid2.php" method="get">
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
            <span class="details">MID-Marks</span>
            <input type="text" placeholder="Enter Mid-Marks obtained" required name="marks">
          </div>
          <div class="input-box">
            <span class="details">ONLINE-marks</span>
            <input type="text" placeholder="Enter Online-Marks obtained" required name="omarks">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <a href='teacher.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>