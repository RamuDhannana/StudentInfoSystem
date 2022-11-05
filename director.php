<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
                  echo "<!DOCTYPE html>";
                  echo "<html lang='en' dir='ltr'>";
                  echo "<head>";
                  echo "<meta charset='UTF-8'>";
                  echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                  echo "<link rel='stylesheet' href='style3.css'>";
                  echo "<style >
               .dashboard{
                  background-color:white;
                  width:480px;
                  height: auto;
                  margin-top:-50px;
                  margin-left: 850px;
                  border: 2px solid white;
                  padding: 10px;
                  border-radius: 25px; 
                   }
                 table{
                width:440px;
                margin-left:7px;
                }
               table, th, td {
               border: 1px solid black;
                }
                tr:hover {background-color: #D6EEEE;}</style>";
                  echo "</head>";
                  echo "<body background='images/alietbg.jpg' style='
                   width: 100%;
                   height: 50vh;
                   background-size: cover;
                   background-position: center;
                  '>";
                  echo "<nav>";
                  echo "<div class='menu'>";
                  echo "<div >";
                  echo "</div>";
                  echo "<div class='logo' style='margin-left: -280px'>";
                  echo "<a href='#' style='margin-left:-100px'>Student Info System</a>";
                  echo "</div>";
                  echo "<ul>";
                   echo "<li><a href='directorsearch.php'>Search Student</a></li>";
                   echo "<li><a href='aboutus.html'>About</a></li>";
                   echo "<li><a href='logout.php''>Logout</a></li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "</nav>";
                  echo "<div class='col-md-4'>";
                
                  echo "</div>";
                  echo "<div class='center'>";
                  echo "<div class='title' style='margin-top:-65px;'>ANDHRA LOYOLA INSTITUTE OF ENGINEERING AND TECHNOLOGY</div>";
                  echo "<div class='btns'>";
                  echo "<button style='margin-left:40px'>Learn More</button>";
                  echo "</div>";
         $id=$_SESSION["id"];
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
            $dat=date('y-m-d');
            $s="select branch,section,batch,max(period) as maxperiod from daily_attendance where dates='$dat' group by batch,branch";
            $res=$conn->query($s);
            echo "<div class='dashboard'>";

              echo "<table style='border:solid 2px black'>";
              echo "<tr>";
              echo "<th>Date</th>";
              echo "<th>Batch</th>";
              echo "<th>Section</th>";
              echo "<th>NO.Of Students Absent</th>";

              echo "</tr>";
            while ($r = $res->fetch_assoc()) 
            {
              $p=$r['maxperiod'];
              $br=$r['branch'];
              $b=$r['batch'];
              $sql=" select batch,dates,section,branch,count(student_id) as tot from daily_attendance where branch='$br' and  attend=0 and  dates='$dat' and period='$p' and batch='$b'" ;
              $result=$conn->query($sql);
               $row = $result->fetch_assoc();
                echo "<tr>";
               echo "<td>".$row['dates']."</td>";
               echo "<td>".$row['batch']."</td>";
               echo "<td>".$row['branch']."</td>";
               echo "<td>".$row['tot']."</td>";
               echo "</tr>";
            }
              echo "</table>";
              echo "</div>";
          }
             echo "</div>";
                  echo "</body>";
                  echo "</html>";
?>