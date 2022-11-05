<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Mid-1 Marks</title>
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
    <div class="title">Attendance Report</div>
    <div class="content">
      <form action="displaydashborad.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">From-Date</span>
            <input type="date"  required name="fromdate">
          </div>
          <div class="input-box">
            <span class="details">To-Date</span>
            <input type="date"  required name="todate">
          </div>
          <div class="input-box">
            <label for="sem">Select Year-Sem:</label><br>
            <select name="sem" id="sem" > 
            <optgroup label="First Year">
            <option value="1">1<sup>st</sup> Sem</option>
            <option value="2">2<sup>nd</sup> Sem</option>
          </optgroup>
          <optgroup label="Second Year">
            <option value="3">1<sup>st</sup> Sem</option>
            <option value="4">2<sup>nd</sup> Sem</option>
            </optgroup>
            <optgroup label="Third Year">
            <option value="5">1<sup>st</sup> Sem</option>
            <option value="6">2<sup>nd</sup> Sem</option>
            </optgroup>
            <optgroup label="Third Year">
            <option value="7">1<sup>st</sup> Sem</option>
            <option value="8">2<sup>nd</sup> Sem</option>
            </optgroup>
          </select>
          </div>
          <div class="input-box">
            <label for="section">Select Section:</label><br>
            <select name="section" id="section" > 
            <option value="1">Section -1</option>
            <option value="2">Section -2</option>
          </select>
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="View Attendance">
        </div><br>
        <a href='teacher.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>