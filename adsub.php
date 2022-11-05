<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add Subject</title>
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
    <div class="title">Add Subject</div>
    <div class="content">
      <form action="addsub.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Stu_ID</span>
            <input type="text" placeholder="Enter Student ID" required name="stu_id">
          </div>
		  <div class="input-box">
            <span class="details">Subject Name</span>
            <input type="text" placeholder="Enter Subject Name" required name="subname">
          </div>
          <div class="input-box">
            <span class="details">Sub_ID</span>
            <input type="text" placeholder="Enter Subject ID" required name="subid">
          </div>
          <div class="input-box">
            <span class="details"> Sem No</span>
            <input type="text" placeholder="like 1,2...8"  name="year">
          </div>
          <div class="input-box">
            <span class="details">Credit</span>
            <input type="text" placeholder="Enter Credit"  name="credit">
          </div>
		   <div class="input-box">
            <span class="details">MID1-Marks</span>
            <input type="text" placeholder="Enter Mid1-Marks obtained"  name="mm1">
          </div>
          <div class="input-box">
            <span class="details">ONLINE1-marks</span>
            <input type="text" placeholder="Enter Online1-Marks obtained"  name="onm1">
          </div>
		   <div class="input-box">
            <span class="details">MID2-Marks</span>
            <input type="text" placeholder="Enter Mid2-Marks obtained" name="mm2">
          </div>
          <div class="input-box">
            <span class="details">ONLINE2-marks</span>
            <input type="text" placeholder="Enter Online2-Marks obtained" name="onm2">
          </div>
          <div class="input-box">
            <span class="details">External-Marks</span>
            <input type="text" placeholder="Enter External-Marks obtained" name="em">
          </div>
          <div class="input-box">
            <span class="details">Internal-marks</span>
            <input type="text" placeholder="Enter Internal-Marks obtained" name="im">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Add">
        </div><br>
        <a href='teacher.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>