<?php
session_start();
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
	$st_id=$_GET["stu_id"];
	$subname=$_GET["subname"];
	$sub_id=$_GET["subid"];
	$mid1=$_GET["mm1"];
	$mimd2=$_GET["onm1"];
	$onmimd1=$_GET["mm2"];
	$onmid2=$_GET["onm2"];
	$exam=$_GET["em"];
	$iexam=$_GET["im"];
	$year=$_GET["year"];
	$cr=$_GET["credit"];
	if(strpos($st_id, $_SESSION["branch"]))
	{
	$sql="insert into student_marks(student_id,subname,year,sub_id,mid1,onlinemid1,mid2,onlinemid2,external,internal,credit)
	     values('$st_id','$subname','$year','$sub_id','$mid1','$onmimd1','$mimd2','$onmid2','$exam','$iexam','$cr')";
	if($conn->query($sql))
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
        echo "subject add successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	else
	{
		echo "Error Occurs try again Stu_id must unique" ;

	}
  }
  else
  {
  	 echo "Invalid Student! we can not add";
  }
}
$conn->close();
?>