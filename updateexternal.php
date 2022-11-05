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
	$st_id=$_GET["stu_id"];
	$sub_id=$_GET["sub_id"];
	$exam=$_GET["marks"];
	$internal=$_GET["imarks"];
	$sql="update student_marks set external='$exam',internal='$internal' where student_id='$st_id' and sub_id='$sub_id'";
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
        echo "external marks updated successfully";
        echo "<a href='teacher.php'> see student</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	else
	{
		echo "Error occurs";
	}
}
$conn->close();
?>