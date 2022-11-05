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
	$sub_id=$_GET["sub_id"];
	$mid1=$_GET["marks"];
	$onmimd1=$_GET["omarks"];
    if(strpos($st_id, $_SESSION["branch"]))
    {
	$sql="update student_marks set mid1='$mid1',onlinemid1='$onmimd1' where student_id='$st_id' and sub_id='$sub_id'";
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
        echo "Mid1 marks updated  successfully";
        echo "<a href='teacher.php'>Go To Menu</a>";
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
        echo "Invalid Student !!.....";
        echo "<a href='teacher.html'>Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
  }
}
$conn->close();
?>