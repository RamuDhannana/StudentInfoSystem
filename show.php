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
	$men=$_GET["mname"];
	$sql=" select student_id,student_name,year from student_personal where mentor like '%$men' ";
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
           echo "<th>Mentor Name:</th>";

          echo "<th>".$men."</th>";
          echo "</tr>";

          echo "<tr>";

          echo "<th>Student Name</th>";

          echo "<th>Year</th>";


          echo "</tr>";

          $s="select max(year) as max_year from student_marks";
          $res=$conn->query($s);
           $res1=$res->fetch_assoc();
           $sm=$res1['max_year'];
        while($row = $result->fetch_assoc()) 
        { 
        	echo "<tr>";
        	echo "<td><a href='page.php?sid=".$row['student_id']."'>".$row['student_name']."</a></td>";
        	echo "<td>".$row['student_id']."</td>";
        	echo "</tr>";

        }
        echo "</table>";
        echo "</body>";
        echo "</html";
	 }
}
?>