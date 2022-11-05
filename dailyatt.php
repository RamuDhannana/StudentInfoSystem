<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
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
	$branch=$_GET["branch"];
  $sem=$_GET["sem"];
  $sec=$_GET["section"];
  $_SESSION['period']=$_GET["period"];
  $subject=$_GET["subject"];
  $_SESSION["section"]=$_GET["section"];
  $_SESSION["sem"]=$_GET["sem"];
  $_SESSION["subject"]=$_GET["subject"];
  $_SESSION["techbranch"]=$branch;
  $batch=$_GET["batchid"];
  $_SESSION["batch"]=$batch;
  $sc=$_SESSION["section"];
  $d=date('y-m-d');
  $s=$_SESSION["sem"];
  $p=$_SESSION['period'];
  $s="select student_id from daily_attendance where branch='$branch' and section='$sc' and dates='$d' and sem='$s' and  period='$p'";
 $res=$conn->query($s);
 if ($res->num_rows == 0)
  {
	$sql=" select student_id,student_name from student_personal where branch='$branch' and batch='$batch' and section='$sec' order by student_id asc";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	 {

	 	   echo "<!DOCTYPE html>";

            echo "<html>";

           echo "<head>";

            echo "<title>Table layout</title>";

           echo "<link rel='stylesheet' href='main.css'>";
           echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";

           echo "</head>";

           echo "<body>";
           echo "<h1 style='color:blue;text-align:center'> Take Attendance:</h1>";
           echo "<marquee  direction='left' style='color:red'>
              -------------If Student Absent click The Check-Box----------------
             </marquee>";
           echo "<form action='addattendance.php'  method='get'>";
           echo "<div style='font-size:30px;margin-left:150px;width:100%'><p>Student Name:</p></div>";
           echo "<div style='font-size:30px;margin-left:600px;margin-top:-30px;'><p>Student ID:</p></div>";
           echo "<hr>";
        while($row = $result->fetch_assoc()) 
        { 
        	 echo "<div style='font-size:25px;margin-left:150px'><p>".$row['student_name']."</p></div>";
           echo "<div style='font-size:25px;margin-left:600px;margin-top:-30px'><p>".$row['student_id']."</p></div>";
           echo "<div style='margin-left:770px;margin-top:-20px'>";
           echo "<input type='checkbox' name=".$row['student_id']." value='0' size='20px' id='present'>";
           echo "</div>";

        }
        echo "<br><hr><input type='submit' value='submit' style='font-size:20px;margin-left:650px;margin-top:20px;margin-bottom:20px'>";
        echo "</form>";
        echo "</body>";
        echo "</html";
	 }
  }
  else
  {
    echo "<!DOCTYPE html>";
        echo" <html>";
        echo "<body>";
        echo "<style>
        a{
          text-decaration:None;
          color:red;

        }";
        echo "</style>";
        echo "<link rel='stylesheet' href='style2.css'/>";
    echo "<div class='login-wrapper'>";
        echo "<form  class='form' >";
        echo "This Period Attendance Alread Taken!!! ";
        echo "<input type='button' value='GO BACK!' onclick='history.go(-2)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
  }
}
?>