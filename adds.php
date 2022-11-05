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
	$id=$_GET["rollno"];
	$name=$_GET["name"];
	$phone=$_GET["pphone"];
    $add=$_GET["addr"];
    $df=$_GET["dob"];
    $pe=$_GET["pemail"];
    $year=$_GET["year"];
    $branch=$_SESSION["branchname"];
    $men=$_GET["ment"];
    $se=$_GET["section"];
    $batch=$_GET["batch"];
    if(strpos($id, $_SESSION["branch"]))
  {
	$sql="insert into student_personal(student_id,student_name,year,Branch,phone,address,dob,parent_email,mentor,section,batch)
	   values ('$id','$name','$year','$branch','$phone','$add','$df','$pe','$men','$se','$batch')";
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
        echo "student added successfully. add marks using below link";
        echo "<a href='adsub.php'> Add marks</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	
    else
	{
		 echo "Error: Student already exists";
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
        echo "Invalid Student!! Access denaied!!";
        echo "<a href='teacher.html'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
  }
	
}
$conn->close();
?>
