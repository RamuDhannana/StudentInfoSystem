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
	$men=$_GET["Uname"];
  $sem=$_GET["sem"];
  if(strpos($men, $_SESSION["branch"]))
  {
	$sql=" select * from student_marks where student_id='$men' and year='$sem' ";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	 {

	 	   echo "<!DOCTYPE html>";

            echo "<html>";

           echo "<head>";

            echo "<title>Table layout</title>";

           echo "<link rel='stylesheet' href='main.css'>";

           echo "</head>";

           echo "<body>";
           echo "<div class='filter'>";

          echo "</div>";

          echo "<table >";
          echo "<tr>";
           echo "<th width='5%'>Student RollNo:</th>";

          echo "<th width='2%'>".$men."</th>";
          echo "</tr>";
          echo "<tr>";
                  echo "<th width='2%'>subject</th><th width='2%'>Sem No</th><th width='2%'>subject_id</th><th width='2%'>Mid1</th><th width='2%'width='2%'>Online1</th><th width='2%'>Mid2</th> <th width='2%'>online2</th><th width='2%'>external marks</th>";
          echo "</tr>";

          while($row = $result->fetch_assoc()) 
        {
          echo "<tr>";
                  echo "<td>".$row['subname']."</td>"."<td>".$row['year']."</td>"."<td>".$row['sub_id']."</td>"."<td>".$row['mid1']."</td>"."<td>".$row['onlinemid1']."</td>"."<td>".$row['mid2']."</td>"."<td>".$row['onlinemid2']."</td>"."<td>".$row['external']."</td>";
                  echo "</tr>";
        }
        echo "</table>";
   }
   echo "</body>";
   echo "</html>";
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
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
  }
}
?>

