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
	$us=$_GET['sid'];
	$sql="update user set status=1   where username='$us'  ";
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
        echo "User Enabled successfully";
        echo "<input type='button' value=' Click To Go Menu' onclick='history.go(-2)'>";
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