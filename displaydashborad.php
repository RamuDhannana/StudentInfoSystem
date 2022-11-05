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
  $branch=$_SESSION["branchname"];
  $date1=$_GET["fromdate"];
  $date2=$_GET["todate"];
  $sem=$_GET["sem"];
  $section=$_GET["section"];
 
  $sql=" select period,sem,subject,dates,section,count(student_id) as tot from daily_attendance where branch='$branch' and sem='$sem'and attend=1 and  dates BETWEEN '" . $date1 . "' AND  '" . $date2 . "' group by period,section" ;
  $result=$conn->query($sql);
  if ($result->num_rows > 0)
   {

       echo "<!DOCTYPE html>";

            echo "<html>";

           echo "<head>";

            echo "<title>Table layout</title>";

           echo "<link rel='stylesheet' href='main.css'>";
           echo "<link rel='stylesheet' href='style3.css'>";

           echo "</head>";

           echo "<body>";
           echo "<div class='filter'>";
           echo "<nav>";
           echo "<div>";
           echo "<div class='logo' style='margin-left:10px;color:white;'>";
           echo "<h1>Student Info System</h1>";
           echo "</div>";
           echo "</div>";
           echo "<div class='menu' style='margin-left: 400px;margin-top:-30px;'>";

           echo "<ul>";
           echo "<li><a href='search.php'>Search Student</a></li>";
           echo "<li><a href='addstaff.php'>Add Staff</a></li>";
           echo "<li><a href='subjectallocation.php'>Add Staff Subject</a></li>";
           echo "<li><a href='dailyattendance.php'>Take Today Attendance</a></li>";
           echo "<li><a href='logout.php'>Logout</a></li>";

          echo "</ul>";
          echo "</div>";
          echo "</nav>";

          echo "</div>";
          echo "<div>";
          echo "<table >";
          echo "<tr>";
          echo "<th>Date</th>";
          echo "<th>Subject Name</th>";
          echo "<th>Section</th>";
          echo "<th>NO.Of Students Attended</th>";
          echo "<th>Student Absentees</th>";
          echo "<th>Sem</th>";
          echo "<th>Period</th>";

          echo "</tr>";

        while($row = $result->fetch_assoc()) 
        { 
          unset($arr);
          $d=$row['dates'];
          $p=$row['period'];
          $s=$row['sem'];
          $sc=$row['section'];
          $b=$branch;
          $ar=[];
          $s="select student_id from daily_attendance where branch='$b' and section='$sc' and dates='$d' and sem='$s' and  period='$p' and attend=0 ";
          $res=$conn->query($s);
          if ($res->num_rows > 0)
          {
            while($r = $res->fetch_assoc()) 
             { 
               $roll=$r["student_id"];
               array_push($ar,substr($roll,7,9));
              }
          }
          echo "<tr>";
          echo "<td>".$row['dates']."</td>";
          echo "<td>".$row['subject']."</td>";
          echo "<td>".$row['section']."</td>";
          echo "<td>".$row['tot']."</td>";
          echo "<td> ".implode(",", $ar)."</td>";
          echo "<td>".$row['sem']."</td>";
          echo "<td>".$row['period']."</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</body>";
        echo "</html";
   }
   $conn->close();
}
?>