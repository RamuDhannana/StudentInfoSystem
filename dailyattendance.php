<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="container">
    <div class="title">Take Attendance</div>
    <div class="content">
      <form action="dailyatt.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <?php 
               $id=$_SESSION["id"];
                 $servername = "localhost";
                 $username = "root";
                  $password = "";
                  $dbname = "myDB";
                  $conn = new mysqli($servername, $username, $password, $dbname);
                 if ($conn->connect_error) 
                  {
                   die("Connection failed: " . $conn->connect_error);
                  }
                else
                 {
    
                  $sql=" select DISTINCT branch from subject_allocation where staff_id='$id'";
                  $result=$conn->query($sql);
                  if ($result->num_rows > 0)
                  {
                    echo "<div class='input-box'>";
                    echo "<label for='branch'>Select Branch:</label><br>";
                     echo "<select name='branch' id='branch' >";
                     while($row = $result->fetch_assoc()) 
                  {
                    echo "<option value=".$row['branch'].">".$row['branch']."</option>";
                  }
                  echo "</select>";
                  echo "</div>";
                  $sql="select DISTINCT subject from subject_allocation where staff_id='$id'";
                  $result=$conn->query($sql);
                  echo "<div class='input-box'>";
                    echo "<label for='subject'>Select Subject:</label><br>";
                     echo "<select name='subject' id='subject' >";
                     while($row = $result->fetch_assoc()) 
                  {
                    echo "<option value=".$row['subject'].">".$row['subject']."</option>";
                  }
                  echo "</select>";
                  echo "</div>";

                  $sql=" select studentbatch_id from branch ";
                  $result=$conn->query($sql);
                  echo "<div class='input-box'>";
                    echo "<label for='subject'>Student Batch:</label><br>";
                     echo "<select name='batchid' id='batchid' >";
                     while($row = $result->fetch_assoc()) 
                  {
                    echo "<option value=".$row['studentbatch_id'].">".$row['studentbatch_id']."</option>";
                  }
                  echo "</select>";
                  echo "</div>";
                }

              }
            ?>
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
            <optgroup label="Fourth Year">
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
          <div class="input-box">
            <label for="period">Select Period:</label><br>
            <select name="period" id="period" > 
            <option value="1">1st period</option>
            <option value="2">2nd period</option>
            <option value="3">3rd period</option>
            <option value="4">4th period</option>
            <option  value="5">5th period</option>
            <option value="6">6th period</option>
            <option value="7">7th period</option>
          </select>
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <input type='button' value=' Click To Go Menu' onclick='history.go(-1)' style="color:blue">
      </form>
    </div>
  </div>
</body>
</html>