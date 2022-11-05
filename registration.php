<?php
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
	$name1=$_GET['name'];
	$username1=$_GET['uname'];
	$password1=$_GET['password'];
	$phone1=$_GET['phonenumber'];
	$email1=$_GET['email'];
	$id1=$_GET['id'];
	$role1=$_GET['role'];
	$bran=$_GET['branch'];
	$sql="select * from user where id='$id1'";
	$res=$conn->query($sql);
	if($res->num_rows == 0)
    {
	$sql="INSERT INTO user (name,username,password,role,email,id,phone,branch) 
	VALUES ('$name1','$username1','$password1','$role1','$email1','$id1','$phone1','$bran') ";

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
        echo "Registration Successfull u can login now";
        echo "<a href='login.html'> Login Here</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	else
	{
		 echo "Error: " . $sql . "<br>" . $conn->error;
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
        echo "ID is Already Exist!!";
        echo "<a href='home.html'> MENU</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
}
$conn->close();
?>
